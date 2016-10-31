<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "hcrisp", "Password123!", "hcrisp");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user_id = $_POST['selectedUser'];


$query = "SELECT * FROM Posts WHERE author_id = '$user_id'";
$check = $mysqli->query($query);
if($check->num_rows > 0)
{
if($result = $mysqli->query($query))
{
  echo ("User Posts: <br>");
  while($row = $result->fetch_assoc())
  {
    echo "<br>";
    printf("%s Posted: %s\n", $row["author_id"], $row["content"]);
  }
  $result->free();
}
}
else {
  echo "User has not posted anything.";
  exit();
}
$mysqli->close();

?>
<br><a href="AdminHome.html">Return</a>
