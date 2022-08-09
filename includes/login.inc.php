<?php
require_once 'dbh.inc.php';
require_once 'functions.php';

if (isset($_COOKIE['uid'])) {
$name= $_COOKIE['uid'];
$pwd= $_COOKIE['pwd'];
openuser($conn, $name, $pwd);
}


if (isset($_POST["submit"])) {
$name = $_POST["name"];
$pwd = $_POST["pwd"];

openuser($conn, $name, $pwd);

}
else {
  header("location: ../signup.php");
}
