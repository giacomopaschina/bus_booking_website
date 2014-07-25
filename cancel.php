<?php
    session_start();
    require_once ("comuni/myconnect.php");
    
    if(!IsSet($_SESSION['name']))
    {
?>
<script type="text/javascript">
    location.href="index.php";
</script>
<?php
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iit bus booking</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Custom Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo_iit.png" alt="iit logo" height="70" >
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php#about">About us</a>
                    </li>
                    <li >
                         <a href=" "><?php
echo($_SESSION['name']." ".$_SESSION['surname']);?> </a><?php

                        ?>
                        
                    </li>
                    <li >
                        <a href="prenota.php" >book a bus</a> </li>
                    <li>
                        <a href="cancel.php " >Cancel a booking</a>
                    </li>
                    <li>

                        <a href=" " id="logout">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <?php
   

     $mysqli = myconnect();
    ?>

    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class=" col-md-8  col-md-offset-2">
                        <h2 >Cancel a Booking</h2>
                    </div>
                    </div>
                <div id="canceltime" class=" col-sm-12 modal-content ">
                     <div class="  selectpicker  ">
                          <div class="modal-header" id="timetitle">
                <h3 class="text-center" >Timetable</h3>
            </div>
                         <div class="modal-body">
                      <select id="selseat" class=" btn btn-primary  btn-block  " >
             <option value="" >--Select--</option>

   
    <?php 
    
    $stmt = $mysqli->prepare("select * from Seats inner join Timetables on Seats.timeid=Timetables.id where Seats.email= ?"); 
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $stmt->bind_result($col1, $col2,$col3, $col4,$col5,$col6,$coltime1, $coltime2,$coltime3, $coltime4,$coltime5,$coltime6,$coltime7); 
    while ($stmt->fetch())  
         {
             ?>
        <option value="<?php echo $col1; ?>">
            <?php
            $timeor=" Date: "."$col3"." N.: "."$col5"." Start at: "."$coltime2"." Arrive at: "." $coltime3"." From: "."$coltime4"." To: "."$coltime5"."   ";
            echo $timeor;
            
            ?>
        </option>
             <?php }
             
             $stmt->close();
             ?>
</select>
          
                                           </div>
                     </div> 

                    </div>
                

                   
            
            
                               </div>

                        
           
             
           
                

      	
      </div>
    
                
          
    </section>

    
   

    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootbox.js"></script>


</body>
<script type="text/javascript">


$("#logout").click(function(e){
    e.preventDefault();
    
    $.ajax({
        url: "esci.php",                
    });
    bootbox.alert("you are logged out", function(){
        location.href="index.php";
    });
}); 
        
    $('#selseat').change(function(e){
        
        e.preventDefault();
        var index=$("#selseat option:selected").val();
        bootbox.dialog({
                        message: "are you sure to delete this seat?",
                        title: "Delete a seat",
                        buttons: {
                            success: {
                                label: "Delete!",
                                className: "btn-success",
                                callback: function() {
                                    alert(index);
                                      $.ajax({
                                                type: "POST",
                                                url: "qcancel.php",
                                                data: "index=" + index,
                                                success: function(response){
                                                    bootbox.alert("Cancellation successed!", function(){
                                            location.href="cancel.php";
                                        });
                                    },
                                    error: function (xhr, errorType, exception){
                var errorMessage = exception || xhr.statusText; //If exception null, then default to xhr.statusText  
                alert( "There was an error creating your contact: " + errorMessage );
            }
        });
    }
    }
}
});
    });
    
</script>
</html>
