<?php


function userexists($conn, $name) {
  $sql = "SELECT  * FROM users WHERE user = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function openuser($conn, $name, $pwd) {
  $uidExist = userexists($conn, $name);

  if (isset($_COOKIE['uid'])) {
  unset($_COOKIE['uid']);
  unset($_COOKIE['pwd']);
}

  if ($uidExist === false) {
    header("location: ../login.php?error=usersdoesnotexist");
    exit();
  }

  $pwdHashed = $uidExist["pwd"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location: ../login.php?error=wrongpwd");
    exit();
  }
  else if ($checkPwd === true){
      session_start();

      setcookie("uid", "$name",  time()+(10 * 365 * 24 * 60 * 60), "/");
      setcookie("pwd", "$pwd", time()+(10 * 365 * 24 * 60 * 60), "/");
      $_SESSION["id"] = $uidExist["id"];
      $_SESSION["user"] = $uidExist["user"];

      header("location: ../mymoney.php");
      exit();
  }
}

function createuser($conn, $name, $pwd){
  $sql = "INSERT INTO users (user, pwd) VALUES (?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();}
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ss", $name, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

}

function echoUserMoney($conn, $userid){
  $sql = "SELECT * FROM users WHERE id='$userid';";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
    $usermoney = $row["usermoney"];
    echo "$".number_format($usermoney, 2);
    }
  }
}

function addmovement($conn, $amount, $note, $date, $userid, $hora){
  $sql = "INSERT INTO movements (amount, note, fecha, userid, hora) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();}

  mysqli_stmt_bind_param($stmt, "dssis", $amount, $note, $date, $userid, $hora);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

}
function addamount($conn, $userid){
  $sql = "SELECT * FROM movements WHERE userid=$userid ORDER BY id DESC LIMIT 1;";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $amount = $row["amount"];

      $sql = "SELECT * FROM users WHERE id=$userid;";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $usermoney = $row["usermoney"];
          $new_usermoney = $amount + $usermoney;

          $sql = "UPDATE users SET usermoney=$new_usermoney WHERE id='$userid';";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../mymoney.php?error=connfailed");
          }
          mysqli_stmt_execute($stmt);

            header("location: ../mymoney.php?error=niceadd");
            exit();
        }
      }
    }
  }
}

function displayMovements($conn, $userid){
  $sql = "SELECT * FROM movements WHERE userid='$userid' ORDER BY fecha DESC, hora DESC;";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
    $movementid = $row ["id"];
    $amount = $row["amount"];
    $note = $row["note"];
    $date = $row["fecha"];
    $date_new = date("j M y", strtotime($date));

    echo "
    <tr>
    <td class='date'>".$date_new."</td>
    <td class='amount'>"."$".number_format($amount, 2)."</td>
    <td class='button'><a href='movementdetails.php?user=".$userid."&movement=".$movementid."' style='font-size:32px'>...</a></td>
    </tr>
    ";
   }
  }
}
function display3Movements($conn, $userid){
  $sql = "SELECT * FROM movements WHERE userid='$userid' ORDER BY fecha DESC,hora DESC LIMIT 3;";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
    $amount = $row["amount"];
    $note = $row["note"];
    $date = $row["fecha"];
    $date_new = date("j M y", strtotime($date));

    echo "
    <tr>
    <td class='date'>".$date_new."</td>
    <td class='amount'>"."$ ".number_format($amount, 2)."</td>
    </tr>
    ";
   }
 }
}


function sessioncheckoff(){
   if (!isset($_SESSION["id"])) {
     header("location: index.php");
     exit();
   }
 }


function mcount($conn, $userid){
  $sql = "SELECT COUNT(*) FROM movements WHERE userid='$userid';";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $movements_count = $row["COUNT(*)"];
        if ($movements_count == 0) {
          echo "
          <tr>
          <td class='date'>-</td>
          <td class='amount' style='border-radius: 0 26px 26px 0;'></td>
          </tr>
          ";
        }}}}

  function delteMovement($conn, $userid, $movementid, $amount){
    $sql = "DELETE FROM movements WHERE userid=$userid AND id=$movementid;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../mymovements.php?error=connfailed");
    }
    mysqli_stmt_execute($stmt);

//
    $sql = "SELECT * FROM users WHERE id=$userid;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $usermoney = $row["usermoney"];
        $negative = (-1);
        $amount_float = (float)$amount;
        $amount_opposite = $amount_float * $negative;

        $new_usermoney = $usermoney + $amount_opposite;

        $sql = "UPDATE users SET usermoney=$new_usermoney WHERE id='$userid';";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("location: ../mymoney.php?error=connfailed");
        }
        mysqli_stmt_execute($stmt);

          header("location: ../mymovements.php?error=nicedelete");
          exit();
      }
    }
//
  }



  function echoIngresado($conn, $userid, $date){
    $sql = "SELECT SUM(amount) FROM movements WHERE userid=$userid AND amount > 0 AND MONTH(fecha)=$date;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $sum = $row["SUM(amount)"];
        echo "$".number_format($sum, 2);
      }
    }
  }

  function echoGastado($conn, $userid, $date){
    $sql = "SELECT SUM(amount) FROM movements WHERE userid=$userid AND amount < 0 AND MONTH(fecha)=$date;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $sum = $row["SUM(amount)"];
        echo "$".number_format($sum, 2);
      }
    }
  }

  function echoBalance($conn, $userid, $date){
    $sql = "SELECT SUM(amount) FROM movements WHERE userid=$userid AND MONTH(fecha)=$date;;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $sum = $row["SUM(amount)"];
        echo "$".number_format($sum, 2);
      }
    }
  }


  function fullBalance($conn, $userid, $date){
    $sql = "SELECT SUM(amount) FROM movements WHERE userid=$userid AND MONTH(fecha)=$date;;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $sum = $row["SUM(amount)"];
        echo "$".number_format($sum, 2);
      }
    }
  }

  function echoAnything($conn, $userid, $rowname){
    $sql = "SELECT * FROM users WHERE id='$userid';";
    $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
      $rowdata = $row[$rowname];
      echo $rowdata;
  }


?>
