<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "hcrisp", "Password123!", "hcrisp");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user_id = "SELECT user_id FROM Users";

if($result = $mysqli->query($user_id))
{
echo("Users:<br>");
while($row = $result->fetch_assoc())
{
  printf("%s\n", $row["user_id"]);
  echo("<br>");
}
$result->free();
}
$mysqli->close();
?>
<br><a href="AdminHome.html">Return</a>
