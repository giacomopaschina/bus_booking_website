<?php
    ob_start();
    session_start();
    require_once("comuni/header.php");
    if(!IsSet($_SESSION['user']))
    {

?>
<script type="text/javascript">
alert("Per visualizzare questa pagina devi essere registrato!");
location.href="index.php";
</script>
<?php
    }
    else
      {
        require_once('comuni/myconnect.php');
        $db = myconnect();
        $libero=0;
        $NULL=NULL;
        $query = "delete from Clienti where emailc ='".$_SESSION['user']."';";
        $result = mysql_query($query);
        $user = $_SESSION['user'];
        $nome = $_SESSION['nome'];
        $cognome= $_SESSION['cognome'];
        $query="update Posto set occupato='".$libero."' where email='".$user."';";
        mysql_query($query);
        $query ="update Posto set email='".$NULL."' where email = '".$user."' and  occupato='".$vuoto."';";
        mysql_query($query);
        setcookie("utente", $user, time() -9999);
	setcookie("nome", $nome, time() -9999);
	setcookie("cognome", $cognome, time() -9999);
        $_SESSION=array(); // Desetta tutte le variabili di sessione.
        session_destroy();//DISTRUGGE la sessione.
        
      }
?>
<script type="text/javascript">
    alert("Cancellazione effettuata!");
    location.href="index.php";
</script>