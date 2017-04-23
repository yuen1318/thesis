<?php
  session_start();
  require '../../dbConfig.php';
  require '../../a_functions/sanitize.php';

  $doc_id = $_POST['approve_id'];
  $email = $_SESSION['user_email'] ;

  #step 1 select the efile
  $sql = "SELECT * FROM tbl_efile WHERE doc_id=?";
  $stmt = $dbConn->prepare($sql);
  $stmt->bindValue(1, $doc_id);
  $stmt->execute();

  if ($stmt) {
    #step 2 save the values in variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
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

      if ($first_letter == ',') {
        $updated_approved_signatories = substr($approved_signatories,1);
      }//end of if
      else {
        $updated_approved_signatories = $approved_signatories ;
      }//end of else

      $stmt = $dbConn->prepare($sql2);
      $stmt->bindValue(1, implode("," , $updated_pending_signatories) );
      $stmt->bindValue(2, $updated_approved_signatories );
      $stmt->bindValue(3, "alapa w8 kamu ne!?");
      $stmt->bindValue(4, $doc_id);
      $stmt->execute();

    }//end of if

      if ($stmt) {
        echo "success";
      }
      else {
        echo "error";
      }







 ?>
