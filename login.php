<?php //
    ob_start();
    session_start();
    
    require_once("comuni/myconnect.php");
    
    $email = $_POST["email"];
    $pwd = $_POST["psw"];
    $pwd2=md5($pwd);
//    $db = myconnect();
//    $query ="select * from Users where email='".$email."' and password='".$pwd2."';";
//    $result = mysql_query($query);
//$row = mysql_fetch_row($result);
    
    $mysqli = myconnect();
    $stmt = $mysqli->prepare("select * from Users where email = ?"); 
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($col1, $col2,$col3,$col4);
    $row= $stmt->fetch();
  
    if($row != NULL)
    {
        $_SESSION['name']= $col2;
	$_SESSION['surname']=$col3;
//	setcookie("email", $email, time() + 300);
//	setcookie("name", $row[1], time() + 300);
//	setcookie("surname", $row[2], time() + 300);
    }
    
    $stmt->close();
    
    //echo($_SESSION['name']." ".$_SESSION['surname']);
    ?> 


