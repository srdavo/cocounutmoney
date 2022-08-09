<?php
  include_once 'partials/header.php';
  include_once 'includes/dbh.inc.php';
  include_once 'includes/functions.php';

  $date = date('20y-m-d');
  sessioncheckoff();
?>

<div class="circle" id="small_circle"></div>
<div class="smoothstart"></div>
<div class="main" style="position: relative">

  <div class="content_holder">
    <a href="mymoney.php" class="back_button"> <img src="resources/back_arrow_256.png" style="width:32px;"></a>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 16px;"></div>
    <h1>Añade un movimiento</h1>
    <!--SEPARADOR--> <div style="margin:0;width:100%; height: 26px;"></div>

    <form action="includes/addmovement.inc.php" method="post" onsubmit="return checkEmpty()">
      <h3>Cantidad</h3>
      <input type="text"  name="amount" placeholder="0000" autocomplete="off" step=".01" maxlength="8">
      <textarea class="" cols="42" rows="5" name="note" placeholder="Nota (Opcional)"></textarea>
      <h3>Fecha</h3>
      <input type="date" name="date" value="<?php echo $date; ?>" >
      <!--SEPARADOR--> <div style="margin:0;width:100%; height: 8px;"></div>

      <button name="submit" id="button" style="float:right;">Aceptar</button>

    </form>


  </div>

  <script type="text/javascript">

  function checkEmpty(){
    border = "1px solid #ba1a1a";
    background = "#ffdad6"
    amountInput = document.querySelector('input[name="amount"]');
    dateInput = document.querySelector('input[name="date"]');
    var amount = document.querySelector('input[name="amount"]').value;
    var date = document.querySelector('input[name="date"]').value;
    var errormessage = "";

    if (amount == "") {
      errormessage += "Amount is empty \n";
      amountInput.style.border = border;
      amountInput.style.backgroundColor = background;
    }
    if (amount == "0") {
      errormessage += "Amount is too small \n";
      amountInput.style.border = border;
      amountInput.style.backgroundColor = background;
    }
    if (date == "") {
      errormessage += "Date is empty \n";
      amountInput.style.border = border;
      amountInput.style.backgroundColor = background;
    }
    if (errormessage != "") {
        console.log(errormessage)
        return false;
    } else {
      circle = document.querySelector('div[class="circle"]');
      circle.style.display = "inline-block";
    }
  }

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

  let textarea = document.querySelector('textarea');
  textarea.addEventListener("keypress", function onEvent(event) {
      if(event.key === "Enter") {
          event.preventDefault();
      }
  });
  </script>

</div>

<?php
  include_once 'partials/footer.php';
?>
