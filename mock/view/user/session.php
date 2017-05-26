<?php
  #if session exist
  if (isset($_SESSION["user_email"]) &&  isset($_SESSION["user_password"]) ) {
    #do nothing
  }

  #if session doesnt exist
  else {
    header("Location:logout.php");
  }
?>
