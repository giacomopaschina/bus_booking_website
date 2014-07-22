<?php
    session_start();
    require_once("comuni/header.php");
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
<script type="text/javascript">
    alert("Congratulazioni! Benvenuto a bordo del 270!");
    var host = window.location.host;
    location.href="http://"+host+"/~nello/Trova_un_Posto/index.php";//ritorno a http
</script>

<?php
require_once("comuni/footer.php")
?>