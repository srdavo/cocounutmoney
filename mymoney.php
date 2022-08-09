<?php
  include_once 'partials/header.php';
  include_once 'includes/dbh.inc.php';
  include_once 'includes/functions.php';
  sessioncheckoff();


?>

<div class="circle" id="small_circle"></div>
<div class="smoothstart"></div>
<div class="main">
  <?php
  if (isset($_GET["error"])) {
    if ($_GET["error"] == 'niceadd') { echo '<div class="alert" id="message">Movimiento añadido</div>';}
  }
   ?>

  <div class="content_holder">

    <!-- Esté codigo de aquí es para el funcionamiento del menú desplegable -->
    <div class="header" style="width:100%;">
      <input type="checkbox" id="menu">
        <label for="menu" id="button">  <a class="back"> <img src="resources/menu_256.png" style=" margin-left:6px;width:32px;"></a> </label>
        <div class="dropbox">
          <div class="dropbox_content_holder">
            <a href="account.php" id="button">Mi cuenta <img src="resources/back_arrow_256_right.png" style="width:32px; margin-left: auto;"></a>
            <a href="statistics.php" id="button">Balances<img src="resources/back_arrow_256_right.png" style="width:32px; margin-left: auto;"></a>
            <a href="includes/logout.inc.php" id="button">Cerrar sesión <img src="resources/back_arrow_256_right.png" style="width:32px; margin-left: auto;"></a>
          </div>
        </div>
    </div>


    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
    <div class="moneyholder" id="button" onclick='setTimeout(() =>{window.location.href = "mstatistics.php"; },100)'>
      <h2>Tu dinero</h2>
      <h1><?php echoUserMoney($conn, $userid); ?></h1>
    </div>

      <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>

    <div class="lastMovements_holder">
      <h3 style="margin-left:10px;">Últimos movimientos</h3>
      <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
      <table class="last_movements">
        <?php display3Movements($conn, $userid); //mcount($conn, $userid); ?>
      </table>
    </div>

      <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>

    <div style="display:flex; width:100%;">
      <span style="display:flex; justify-content: flex-start; width:50%;">
         <button id="button1" style="width: calc(100% - 4px); padding:0;">+</button>
       </span>
      <span style="display:flex; justify-content: flex-end; width:50%;">
        <button id="button2" style="width: calc(100% - 4px); padding:0;">Ver todo</button>
      </span>
    </div>

    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 60px;"></div>


  </div>

  <script type="text/javascript">


  var button1 = document.querySelector('[id="button1');
  button1.addEventListener('click', () => {
    button1.style.animation="fullscreen-animation 1.2s cubic-bezier(.2,-0.01,0,.99)";
    button1.style.color="transparent";
    setTimeout(() =>{
      window.location.href = "addmovement.php";
      button1.style.animationPlayState = 'paused';
      setTimeout(() =>{
        circle = document.querySelector('div[class="circle"]');
        circle.style.display = "inline-block";
      },600)
      setTimeout(() =>{
        button1.style.animation="fullscreen-animation-end 0.5s cubic-bezier(.2,-0.01,0,.99)";
        button1.style.color="rgba(255, 255, 255, 0.87)";
      },3000)
    },200)
  })

  var button2 = document.querySelector('[id="button2');
  button2.addEventListener('click', () => {
    button2.style.animation="fullscreen-animation 1.2s cubic-bezier(.2,-0.01,0,.99)";
    button2.style.color="transparent";
    setTimeout(() =>{
      window.location.href = "mymovements.php";
      button2.style.animationPlayState = 'paused';
      setTimeout(() =>{
        circle = document.querySelector('div[class="circle"]');
        circle.style.display = "inline-block";
      },600)
      setTimeout(() =>{
        button2.style.animation="fullscreen-animation-end 0.5s cubic-bezier(.2,-0.01,0,.99)";
        button2.style.color="rgba(255, 255, 255, 0.87)";
      },3000)
    },200)
  })




const buttons = document.querySelectorAll('[id="button"]');
buttons.forEach(btn => {
  btn.addEventListener('mousedown', function(e){
    var body = document.querySelector('[class="main"]');

    let x = e.pageX - e.target.offsetLeft - body.offsetLeft;
    let y = e.pageY - e.target.offsetTop - body.offsetTop;

    let ripples = document.createElement('span');
    ripples.style.left = x + 'px';
    ripples.style.top = y + 'px';
    this.appendChild(ripples);

    ripples.classList.add('ripple')
    setTimeout(() =>{
      ripples.remove();
    },1000)
  })
})

  </script>

</div>

<?php
  include_once 'partials/footer.php';
?>
