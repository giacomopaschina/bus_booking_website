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

    $id = $_POST["id"];
    $timeid=$_POST["timeid"];
    $date = $_POST["date"];
    
    $state=0;
    
    $mysqli = myconnect();
    
    //MAMP doesn't support transaction
    
    /* set autocommit to off */
    // $mysqli->autocommit(FALSE);
    
    $stmt = $mysqli->prepare("insert into Seats(timeid, date, state, number,email)values (?,?,?,?,?)"); 
    $stmt->bind_param("isiis", $timeid, $date,$state,$id,$_SESSION['email']);
    $stmt->execute();
   
    /* commit transaction */
    //   $stmt->commit();
    
    $stmt->close(); 

?>