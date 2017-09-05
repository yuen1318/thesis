<?php
  session_start();
  date_default_timezone_set('Asia/Manila');
  require '../../dbConfig.php';
  require '../../../assets/qrcode/src/QrCode.php';
  use Endroid\QrCode\QrCode;

  $update_on = date("Y, F j, g:i a");

  $full_name = $_SESSION["user_fn"]. " " .$_SESSION["user_mn"]. " " .$_SESSION["user_ln"];
  $doc_id = $_POST['doc_id'];
  $content = $_POST['content'];
  $signatures = $_POST['signatures'];
  $email = $_SESSION['user_email'];
  $published_on = date("Y, F j, g:i a");
  $user_info ="<b>".$_SESSION['user_department'].":</b></br></br>".$_SESSION['user_fn']." ".$_SESSION['user_mn']." ".$_SESSION['user_ln']. "</br>". $email. "</br><i>". $_SESSION['user_title']."</i>";
  $sql ="SELECT * FROM tbl_efile WHERE doc_id=?";

  $stmt =  $dbConn->prepare($sql);
  $stmt->bindValue(1, $doc_id);
  $stmt ->  execute();
    if ($stmt) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $content = $row['content'];
      $name =  $row['name'];
      $created_by =  $row['created_by'];
      $signatories =  $row['signatories'];
      $created_on = $row['created_on'];
    }//end of if 
      if ($stmt) {



          $qrcode_content= "Document ID:". "\t" .$doc_id. "\n".
                           "Document Name:" . "\n \t" .$name. "\n".
                           "Created By:". "\n \t"  .$full_name. "\n".
                           "Email:". "\n \t". $email. "\n".
                           "Created On:" . "\n \t" .$created_on. "\n".
                           "Published On:" . "\n \t" .$published_on;


          $qrCode = new QrCode();

          $qrCode
              ->setText($qrcode_content)
              ->setSize(300)
              ->setPadding(10)
              ->setErrorCorrection('high')
              ->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0])
              ->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0])
              ->setLabel('Scan the code')
              ->setLabelFontSize(16)
              ->setImageType(QrCode::IMAGE_TYPE_PNG)
          ;

          // now we can directly output the qrcode
          header('Content-Type: '.$qrCode->getContentType());
          $qrCode->render();

          // save it to a file
          $qrCode->save('../../../DB/qrcode/'.$doc_id.'.png');


          $final_content = $content.$signatures."<img width='150' height='150' style='float:right !important; 'src='../../DB/qrcode/$doc_id.png'>";
          $sql2 = "UPDATE tbl_efile SET published_on=?, status=?, final_content=? WHERE doc_id=?";
          $stmt =  $dbConn->prepare($sql2);
          $stmt->bindValue(1, $published_on);
          $stmt->bindValue(2, "published");
          $stmt->bindValue(3, $final_content);
          $stmt->bindValue(4, $doc_id);
          $stmt ->  execute();


      }// end of if
 
      if ($stmt) {

        $date = date("Y, F j");
        $time = date("g:i a");
 
        $sql3 = "INSERT INTO tbl_news(doc_id,name,email,date,time,signatories,pending_signatories,approved_signatories,msg,photo,created_by) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $dbConn->prepare($sql3);
        $stmt->bindValue(1, $doc_id);
        $stmt->bindValue(2, $name);
        $stmt->bindValue(3, $user_info);
        $stmt->bindValue(4, $date);
        $stmt->bindValue(5, $time);
        $stmt->bindValue(6, $signatories);
        $stmt->bindValue(7, "");
        $stmt->bindValue(8, $signatories );
        $stmt->bindValue(9, "has published an efile");
        $stmt->bindValue(10, $email.".jpg");
        $stmt->bindValue(11, $created_by);
        $stmt->execute();

          if ($stmt) {
            $sql4 = "INSERT INTO tbl_efile_trgr(doc_id,name,pending_signatories,approved_signatories,disapproved,comment,status,action,date_time) VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = $dbConn->prepare($sql4);
            $stmt->bindValue(1, $doc_id);
            $stmt->bindValue(2, $name);
            $stmt->bindValue(3, "" );
            $stmt->bindValue(4, $signatories);
            $stmt->bindValue(5, "");
            $stmt->bindValue(6, "");
            $stmt->bindValue(7, "published");
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
