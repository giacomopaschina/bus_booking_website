<?php
    session_start();
    $user=$_SESSION["user"];
    $nome = $_SESSION["nome"];
    $cognome =$_SESSION["cognome"];
    $email = $_GET["email"];
    $pwd = $_GET["pwd"];
    $pwd2 = $_GET["pwd2"];
    $indirizzo=$_GET["indirizzo"];
    $cit=$_GET["city"];
    $saldo=$_GET["saldo"];
    $numerocarta=$_GET["numero"];
    require_once("comuni/myconnect.php");
    require_once("comuni/utility.php");
    require_once("comuni/header.php");
    $db = myconnect();
    if(($email!=NULL))
    {
        $query ="delete from Clienti where emailc = '".$user."';";
        mysql_query($query);
        $pwd2 = md5($pwd);
        $query="insert into Clienti(emailc,cognomec, nomec, password,indirizzo,citta)
        values('".$email."','".$cognome."','".$nome."','".$pwd2."','".$indirizzo."','".$cit."');";
        $result = mysql_query($query);
        $_SESSION['user']=$email;
        if(!$result)
        {
            die("Errore nella query $query: ".mysql_error());
         }
         $query="update Posto set email='".$email."' where email='".$user."';";
         $result = mysql_query($query);
     }
    $query="select * from Carta where numero='".$numerocarta."';";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    if($row == NULL)
    {
?>
<script type="text/javascript">
    alert("Nessuna carta di credito corrispondente!");
    location.href="modifica.php";
</script>
<?php
     }
     $query="update Carta set saldo='".$saldo."' where numero='".$numerocarta."';";
     $result = mysql_query($query);
     if(!$result)
     {
            die("Errore nella query $query: ".mysql_error());
     }
     $query="update Carta set email='".$email."' where numero='".$numerocarta."';";
     $result = mysql_query($query);
     if(!$result)
     {
            die("Errore nella query $query: ".mysql_error());
     }

?>
<script type="text/javascript">
    alert("Modifica effettuata con successo!");
    location.href="index.php";
</script>
<?php
    require_once("comuni/footer.php");
?>