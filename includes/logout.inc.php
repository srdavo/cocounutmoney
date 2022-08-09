<?php

if (isset($_COOKIE['uid'])) {
  unset($_COOKIE['uid']);
  unset($_COOKIE['pwd']);
  setcookie('uid', null, -1, '/');
  setcookie('pwd', null, -1, '/');
}


session_start();
session_unset();
session_destroy();



header ("location: ../index.php");
exit();
