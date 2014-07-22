<?php
ob_start();
session_start();
require_once("utility.php");


print_banner();

if(!IsSet($_SESSION['user']))
{
if(IsSet($_COOKIE['utente']))
	header("Location: Bentornato.php");
else
	print_formlogin();
}

else
print_menu($_SESSION['nome'], $_SESSION['cognome']);

ob_end_flush();
?>


