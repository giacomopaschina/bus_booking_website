<?php // 
    ob_start();
    session_start();
    
    
    $name = $_POST["name"];
    $surname=$_POST["surname"];
    $email = $_POST["email"];
    $pwd = $_POST["psw"];

    require_once("comuni/myconnect.php");
    
    
   // $pdo = new PDO("'mysql:host=127.0.0.1;dbname=iit_bus'", 'root', 'root');

    //$pdo = new PDO('mysql:dbname=iit_bus;host=127.0.0.1;charset=utf8', 'root', 'root');

//$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(IsSet($_SESSION['name']))
    {
?>
<script type="text/javascript">
    alert("Sei gia' loggato!");
    location.href="index.php";
</script>

<?php
    }
    //$statement = $pdo->prepare("select * from Users where email = :email");
    //$statement->execute(array(':email' => $email));
    //$row = $statement->fetch();
   $mysqli = myconnect();
//    $query ="select * from Users where email = '".$email."';";
//    $result = mysql_query($query);
//    $row = mysql_fetch_row($result);

    $stmt = $mysqli->prepare("select * from Users where email = ?"); 
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $row= $stmt->fetch();
    
    if($row != NULL)
        {
 ?>
 <script type="text/javascript">
     alert("Utente gia' presente!");
     location.href="login.php";
 </script>
 <?php
           $stmt->close();
}
    else
        {                   
            $pwd2 = md5($pwd);
//            $query="insert into Users(email,name, surname, password)values('".$email."','".$name."','".$surname."','".$pwd2."');";
//            $result = mysql_query($query);
//            if(!$result)
//            {
//                    die("Errore nella query $query: ".mysql_error());
//            }
//            $query = $pdo->prepare("insert into Users(email,name, surname, password)values (:email, :name, :surname, :password)");
//$query->execute(array(
//    'email' => $email,
//    'name' => $name,
//    'surname' => $surname,
//    'password' => $pwd2,
//    
//));
//
//
//
    $stmt = $mysqli->prepare("insert into Users(email,name, surname, password)values (?,?,?,?)"); 
    $stmt->bind_param("ssss", $email, $name,$surname,$pwd2);
    $stmt->execute();
           

             $_SESSION['name']= $name;
	$_SESSION['surname']=$surname;
            $stmt->close();

            }


?>