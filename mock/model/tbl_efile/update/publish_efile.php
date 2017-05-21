<?php
  session_start();
  require '..\..\dbConfig.php';
  require '..\..\..\assets\qrcode\src\QrCode.php';
  use Endroid\QrCode\QrCode;

  $doc_id = $_POST['doc_id'];
  $content = $_POST['content'];
  $signatures = $_POST['signatures'];
  $email = $_SESSION['user_email'];
  $published_on = date("Y, F j, g:i a");
  $full_name = $_SESSION['user_fn'] ." ". $_SESSION['user_mn'] ." ". $_SESSION['user_ln'];
  $sql ="SELECT * FROM tbl_efile WHERE doc_id=?";

  $stmt =  $dbConn->prepare($sql);
  $stmt->bindValue(1, $doc_id);
  $stmt ->  execute();
    if ($stmt) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $content = $row['content'];
      $name =  $row['name'];
      $created_on = $row['created_on'];
    }
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


          $final_content = $content.$signatures."<img width='150' height='150' src='../../DB/qrcode/$doc_id.png'>";
          $sql2 = "UPDATE tbl_efile SET published_on=?, status=?, final_content=? WHERE doc_id=?";
          $stmt =  $dbConn->prepare($sql2);
          $stmt->bindValue(1, $published_on);
          $stmt->bindValue(2, "published");
          $stmt->bindValue(3, $final_content);
          $stmt->bindValue(4, $doc_id);
          $stmt ->  execute();


      }








 ?>
