<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $update_on = date("Y, F j, g:i a");

  $doc_id = $_POST['approve_id'];
  $email = $_SESSION['user_email'];
  $user_info ="<b>".$_SESSION['user_department'].":</b></br></br>".$_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln']. "</br>". $email. "</br><i>". $_SESSION['user_title']."</i>";
  $user_signature = "<br><div style='display:inline-block !important; text-align:center !important'>
                    <img src='../../DB/signature/$email.png' width='150'><br>
                    $_SESSION[user_fn] $_SESSION[user_mn] $_SESSION[user_ln] <br>
                    $_SESSION[user_title]
                    </div>";
 
  #step 1 select the efile
  $sql = "SELECT * FROM tbl_efile WHERE doc_id=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $doc_id);
  $stmt->execute();

  if ($stmt) {
    #step 2 save the values in variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $efile_name = $row['name'];
    $signatories = $row['signatories'];
    $created_by = $row['created_by'];
    $pending_signatories = explode("," , $row['pending_signatories']);
    $approved_signatories = $row['approved_signatories'];
    $signatures = $row['signatures'];
  }

    if ($stmt) {
      #step 3 update the values
      $sql2 = "UPDATE tbl_efile SET pending_signatories=?, approved_signatories=?, signatures=? WHERE doc_id=?";
      //remove your email on pending_signatories
      $updated_pending_signatories = array_diff($pending_signatories, explode("," , $_SESSION['user_email']) );
      //convert string to array
      $approved_signatories = explode("," , $approved_signatories);
      //push value to array
      $approved_signatories[] = $_SESSION['user_email'] ;
      //convert array to string
      $approved_signatories = implode("," , $approved_signatories);
      //get the first character
      $first_letter = substr($approved_signatories,0,1);
      //updated signatures
      $updated_signatures = $signatures.$user_signature;

      if ($first_letter == ',') {
        //remove the ,
        $updated_approved_signatories = substr($approved_signatories,1);
      }//end of if
      else {
        $updated_approved_signatories = $approved_signatories ;
      }//end of else

      $stmt = $dbConn->prepare($sql2);
      $stmt->bindValue(1, implode("," , $updated_pending_signatories) );
      $stmt->bindValue(2, $updated_approved_signatories );
      $stmt->bindValue(3, $updated_signatures);
      $stmt->bindValue(4, $doc_id);
      $stmt->execute();

    }//end of if

      if ($stmt) {

        $date = date("Y, F j");
        $time = date("g:i a");

        $sql3 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $dbConn->prepare($sql3);
        $stmt->bindValue(1, $doc_id);
        $stmt->bindValue(2, $efile_name);
        $stmt->bindValue(3, $user_info);
        $stmt->bindValue(4, $date);
        $stmt->bindValue(5, $time);
        $stmt->bindValue(6, $signatories);
        $stmt->bindValue(7, implode("," , $updated_pending_signatories));
        $stmt->bindValue(8, $updated_approved_signatories );
        $stmt->bindValue(9, "has approved an efile");
        $stmt->bindValue(10, $email.".jpg");
        $stmt->bindValue(11, $created_by);
        $stmt->execute();

        if ($stmt) {
          $sql4 = "INSERT INTO tbl_efile_trgr(doc_id,name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
          $stmt = $dbConn->prepare($sql4);
          $stmt->bindValue(1, $doc_id);
          $stmt->bindValue(2, $efile_name);
          $stmt->bindValue(3, implode("," , $updated_pending_signatories) );
          $stmt->bindValue(4, $updated_approved_signatories);
          $stmt->bindValue(5, "");
          $stmt->bindValue(6, "");
          $stmt->bindValue(7, "pending");
          $stmt->bindValue(8, "UPDATE");
          $stmt->bindValue(9, $update_on);
          $stmt->execute();
          
          echo "success";
        }//end of if
        else {
          echo "error";
        }//end of else

      }//end of if
      else {
        echo "error";
      }//end of else







 ?>
