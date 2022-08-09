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
    <div class="moneyholder" id="neutral" style="margin-bottom:16px;">
      <h2>Nombre de la cuenta:</h2>
      <h1> <?php $rowname = "user"; echoAnything($conn, $userid, $rowname); ?> </h1>
    </div>
    <h3 style="position:absolute; bottom:16px; width: calc(100% - 52px);opacity:60%; font-size:12px; line-height:normal;">Para mantener tu sesión iniciada, se están utilizando cookies, lo cual crea un gran hoyo en la seguridad de tu cuenta, si te gustaria desactivar esta opción, pues no puedes.
</h3>

  </div>
</div>

<?php
  include_once 'partials/footer.php';
?>
