<?php
    ob_start();
    session_start();
      
    if(!IsSet($_SESSION['name']))
    {
?>
<script type="text/javascript">
    location.href="index.php";
</script>
<?php
    }
    
    $_SESSION=array(); 

?>