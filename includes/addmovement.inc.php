<?php
session_start();
if (isset($_POST["submit"])) {
$userid = $_SESSION["id"];
$amount = $_POST["amount"];
$note = $_POST["note"];
$date = $_POST["date"];
date_default_timezone_set('America/Mazatlan');
$hora = date("H:i:s");


require_once 'dbh.inc.php';
require_once 'functions.php';

addmovement($conn, $amount, $note, $date, $userid, $hora);
addamount($conn, $userid);

}
else {
  header("location: ../signup.php");
}



 ?>
