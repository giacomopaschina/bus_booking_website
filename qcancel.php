<?php // 
    ob_start();
    session_start();
   
    require_once("comuni/myconnect.php");

    if(!IsSet($_SESSION['name']))
    {
?>
<script type="text/javascript">
    location.href="index.php";
</script>
<?php
    }
    $id = $_POST["index"];
    
    $state=0;
    
    $mysqli = myconnect();
    $stmt = $mysqli->prepare("DELETE FROM Seats WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute(); 
    $stmt->close();
?>