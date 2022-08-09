<?php
  include_once 'partials/header.php';
  include_once 'includes/dbh.inc.php';
  include_once 'includes/functions.php';
  sessioncheckoff();

  $date=date("m");

?>

<div class="main">
  <div class="content_holder">
    <a href="mymoney.php" class="back_button"><img src="resources/back_arrow_256.png" style="width:32px;"></a>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
    <h1>Este mes</h1>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 26px;"></div>

    <div class="moneyholder" id="small">
      <h2>Has ingresado:</h2>
      <h1> <?php echoIngresado($conn, $userid, $date); ?></h1>
    </div>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
    <div class="moneyholder" id="negative">
      <h2>Has gastado:</h2>
      <h1><?php echoGastado($conn, $userid, $date); ?></h1>
    </div>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
    <div class="moneyholder" id="neutral" style="padding: 69px 24px;">
      <h2>Tu balance es: </h2>
      <h1><?php echoBalance($conn, $userid, $date); ?></h1>
    </div>

  </div>
</div>


<?php
  include_once 'partials/footer.php';
?>
