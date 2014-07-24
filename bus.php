<?php
    session_start();
//    require_once("comuni/header.php");
    require_once ("comuni/myconnect.php");
    
    if(!IsSet($_SESSION['name']))
    {
?>

<script type="text/javascript">
//    alert("Per visualizzare questa pagina devi essere registrato!");
    location.href="index.php";
</script>
<?php
    }
    
    $date = $_POST["date"];
    $index = $_POST["index"];
    $time = $_POST["time"];
//    $date="2014-09-29";
//    $index=1;
//    $time=1;
    
    $seat = array();
    

    $mysqli = myconnect();
    $stmt = $mysqli->prepare("select state, number from Seats where timeid = ? and date= ? "); 
    $stmt->bind_param("is", $time,$date);
    $stmt->execute();

    $stmt->bind_result($state,$number);
    while ($stmt->fetch()) {
        $seat[$number] = $state;    
    }
    
    
    echo '<table style = "margin-left: auto; margin-right: auto">';
    $id = 0;
    for ($i=0; $i<4; $i++) 
    {
        echo '<tr>';
        for ($k=0; $k<10; $k++) {
            $img = "img/seat_free.png";
            if (in_array($id,$seat)) {
                if ($seat[$id]==0) 
                {$img = "img/seat_pren.png";}
                else 
                    {$img = "img/seat_pren.png";}
            }
            echo '<td ><img id="'.$id.'" class="seattable" src="'.$img.'" /></td>';
             $id++;   
            
    }
        echo '</tr>';
    }
    
    echo '</table>';
    
    
?>


