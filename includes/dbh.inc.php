<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cocounutmoney";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
  die("connectino failed: ". mysqli_connect_error());
}
?>
