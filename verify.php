<?php // 
    ob_start();
    session_start();
    require_once("comuni/myconnect.php");
    
    $name = $_POST["name"];
    $surname=$_POST["surname"];
    $email = $_POST["email"];
    $pwd = $_POST["psw"];
    
    $mysqli = myconnect();
    $stmt = $mysqli->prepare("select * from Users where email = ?"); 
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $row= $stmt->fetch();
    
    if($row != NULL)
    {
        $stmt->close();
        echo "false";
    }
    else
    {                   
        $pwd2 = md5($pwd);
        $stmt = $mysqli->prepare("insert into Users(email,name, surname, password)values (?,?,?,?)"); 
        $stmt->bind_param("ssss", $email, $name,$surname,$pwd2);
        $stmt->execute();
        $_SESSION['name']= $name;
	$_SESSION['surname']=$surname;
        $_SESSION['email']=$col1;
        $stmt->close();
        echo "true";      

    }

?>