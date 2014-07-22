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
    $costo=0;
    $email=$_SESSION['user'];
    $comprato=2;
    $db = myconnect();
    $query = "select * from Posto where email='".$email."'and occupato='".$comprato."';";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
     while($row != NULL)
        {
            $row = mysql_fetch_row($result);
            $costo=$costo+15;

        }
    $libero=0;
    $query="select * from Carta where email='".$email."';";
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
    $NULL=NULL;
    $costo=($costo/2);
    $query="select saldo from Carta where email='".$email."';";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    $saldo= $row[0];
    $newsaldo=$saldo+$costo;
    $query="update Carta set saldo='".$newsaldo."' where email='".$email."';";;
    $result = mysql_query($query);
    $query="update Posto set occupato='".$libero."' where email='".$email."';";
    mysql_query($query);
    $query ="update Posto set email='".$NULL."' where email = '".$email."' and  occupato='".$libero."';";
    mysql_query($query);

?>
 <script type="text/javascript">
     alert("Grazie!");
     var host = window.location.host;
    location.href="http://"+host+"/~nello/Trova_un_Posto/index.php";
 </script>