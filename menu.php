<?php
  include_once 'partials/header.php';
  include_once 'includes/dbh.inc.php';
  include_once 'includes/functions.php';
  sessioncheckoff();
?>
<div class="smoothstart" style="background-color:#AAD9BD"></div>
  <div class="main">
    <div class="content_holder" style="flex-direction: column">
      <div class="mini_header">
        <a href="mymoney.php" id="button" class="back" > <img src="resources/back_arrow_256.png" style="width:32px;"></a>
      </div>
      <h1>Menú</h1>
      <!--SEPARADOR--> <div style="margin:0;width:100%; height: 26px;"></div>
      <a href="details.php" class="menu">Detalles <img src="resources/back_arrow_256_right.png" style="width:32px; margin-left: auto;"></a>
      <a href="includes/logout.inc.php" class="menu"
      style="margin-top:auto; bottom: 32px; background-color:#BA1A1A; color:#FFDAD6;">Cerrar sesión</a>

    </div>
  </div>

<?php
  include_once 'partials/footer.php';
?>
