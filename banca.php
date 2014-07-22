<?php
    session_start();
    require_once("comuni/header.php");
    require_once ("comuni/myconnect.php");
    require_once("comuni/utility.php");
    $db = myconnect();
    if(!IsSet($_SESSION['user']))
    {
?>

<script type="text/javascript">
    alert("Per visualizzare questa pagina devi essere registrato!");
    location.href="index.php";
</script>
<?php
    }
    $acquistato=2;
    $email=$_SESSION['user'];
    $xml = simplexml_load_file("infobanca.xml");
    $query="select * from Carta where numero='".$xml->numero."'and codice='".$xml->codice."'and data='".$xml->data."';";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    if($row == NULL)
        {
 ?>
 <script type="text/javascript">
     alert("Nessuna carta di credito corrispondente!");
     location.href="index.php";
 </script>
 <?php
                     break;
              }
    $query="select saldo from Carta where numero='".$xml->numero."'and codice='".$xml->codice."'and data='".$xml->data."';";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    $prezzo=$xml->prezzo;
    $saldo= $row[0];
    if($saldo>$prezzo )
    {
        $newsaldo=$saldo-$prezzo;
        $query="update Carta set saldo='".$newsaldo."' where numero='".$xml->numero."';";
        $result = mysql_query($query);
        $query="update Posto set occupato='".$acquistato."' where email='".$email."';";
        mysql_query($query);

?>
 <script type="text/javascript">
     alert("Acquisto effettuato! Grazie!");
     var host = window.location.host;
    location.href=location.href="http://"+host+"/~nello/Trova_un_Posto/stampadati.php";
 </script>
 <?php
                     break;
      }
      else
      {
          ?>
          <script type="text/javascript">
     alert("Saldo non sufficiente!");
     location.href="annulla.php";
 </script>
<?php

      }

?>
