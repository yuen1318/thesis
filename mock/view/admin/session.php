<?php
  #if session exist
  if (isset($_SESSION["admin_email"]) &&  isset($_SESSION["admin_password"]) ) {
    #do nothing
  }

  #if session doesnt exist
  else {
    header("Location:logout.php");
  }
?>
