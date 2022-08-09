<?php
  include_once 'partials/header.php';
  include_once 'includes/dbh.inc.php';
  include_once 'includes/functions.php';
  sessioncheckoff();
?>
<div class="smoothstart"></div>
<div class="main" style="position: relative">

  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == 'nicedelete') { echo '<div class="alert" id="message">Movimiento eliminado</div>';}
  }
  ?>


  <div class="content_holder">
    <a href="mymoney.php" class="back_button"><img src="resources/back_arrow_256.png" style="width:32px;"></a>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
    <h1>Movimientos</h1>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 26px;"></div>
    <table class="movements">
      <?php displayMovements($conn, $userid);mcount($conn, $userid); ?>
    </table>

  </div>

  <script type="text/javascript">
  setTimeout(() => {
  const message = document.getElementById('message');
  message.style.display = 'none';
}, 3300);
  </script>



</div>

<?php
  include_once 'partials/footer.php';
?>
