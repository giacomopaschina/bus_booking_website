<?php
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
 ?>

    <div id="immagine" >
        <h1>
            Scegli il giorno in cui vuoi prenotare il tuo fantastico
            viaggio sul 270!
            <br/>
            Se ti occorre aggiungere denaro alla tua carta puoi andare su modifica
            profilo!
            <br/>
            Le date fanno riferimento alla settimana in corso.
        </h1>
        <form id="prenotazione" style="margin-bottom: 100px; margin-left: 270px" action="prenota.php" method="get">
          <select name ="select" class="formdate"  >
            <option value ="Lunedi">Lunedi'</option>
            <option value ="Martedi">Martedi'</option>
            <option value ="Mercoledi">Mercoledi'</option>
            <option value ="Giovedi">Giovedi'</option>
            <option value ="Venerdi">Venerdi'</option>
            <option value ="Sabato">Sabato</option>
            <option value ="Domenica">Domenica</option>
          </select>
            <input type="submit" name="Invia" value="Invia"/>
        </form>

        <br/><br/><br/><br/><br/><br/><br/>

    </div>
<?php>
    require_once("comuni/footer.php");
?>