<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "hcrisp", "Password123!", "hcrisp");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$poststodelete = $_POST['delete'];

if(empty($poststodelete))
{
  echo("No values selected!");
  exit();
}
else {
  foreach($poststodelete as $post)
  {
    $query = "DELETE FROM Posts WHERE post_id='{$post}'";
    if($mysqli->query($query))
    {
      echo "'{$post}' was deleted!<br>";
    }
  }
}


$mysqli->close();
?>
<br><a href="AdminHome.html">Return</a>
