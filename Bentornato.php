<?php
    session_start();
    $_SESSION['user'] = $_COOKIE['utente'];
    $_SESSION['nome'] = $_COOKIE['nome'];
    $_SESSION['cognome'] = $_COOKIE['cognome'];
    $nome = $_COOKIE['nome'];
    $cognome =  $_COOKIE['cognome'];
?>
<script type="text/javascript">
    alert("Bentornato a bordo del 270!");
    location.href="index.php";
</script>
