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
    &nbsp;

    <div id="immagine" align="center">
           <iframe width="425" class="middle" height="350" frameborder="0"
           scrolling="no" marginheight="0" marginwidth="0"
           src="http://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;
           geocode=&amp;q=Via+Felice+Maritano,+Genova+88&amp;
           sll=44.453358,8.904827&amp;sspn=0.006893,0.01929&amp;ie=UTF8&amp;
           hq=&amp;hnear=Via+Felice+Maritano,+88,+16161+Genova,+Liguria&amp;
           t=h&amp;ll=44.453358,8.904805&amp;spn=0.021444,0.036478&amp;z=14&amp;
           iwloc=A&amp;output=embed">
           </iframe><br />
           <small>
           <a href="http://maps.google.it/maps?f=q&amp;source=embed&amp;
           hl=it&amp;geocode=&amp;q=Via+Felice+Maritano,+Genova+88&amp;
           sll=44.453358,8.904827&amp;sspn=0.006893,0.01929&amp;ie=UTF8&amp;hq=&amp;
           hnear=Via+Felice+Maritano,+88,+16161+Genova,+Liguria&amp;
           t=h&amp;ll=44.453358,8.904805&amp;spn=0.021444,0.036478&amp;z=14&amp;iwloc=A"
           style="color:#0000FF;text-align:left">
           Visualizzazione ingrandita della mappa</a></small>
           <h1>
               e-mail:<a  id="mail" href="mailto:270@mail.it">270@mail.it</a> &nbsp;
               tel: 010-270270
           </h1>

    </div>
<?php
    require_once("comuni/footer.php");
?>