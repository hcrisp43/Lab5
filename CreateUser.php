<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


$mysqli = new mysqli("mysql.eecs.ku.edu", "hcrisp", "Password123!", "hcrisp");
$user_id = $_POST["user_id"];
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if($user_id == '')
{
  echo("Text field empty");
  exit();
}

$query = "INSERT INTO Users (user_id) VALUES ('$user_id')";
if($mysqli->query($query)) {
  echo("User successfully added.");
}
else {
  echo("User already exists.");
  exit();
}


$mysqli->close();
?>
<br><a href="AdminHome.html">Return</a>
