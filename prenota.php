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
                    <li>
                         <a href=" "><?php echo($_SESSION['name']." ".$_SESSION['surname']);?> </a>
                    </li>
                    <li>
                        <a href="prenota.php" >book a bus</a> </li>
                    <li>
                        <a href="cancel.php" >Cancel a booking</a>
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
   
    <section class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class=" col-md-8  col-md-offset-2">
                        <h2 >Book a Bus</h2>
                    </div>
                    </div>
                <div id="timetables" class=" col-sm-5  ">
                    <form id ="formtime"  action="#"class="form ">
                        <div class="  selectpicker modal-content ">
                          <div class="modal-header" id="timetitle">
                              <h3 class="text-center" >Timetable</h3>
                          </div>
                            <div class="modal-body">
                                <select id="direction" class="btn   btn-primary btn-lg btn-block " >
                                    <option value="" >--Select--</option>
                                    <option  value ="0"> From Bolzaneto to Morego   </option>  
                                    <option value ="1"> From Morego to Bolzaneto</option>
                                    <option value ="2"> From Certosa to Morego</option>
                                    <option value ="3"> From Morego to Certosa</option>
                                </select>
                                <select id="time" class="btn  btn-primary btn-lg btn-block " style="visibility: hidden;" >
                                </select>
                                 <input  type="date"  class="btn-lg btn-block btn  btn-primary " style="visibility: hidden;"    id="date">
                                 <br>
                                 <div>
                                     <input type="submit" id="book_btn" value="Search"  class="btn btn-primary btn-lg btn-block">
                                 </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-7" >
                    <div id="busdiv" class="  modal-content ">
                        <div class="modal-header" id="timetitle">
                            <h3 class="text-center" >Seats</h3>
                        </div>
                        <div class="modal-body" id="busseat"></div>
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
$("#signup").click(function(e){
    e.preventDefault();
    $("#signupModal").css("visibility","visible");
    $("#loginModal").css("visibility","hidden");
    });

$("#login").click(function(e){
    e.preventDefault();
    $("#loginModal").css("visibility","visible");
        $("#signupModal").css("visibility","hidden");
    });

$("#cancel").click(function(e){
    e.preventDefault();
    $("#signupModal").css("visibility","hidden");
    });

$("#cancellogin").click(function(e){
    e.preventDefault();
    $("#loginModal").css("visibility","hidden");
    });

$("#logout").click(function(e){
    e.preventDefault();
    
    $.ajax({
        url: "esci.php",                
    });
    bootbox.alert("you are logged out", function(){
        location.href="index.php";
    });
}); 
        
  //     $("#form2").ajaxForm({url: 'login.php', type: 'post'});
  window.onload = function (){
      var mydiv = document.getElementById("timetables");
      var curr_height= parseInt(mydiv.offsetHeight); // removes the "px" at the end
      $("#busdiv").css({height: curr_height +'px'});
  };

  $('#direction').change(function(){
      var index=$("#direction option:selected").index();
      if(index===0)
      {
          $("#time").css("visibility","hidden");
      }
      else
      {
          $("#time").css("visibility","visible");
          $.ajax({
                type: "POST",
                url: "qprenot.php",
                data: "val=" + index,
                success: function(response){
                    $("#time").html(response);
                    }
                });
            
        }
    }); 
    $('#time').change(function(){
        var index=$("#time option:selected").index();
        var d=new Date();
        if(index===0)
        {
            $("#date").css("visibility","hidden");
        }
        else
        {
            $("#date").css("visibility","visible");
        }
    });
    $('#formtime').submit(function(e){
        
        e.preventDefault();
        var index=$("#direction option:selected").val();
        var time= $("#time option:selected").val();
        var date=$("#date").val();
        $.ajax({
            type: "POST",
            url: "bus.php",
            data: "date=" + $("#date").val()+"&index="+ index+"&time="+time,
            success: function(response){
                $("#busseat").html(response);
                $('.seattable').click(function(){
                    var th=$(this);
                    var number=$(this).attr("id");
                    bootbox.dialog({
                        message: "are you sure to book this seat?",
                        title: "Book a seat",
                        buttons: {
                            success: {
                                label: "Book!",
                                className: "btn-success",
                                callback: function() {
                                    var time= $("#time option:selected").val();
                                    $.ajax({
                                        type: "POST",
                                        url: "bookseat.php",
                                        data: "id="+number+"&timeid="+ time+"&date="+date,
                                        success: function(response){
                                            if (response==='false')
                                            {
                                                bootbox.alert("Book unsuccess!", function(){
                                                     });
                                            }
                                            else
                                            {
                                                bootbox.alert("Booked!", function(){
                                                     });
                                            }
                                            var src = "img/seat_pren.png";
                                            th.attr("src", src);
                                           
                                        }
                                    });
                                }
                            }
                        }
                    });
                });
            },
            error: function (){
                
            }
        });
    }); 

</script>
</html>
