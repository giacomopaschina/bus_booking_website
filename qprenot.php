 <?php
     ob_start();
    session_start();
//    require_once("comuni/header.php");
    require_once ("comuni/myconnect.php");
    $val = $_POST["val"];
    if(!IsSet($_SESSION['name']))
    {
?>

<script type="text/javascript">
    alert("Per visualizzare questa pagina devi essere registrato!");
    location.href="index.php";
</script>
<?php
    }
     $mysqli = myconnect();
     
    $query = "select * from Timetables where travel ='".$val."'";
    $res=$mysqli->query($query);
   
    ?><option value="" >--Select--</option>
<?php
    while($row = $res->fetch_assoc())
                {            
        ?>
                 <option value ="<?php echo($row['id']);?>"> start at <?php echo($row['departuretime']); ?> arrive at <?php echo($row['arrivaltime']);?> </option>
                                          
        <?php
                }
                $mysqli->close();

        ?>        

