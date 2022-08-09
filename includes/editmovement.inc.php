<?php
session_start();
if (isset($_POST["delete"])) {
$userid = $_SESSION["id"];
$amount = $_POST["amount"];
$note = $_POST["note"];
$date = $_POST["date"];
$movementid = $_POST["movementid"];

require_once 'dbh.inc.php';
require_once 'functions.php';

delteMovement($conn, $userid, $movementid, $amount);

echo $amount;
}
else {
  header("location: ../signup.php");
}



 ?>
