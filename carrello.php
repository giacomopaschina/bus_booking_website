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
<?php
    $email=$_SESSION['user'];
    $occupato=1;
    $db = myconnect();
    $cont2=0;
    $costo=0;
    $query = "select * from Posto where email='".$email."'and occupato='".$occupato."';";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
    if($row==NULL)
     {
?>
<script type="text/javascript">
    alert("il tuo carrello e' vuoto");
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
        alert("Verrai indirizzato al sito della nostra banca online!")
        location.href="http://"+host+"/~nello/Trova_un_Posto/compra.php";
    }
    function Annulla()
    {

           location.href = "annulla.php";
    }
    -->
</script>
<?php
     echo '<table align="center">
     <tr><td><input type="submit" name="Compra!" value="Compra" onclick="Passaggio()"/></td>
     <td><input type="submit" name="Annulla" value="Elimina Carrello" onclick="Annulla()"/></td></tr>
     </table>';
?>
    </div>
    
<?php
    require_once ("comuni/footer.php");
?>