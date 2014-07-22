<?php
    session_start();
    require_once("comuni/header2.php");
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
    $cost=$_GET['costo'];
?>

    <div id="oro">
        <h1>Inserisci i dati della tua carta</h1>
            <h2>
                 verificheremo la correttezza dei tuoi dati e successivameente
                 si procedera'all'acquisto definitivo dei posti.
            </h2>
        <form name="modulo" action="#" method="get">
        <table align="center" >
         <tr><td><h2>Numero Carta di Credito:</h2></td><td> <input type="text" name="numero" /></td></tr>
         <tr><td><h2>Data di Scadenza (formato MM/AAAA):</h2></td><td> <input type="text" name="data" /></td></tr>
         <tr><td><h2>Codice di Sicurezza:</h2></td><td> <input type="text" name="codice" /></td></tr>
        </table>
        <br />
    <center>
    </center>
    </form>


<script type="text/javascript" >
 <!--
  function Modulo()
  {
      // Variabili associate ai campi del modulo
     var numerocarta = document.modulo.numero.value;
     var datascadenza = document.modulo.data.value;
     var codice = document.modulo.codice.value;

         //Effettua il controllo sul campo CODICE
       
        if ((numerocarta == "") || (numerocarta == "undefined")) {
           alert("Il campo carta e' obbligatorio.");
           document.modulo.numerocarta.focus();
           return false;
        }
        else if(numerocarta<16){
        alert("il numero della carta non e' corretto");
        document.modulo.numerocarta.focus();
           return false;
        }
        else if ((datascadenza == "") || (datascadenza == "undefined")) {
           alert("Il campo data di scadenza e' obbligatorio.");
           document.modulo.data.focus();
           return false;
        }
        else if (( codice == "") || (codice == "undefined")) {
           alert("Il campo codice e' obbligatorio.");
           document.modulo.codice.focus();
           return false;
        }

        else if(codice<3){
        alert("il codice non e' corretto");
        ocument.modulo.codice.focus();
           return false;
        }
        //INVIA IL MODULO
        else {
           document.modulo.action ="creaxml.php";
           document.modulo.submit();
        }
     }
  -->
</script>
<?php

    echo '<br/><br/><br/><br/><input type="submit" name="Procedi" value="Procedi" style=" margin-left: 350px" onclick="Modulo()"/>';
?>
        <br/><br/><br/><br/><br/>

</div>

