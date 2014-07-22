<?php
    session_start();
    require_once("comuni/header.php");
    require_once("comuni/utility.php");
    require_once("comuni/myconnect.php");
    if(!IsSet($_SESSION['user']))
        {
?>
<script type="text/javascript">
alert("Per visualizzare questa pagina devi essere registrato!");
location.href="index.php";
</script>
<?php
        }
?>
    <div id="immagine">
        <h1>
            I biglietti sono rimborsabili fino al giorno del viaggio.
            Verranno disdetti tutti i biglietti acquistati.
            Il rimborso e' pari alla meta' del costo.
        </h1>
<?php
    $email=$_SESSION['user'];
    $comprato=2;
    $db = myconnect();
    $cont2=0;
    $costo=0;
    $query = "select * from Posto where email='".$email."'and occupato='".$comprato."';";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    if($row==NULL)
     {
?>
<script type="text/javascript">
    alert("Non hai fatto alcun acquisto");
    location.href="index.php";
</script>
<?php
     }
     echo'<table align="center"><tr><td><h2> fila &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h2></td>';
     echo'<td><h2> posto &nbsp; &nbsp; &nbsp; &nbsp;</h2></td>';
     echo'<td><h2> giorno &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;</h2></td>';
     echo'<td><h2> e-mail &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</h2></td></tr>';
     while($row != NULL)
        {
            echo '<tr>';
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
     echo '<h1>Costo Totale:  '.$costo.' euro </h1>';

?>
<script type="text/javascript">
    <!--
    function Passaggio()
    {
        var host = window.location.host;
        location.href="http://"+host+"/~nello/Trova_un_Posto/disdici.php";
    }
    
    -->
</script>
<?php
     echo '<table align="center">
     <tr><td><input type="submit" name="Disidici" value="Disdici" onclick="Passaggio()"/></td></tr>
     </table>';
?>
    </div>

<?php
    require_once ("comuni/footer.php");
?>