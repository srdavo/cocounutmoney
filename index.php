<?php
  include_once 'partials/header.php';
  include_once 'includes/dbh.inc.php';
  include_once 'includes/functions.php';

  if (isset($_COOKIE['uid'])) {
    header("location: includes/login.inc.php");
  }
?>

<div class="main" style="align-content: flex-end;">
  <div class="content_holder">
    <h1 style="font-size:60px;">Cocounut</h1>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 26px;"></div>
    <h2 style="font-size:48px; font-weight:400; line-height:52px;">Lleva un control del dinero que guardas</h2>
    <button id="button1" style="margin-top:36px; width:100%;">Comenzar</button>
  </div>


  <script type="text/javascript">
  var button1 = document.querySelector('[id="button1');
  button1.addEventListener('click', () => {
    button1.style.animation="fullscreen-animation 1.2s cubic-bezier(.2,-0.01,0,.99)";
    button1.style.color="transparent";
    setTimeout(() =>{
      window.location.href = "login.php";
      button1.style.animationPlayState = 'paused';
      setTimeout(() =>{
        button1.style.animation="fullscreen-animation-end 0.5s cubic-bezier(.2,-0.01,0,.99)";
        button1.style.color="rgba(255, 255, 255, 0.87)";
      },3000)
    },200)
  })
  </script>

</div>

<?php
  include_once 'partials/footer.php';
?>
