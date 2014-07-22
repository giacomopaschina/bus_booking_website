<?php
    session_start();
    require_once ("comuni/myconnect.php");
    require_once("comuni/utility.php");
    $db = myconnect();
    if(!IsSet($_SESSION['user']))
    {
?>

<script type="text/javascript">
    alert("Per visualizzare questa pagina devi essere registrato!");
    location.href="index.php";
</script>
<body>
<?php
    }
    
      $email=$_SESSION['user'];
      $acquistato=2;
      $cont2=0;
      $query="select indirizzo from Clienti where emailc='".$email."';";
      $result = mysql_query($query);
      $row = mysql_fetch_row($result);
      $query="select citta from Clienti where emailc='".$email."';";
      $result = mysql_query($query);
      $row2 = mysql_fetch_row($result);
      echo'<table><tr><td><h2> '.$_SESSION["cognome"].'&nbsp;
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h2></td>';
      echo'<td><h2> '.$_SESSION["nome"].' &nbsp; &nbsp; &nbsp; &nbsp;</h2></td></tr>';
      echo'<tr><td><h2> '.$row[0].' &nbsp; &nbsp; &nbsp; &nbsp;</h2></td>';
      echo '<td><h2> '.$row2[0].' &nbsp; &nbsp; &nbsp; &nbsp;</h2></td></tr>';
     
      $query="select * from Posto where email='".$email."'and occupato='".$acquistato."';";
      $result = mysql_query($query);
      $row = mysql_fetch_row($result);
     echo'<table><tr><td><h2> fila &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h2></td>';
     echo'<td><h2> posto &nbsp; &nbsp; &nbsp; &nbsp;</h2></td>';
     echo'<td><h2> giorno &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</h2></td>';
     echo'<td><h2> e-mail &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h2></td></tr>';
     while($row != NULL)
        {
            while($cont2<4)
               {
                    $a=$row[$cont2];
                    echo '<td><h2>'.$a.' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h2></td>';
                    $cont2++;

               }
            $row = mysql_fetch_row($result);
            $cont2=0;
            $costo=$costo+15;
            echo '</tr>';
        }
     echo'</table>';
?>
<a href="javascript:print();">STAMPA</a>
<a href="index.php">TORNA ALLA HOME</a>
</body>