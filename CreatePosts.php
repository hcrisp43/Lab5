<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "hcrisp", "Password123!", "hcrisp");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$author_id = $_POST["author_id"];
$content = $_POST["content"];

if($content == '' || $author_id == '')
{
  echo("Text field empty.");
  exit();
}

$checkuser = "SELECT user_id FROM Users WHERE user_id = '$author_id'";
$result = $mysqli->query($checkuser);
if($result->num_rows == 0)
{
  echo("User not found.");
  exit();
}
else {
  $query = "INSERT INTO Posts (author_id, content) VALUES ('$author_id', '$content')";
  if($mysqli->query($query))
  {
    echo("Post successfully added.<br>");
  }
}

$mysqli->close();
?>
<br><a href="AdminHome.html">Return</a>
