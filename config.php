<?php
$username = "root";
$password = "";
$server   = "localhost";
$dbname   = "crud";

$connect = new mysqli($server, $username, $password, $dbname);

if ($connect->connect_error) {
  die("Không kết nối :" . $conn->connect_error);
  exit();
}
?>