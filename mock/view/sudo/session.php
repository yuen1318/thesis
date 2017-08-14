<?php
  #if session exist
  if (isset($_SESSION["sudo_email"]) &&  isset($_SESSION["sudo_password"]) ) {
    #do nothing
  }

  #if session doesnt exist
  else {
    header("Location:logout.php");
  }
?>
