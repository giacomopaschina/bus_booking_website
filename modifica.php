<?php
    session_start();
    require_once("comuni/header.php");
    require_once("comuni/utility.php");
    if(!IsSet($_SESSION['user']))
    {
    ?>
<script type="text/javascript">
    alert("Per visualizzare questa pagina devi essere registrato!");
    location.href="index.php";
</script>
<?php
    }
?>

    <div id="immagine">
        <h1>Modifica il tuo profilo!</h1>
            <h2>
                 puoi anche aggiornare esclusivamente il saldo della tua carta di credito
                 lasciando gli altri campi vuoti.
            </h2>


    <form name="modulo" action="#" method="get">
        <table align="center" >
        <tr><td><h2>Indirizzo E-mail:</h2></td><td><input type="text" name="email" /></td></tr>
        <tr><td><h2>Password:</h2></td><td> <input type="password" name="pwd" /></td></tr>
        <tr><td><h2>Conferma Password:</h2></td><td> <input type="password" name="pwd2" /></td></tr>
        <tr><td><h2>Indirizzo:</h2></td><td> <input type="text" name="indirizzo" /></td></tr>
        <tr><td><h2>Citta':</h2></td><td> <input type="text" name="city" /></td></tr>
        <tr><td><h2>Numero Carta di Credito:</h2></td><td> <input type="text" name="numero" /></td></tr>
        <tr><td><h2> Nuovo saldo carta:</h2></td><td> <input type="text" name="saldo" /></td></tr>

        </table>
        <br />
    <center>
        <input type="button" name="Invia" value="modifica" onclick="Modulo()"/>
    </center>
    </form>
    </div>

<script type="text/javascript" >
 <!--
  function Modulo() 
  {
      // Variabili associate ai campi del modulo
     var email = document.modulo.email.value;
     var password = document.modulo.pwd.value;
     var conferma = document.modulo.pwd2.value;
     var indirizzo = document.modulo.indirizzo.value;
     var citta = document.modulo.city.value;
     var saldo = document.modulo.saldo.value;
     var numerocarta = document.modulo.numero.value;
     var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;

        if(((email == "") ||(email == "undefined"))&&((password == "")
            ||(password == "undefined"))&&((conferma == "") || (conferma == "undefined"))
            &&((indirizzo == "")||(indirizzo == "undefined")) &&
             ((citta == "")||(citta == "undefined")))
          {
              if((saldo == "") ||(saldo == "undefined"))
                  {alert("Il campo saldo e' obbligatorio.");
          document.modulo.saldo.focus();
          return false;
        }
        else{

        alert("La modifica riguarda solo il saldo della carta.");
           document.modulo.action = "verifymodifica.php";
           document.modulo.submit();

        }}
        else
        {
        //Effettua il controllo sul campo PASSWORD
          if ((password == "") || (password == "undefined")) {
           alert("Il campo Password e' obbligatorio.");
           document.modulo.password.focus();
           return false;
        }
        //Effettua il controllo sul campo CONFERMA PASSWORD
        else if ((conferma == "") || (conferma == "undefined")) {
           alert("Il campo Conferma password e' obbligatorio.");
           document.modulo.conferma.focus();
           return false;
        }
        //Verifica l'uguaglianza tra i campi PASSWORD e CONFERMA PASSWORD
        else if (password != conferma) {
           alert("La password confermata e' diversa da quella scelta, controllare.");
           document.modulo.conferma.value = "";
           document.modulo.conferma.focus();
           return false;
        }
        //Effettua il controllo sul campo CITTA'
        else if ((citta == "") || (citta == "undefined")) {
          alert("Il campo Citta' e' obbligatorio.");
          document.modulo.city.focus();
          return false;
        }
        //Effettua il controllo sul campo INDIRIZZO
        else if ((indirizzo == "") || (indirizzo == "undefined")) {
           alert("Il campo Indirizzo e' obbligatorio.");
           document.modulo.indirizzo.focus();
           return false;
        }
         else if ((numerocarta == "") || (numerocarta == "undefined")) {
           alert("Il campo carta e' obbligatorio.");
           document.modulo.numerocarta.focus();
           return false;
        }
        else if(numerocarta<16){
        alert("il numero della carta non e' corretto");
        document.modulo.numerocarta.focus();
           return false;}

        else if (!email_reg_exp.test(email) || (email == "") || (email == "undefined")) {
        alert("Inserire un indirizzo email corretto.");
        document.modulo.email.select();
        return false;
        }
         //Effettua il controllo sul campo INDIRIZZO
        else if ((saldo == "") || (saldo == "undefined")) {
           alert("Il campo saldo e' obbligatorio.");
           document.modulo.saldo.focus();
           return false;
        }
//INVIA IL MODULO
        else {
           document.modulo.action = "verifymodifica.php";
           document.modulo.submit();
        }
      }
  }
 //-->
</script>
<?php
    require_once ("comuni/footer.php");
?>
