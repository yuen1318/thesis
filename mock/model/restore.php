<?php
/* fill in your database name */
$database_name = "mock";
  $mysqli = new mysqli("localhost", "root", "", "mock");
/* connect to MySQL */
if (!$mysqli) {
  die("Could not connect: " . mysqli_error());
}
  
/* query all tables */
$sql = "SHOW TABLES FROM $database_name";
if($result = $mysqli->query($sql)){
  /* add table name to array */
  while($row = mysqli_fetch_row($result)){
    $found_tables[]=$row[0];
  }
}
else{
  die("Error, could not list tables. MySQL Error: " . mysqli_error());
}
  
/* loop through and drop each table */
foreach($found_tables as $table_name){
  $sql = "DROP TABLE $database_name.$table_name";
  if($result = $mysqli->query($sql)){
    //echo "Success - table $table_name deleted.";
  }
  else{
    //echo "Error deleting $table_name. MySQL Error: " . mysqli_error() . "";
  }
}


$filename = 'mock.sql';

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
 $mysqli->query($templine);
    // Reset temp variable to empty
    $templine = '';
}
}
 //echo "Tables imported successfully";
 unlink("mock.sql");
 header("Location:../view/restore_success.php");

?>


