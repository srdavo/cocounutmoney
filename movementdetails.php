<?php
  include_once 'partials/header.php';
  include_once 'includes/dbh.inc.php';
  include_once 'includes/functions.php';
  sessioncheckoff();

  $movementid = $_GET["movement"];
  $userid = $_GET["user"];

  if ($userid != $_SESSION["id"]) {
    header("location: mymovements.php");
    exit();
  }

  $sql = "SELECT * FROM movements WHERE userid='$userid' AND id='$movementid';";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
     $amount = $row["amount"];
     $note = $row["note"];
     $date = $row["fecha"];
     $date_new = date("j M Y", strtotime($date));
   }
  }
?>



  <div class="main" style="position: relative">
    <div class="content_holder">

        <a onclick="history.back()" id="button" class="back_button"> <img src="resources/back_arrow_256.png" style="width:32px;"></a>

        <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
      <form action="includes/editmovement.inc.php" method="post">
        <h1>Detalles</h1>
        <!--SEPARADOR--> <div style="margin:0;width:100%; height: 26px;"></div>
        <h2>Cantidad</h2>
        <input value="<?php echo "$ ".number_format($amount, 2);?>"readonly>

        <textarea cols="42" rows="5" readonly name="note"><?php echo $note; ?></textarea>

        <h2>Fecha</h2>
        <input value="<?php echo $date_new; ?>"readonly name="date">
        <input value="<?php echo $movementid;?>" readonly name="movementid" style="display:none;">
        <input value="<?php echo $amount;?>" readonly name="amount" style="display:none;">

        <button class="delete" style="width:100%;" name="delete">Eliminar Movimiento</a>
      </form>


    </div>


  </div>

<?php
  include_once 'partials/footer.php';
?>
