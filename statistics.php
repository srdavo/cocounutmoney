<?php
  include_once 'partials/header.php';
  include_once 'includes/dbh.inc.php';
  include_once 'includes/functions.php';
  sessioncheckoff();



?>

<div class="main">
  <div class="content_holder">
    <a href="mymoney.php" class="back_button"><img src="resources/back_arrow_256.png" style="width:32px;"></a>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
    <h1>Balance de cada mes</h1>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 26px;"></div>

    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Enero</h2>
      <h1><?php $date = '01'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Febrero</h2>
      <h1><?php $date = '02'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Marzo</h2>
      <h1><?php $date = '03'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Abril</h2>
      <h1><?php $date = '04'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Mayo</h2>
      <h1><?php $date = '05'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Junio</h2>
      <h1><?php $date = '06'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Julio</h2>
      <h1><?php $date = '07'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Agosto</h2>
      <h1><?php $date = '08'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Septiembre</h2>
      <h1><?php $date = '09'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Octubre</h2>
      <h1><?php $date = '10'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Noviembre</h2>
      <h1><?php $date = '11'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Diciembre</h2>
      <h1><?php $date = '12'; fullBalance($conn, $userid, $date); ?></h1>
    </div>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 36px;"></div>
  </div>
</div>


<?php
  include_once 'partials/footer.php';
?>
