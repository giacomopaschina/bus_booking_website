<?php
    session_start();
    require_once("comuni/header.php");
    require_once("comuni/utility.php");
    require_once("comuni/myconnect.php");
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
    $occupato=1;
    $libero=0;
    $NULL=NULL;
    $email=$_SESSION['user'];
    $query ="update Posto set occupato ='".$libero."' where email = '".$email."'and occupato='".$occupato."';";
    mysql_query($query);
    $query ="update Posto set email='".$NULL."' where email = '".$email."' and  occupato='".$vuoto."';";
    mysql_query($query);
?>
<script type="text/javascript">
    alert("Carrello eliminato!");
    var host = window.location.host;
    location.href="http://"+host+"/~nello/Trova_un_Posto/index.php";
</script>

<?php
    require_once("comuni/footer.php");
?>