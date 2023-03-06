<?php
$db = mysqli_connect('localhost','root','','php_crud');
if ($db->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
