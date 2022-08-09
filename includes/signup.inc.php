<?php
if (isset($_POST["submit"])) {
$name = $_POST["name"];
$pwd = $_POST["pwd"];
$pwdrepeat = $_POST["pwdrepeat"];

require_once 'dbh.inc.php';
require_once 'functions.php';

if (userexists($conn, $name) !== false) {
  header("location: ../signup.php?error=usertaken");
  exit();
}

createuser($conn, $name, $pwd);
openuser($conn, $name, $pwd);

}
else {
  header("location: ../signup.php");
}


?>
