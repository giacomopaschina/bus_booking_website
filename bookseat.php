<?php // 
    ob_start();
    session_start();
   
    $id = $_POST["id"];
    $timeid=$_POST["timeid"];
    $date = $_POST["date"];
    require_once("comuni/myconnect.php");

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
    
    $stmt = $mysqli->prepare("insert into Seats(timeid, date, state, number,email)values (?,?,?,?,?)"); 
    $stmt->bind_param("isiis", $timeid, $date,$state,$id,$_SESSION['email']);
    $stmt->execute();
   
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