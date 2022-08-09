
<?php
  include_once 'partials/header.php';
  if (isset($_SESSION["id"])) {
    header("location: mymoney.php");
  }
  if (isset($_COOKIE['uid'])) {
    header("location: includes/login.inc.php");
  }
?>


<div class="smoothstart"></div>
<div class="circle"></div>

<div class="main" style="align-content: flex-end; ">

  <?php
  if (isset($_GET["error"])) {
    $error = $_GET["error"];
    switch ($error) {
      case 'usersdoesnotexist':
        echo '<div class="alert" id="error">El usuario no existe</div>';
        break;
      case 'wrongpwd':
        echo '<div class="alert" id="error">Contraseña incorrecta</div>';
        break;
    }
  }

  ?>


  <div class="content_holder" style="justify-content: flex-end">

    <h1 style="font-size:60px; line-height:52px;">Inicia <br>sesión</h1>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 26px;"></div>
  <form action="includes/login.inc.php" method="post" onsubmit="return checkEmpty()">

    <h3>Nombre</h3>
    <input type="text" name="name" autocomplete="off">
    <h3>Contraseña</h3>
    <input type="password" name="pwd" autocomplete="off">

    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 36px;"></div>
    <button name="submit" id="button1" style="width:100%;">Aceptar</button>

  </form>
  <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>

    <a href="signup.php" class="minilink" id="button"> Registrate </a>



  </div>

  <script type="text/javascript">



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
  function checkEmpty(){
    border = "1px solid #ba1a1a";
    background = "#ffdad6"
    usernameInput = document.querySelector('input[name="name"]');
    pwdInput = document.querySelector('input[name="pwd"]');
    var username = document.querySelector('input[name="name"]').value;
    var pwd = document.querySelector('input[name="pwd"]').value;
    var errormessage = "";

    if (username == "") {
      errormessage += "Username is empty \n";
      usernameInput.style.border = border;
      usernameInput.style.backgroundColor = background;
    }
    if (pwd == "") {
      errormessage += "Password is empty \n";
      pwdInput.style.border = border;
      pwdInput.style.backgroundColor = background;
    }

    if (errormessage != "") {
        console.log(errormessage)
        return false;
    } else {
      circle = document.querySelector('div[class="circle"]');
      circle.style.display = "inline-block";
    }
  }

  </script>
</div>
<?php
  include_once 'partials/footer.php';
?>
