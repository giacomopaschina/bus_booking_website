<?php
/* stampa banner */
function print_banner() {
echo <<<STAMPA
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
<title>Trova un posto!</title>
<link rel="stylesheet" type="text/css" href="comuni/stile.css"/>
</head>

<body>
<div id="banner">
<a href="index.php" title="Torna all'homepage"><img id="logo"
src="images/home2.jpg" alt="home" border="0"/></a>
<span id="title">Trova un posto sul 270!</span>
</div>
<!-- end banner -->\n
STAMPA;
}

/* stampa barra dei menu */
function print_menu($nome, $cognome) {
echo <<<STAMPA
<!-- begin menu -->
<div id="menu">
| <a href="index.php">home</a>
| <a href="sceltagiornoprenotazioni.php">prenota</a>
| <a href="carrello.php">carrello</a>
| <a href="modifica.php">modifica profilo</a>
| <a href="contattaci.php">contattaci</a>
| <a href="rimborso.php">rimborso</a>
| <a href="cancella.php">cancella profilo</a>
|
<right>Sei loggato come $nome $cognome (<a href="esci.php">esci</a>)&nbsp;&nbsp;&nbsp;</right><br>
</div>

 <script type="text/javascript">
 var host = window.location.host;
 var altPressed = false;
 var ctrlPressed = false;


   if (document.addEventListener)

       {
          document.addEventListener("keydown",keydown,false);
          document.addEventListener("keypress",keypress,false);
          document.addEventListener("keyup",keyup,false);
       }
       else if (document.attachEvent)
       {
          document.attachEvent("onkeydown", keydown);
          document.attachEvent("onkeypress", keypress);
          document.attachEvent("onkeyup", keyup);

       }
       else
       {
          document.onkeydown= keydown;
          document.onkeypress= keypress;
          document.onkeyup= keyup;
       }



   function keyup(e)
   {
       if(e.which == 18) altPressed = false;
       if(e.which == 17) ctrlPressed = false;
   }
   function keypress(e)
   {

   }

   function keydown(e)
   {
     if(e.which == 18) altPressed = true;
     else if(e.which == 17) ctrlPressed = true;
     else if(altPressed && ctrlPressed && String.fromCharCode(e.which) == "C")
         {
           location.href = "http://"+host+"/~m3170069/prontopizza1/carrello.php"
         }
     else if(altPressed && ctrlPressed && String.fromCharCode(e.which) == "P")
         {
           location.href = "http://"+host+"/~m3170069/prontopizza1/sceltagiornoprenotazioni.php"
         }
      else if(altPressed && ctrlPressed && String.fromCharCode(e.which) == "K")
         {
           location.href = "http://"+host+"/~m3170069/prontopizza1/cancella.php"
         }
         else if(altPressed && ctrlPressed && String.fromCharCode(e.which) == "M")
         {
           location.href = "http://"+host+"/~m3170069/prontopizza1/modifica.php"
         }
         else if(altPressed && ctrlPressed && String.fromCharCode(e.which) == "H")
         {
           location.href = "http://"+host+"/~m3170069/prontopizza1/contattaci.php"
         }       
   }


</script>


<!-- end menu -->\n

STAMPA;
}

/*stampa form di login */
function print_formlogin() {
echo <<<STAMPA
<!-- begin form login -->
<div id="menu">
<span id="register"><a href="register.php">non sei ancora registrato?</a>&nbsp;</span>
<form id="login"  name="modulo1" action="#" method="post">
<input class="inputfield" type="text" name="user" value="e-mail" />
<input class="inputfield" type="password" name="pwd" />
<input class="submitbutton"type="button" name="entra" value="entra" onclick="Modulo1()"/> &nbsp;
</form>
</div>
<!-- end form login -->
STAMPA;
}

/* stampa footer */
function print_footer() {
echo <<<STAMPA
<!-- begin footer -->
<div id="footer"> Trova un posto. Sede legale: Genova, Via F.Maritano.
P.IVA: 270270270270
<br/>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
</div></body></html>
<!-- end footer -->
STAMPA;
}

function print_banner2() {
echo <<<STAMPA
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
<title>Banca online</title>
<link rel="stylesheet" type="text/css" href="comuni/stilebanca.css"/>
</head>

<body>
<div id="banner2">
<a href="index.php" title="Torna all'homepage"><img id="logo"
src="images/home2.jpg" alt="home" border="0"/></a>
<a href="modifica.php" title="Aggiungi denaro"><img id="euro"
src="images/euro.png" alt="home" border="0"/></a>
<span id="title2">Banca</span>
</div>
<!-- end banner -->\n
STAMPA;
}
?>
<script type="text/javascript">
 <!--
  function Modulo1() {
     // Variabili associate ai campi del modulo

           document.modulo1.action = "login.php";
           document.modulo1.submit();

  }
 -->
</script>