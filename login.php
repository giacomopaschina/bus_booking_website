<?php 
    ob_start();
    session_start();
    require_once("comuni/myconnect.php");

    $email = $_POST["email"];
    $pwd = $_POST["psw"];
    $pwd2=md5($pwd);
    
    $mysqli = myconnect();
    $stmt = $mysqli->prepare("select * from Users where email = ? and password= ?"); 
    $stmt->bind_param("ss", $email, $pwd2);
    $stmt->execute();
    $stmt->bind_result($col1,$col2,$col3,$col4);
    $row= $stmt->fetch();
  
    if($row != NULL)
    {
       
        $_SESSION['name']= $col2;
	$_SESSION['surname']=$col3;
        $_SESSION['email']=$col1;

       echo "true";
    }
    else 
    {
        echo "false";
        
    }
    
    $stmt->close();
    
?> 