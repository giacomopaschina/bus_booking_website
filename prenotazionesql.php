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
    $successo=true;
    $email=$_SESSION['user'];
    $data=$_GET['data'];
    $db = myconnect();
    $posti=$_GET['posti'];
    $prenotati=explode(',',$posti);
    $fila=array(0);
    $i=0;
    $occupato=1;
    if($prenotati[0]==NULL)
    {
?>
<script type="text/javascript">
    alert("Non hai fatto alcuna selezione!");
    location.href="index.php";
</script>
<?php
    }
    while($i< sizeof($prenotati))
    {
     $a=$prenotati[$i]/4;
     $fila[$i]= ceil($a);
     $i++;
    }
    $j=0;
    while($j< sizeof($prenotati))
    {
        if (($prenotati[$j]%4)==0)
            $prenotati[$j]=($prenotati[$j]/$fila[$j]);
        else
            $prenotati[$j]=($prenotati[$j]%4);
        $j++;
    }
    $i=0;
    $query ="start transaction;";
    mysql_query($query);
    for($i;$i< sizeof($prenotati);$i++)
    {
        $query ="select occupato from Posto where fila='".$fila[$i]."'and numero='".$prenotati[$i]."'and dataviaggio='".$data."';";
        $result = mysql_query($query);
        $row = mysql_fetch_row($result);
       while($row!=NULL)
      {
        if($row[0]==0)
        {
            $query="update Posto set occupato='".$occupato."' where fila='".$fila[$i]."'and numero='".$prenotati[$i]."'and dataviaggio='".$data."';";
            mysql_query($query);
            $query="update Posto set email='".$email."'where fila='".$fila[$i]."'and numero='".$prenotati[$i]."'and dataviaggio='".$data."';";
            mysql_query($query);
            $row = mysql_fetch_row($result);
            
         }
        else
        {
            $successo=false;
            $query ="rollback work;";
            $result = mysql_query($query);

?>
<script type="text/javascript">
    alert("Errore nella prenotazione, perfavore ritenta.");
    location.href="index.php";
</script>
  <?php }

    }
  }
    if($successo==true)
      {
            $query ="commit work;";
            mysql_query($query);
       }
  

?>

<script type="text/javascript">
    alert("Prenotazione avvenuta con successo.");
    location.href="carrello.php";
</script>
<?php
    require_once("comuni/footer.php");
?>