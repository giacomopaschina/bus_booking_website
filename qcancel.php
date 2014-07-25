<?php // 
    ob_start();
    session_start();
   
    require_once("comuni/myconnect.php");

    $id = $_POST["index"];
    
//    $mysqli = myconnect();
//    $stmt = $mysqli->prepare("insert into Seats(timeid, date, number)values (?,?,?)"); 
//    $stmt->bind_param("isi", $timeid, $date,$id);
//    $stmt->execute();
//    $stmt->close();
// 
    
   
    $state=0;
    
    $mysqli = myconnect();
    
    
    /* set autocommit to off */
    //$mysqli->autocommit(FALSE);
    
   $stmt = $mysqli->prepare("DELETE FROM Seats WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute(); 
$stmt->close();
   
//    $result=$mysqli->query( "select state, number from Seats where timeid= '".$timeid."' and date= '".$date."')");
//
//    if ($result)
//    {
//        echo false;
//    }
//    else
//    {
    /* Insert some values */
//    $mysqli->query( "INSERT INTO `users`(`timeid`, `date`,`number`,`state`,'email') VALUES ('".$timeid."', '".$date."','".$number."','".$state."','". $_SESSION['email']."')");

    /* commit transaction */
 //   $stmt->commit();
    
    $stmt->close(); 
//    }
    ?>