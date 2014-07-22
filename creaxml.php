<?php
    session_start();
    require_once("comuni/header.php");
    require_once ("comuni/myconnect.php");
    if(!IsSet($_SESSION['user']))
    {
?>

<script type="text/javascript">
    alert("Per visualizzare questa pagina devi essere registrato!");
    location.href="index.php";
</script>
<?php
    }
    $costo=0;
    $email=$_SESSION['user'];
    $occupato=1;
    $db = myconnect();
    $query = "select * from Posto where email='".$email."'and occupato='".$occupato."';";
    $result = mysql_query($query);
    $row = mysql_fetch_row($result);
     while($row != NULL)
        {
             $row = mysql_fetch_row($result);
            $costo=$costo+15;

        }
    $numerocarta = $_GET["numero"];
    $data = $_GET["data"];
    $codice= $_GET["codice"];$stringa_xml_dtd = "<?xml version=\"1.0\"?>\n";
    $stringa_xml_doc = "<carta><numero>$numerocarta</numero><codice>$codice</codice>
    <data>$data</data><prezzo>$costo</prezzo></carta>";
    $stringa_xml =$stringa_xml_dtd.$stringa_xml_doc;
    $file_name ="infobanca.xml";
    $file = fopen($file_name,"w");
    $num = fwrite($file, $stringa_xml);
    fclose($file);
?>
<script type="text/javascript">
    location.href="banca.php";
</script>
