<?php
    session_start();           
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

<!--signup modal-->
<div id="signupModal" style="position:fixed; margin-top:50px; visibility:hidden;"  class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-center">Registration</h2>
            </div>
            <div class="modal-body">
                <form id ="form1"  class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" id="name" class="form-control input-lg"  placeholder="Name">
            </div>
            <div class="form-group">
              <input type="text" id="surname" class="form-control input-lg" placeholder="Surname">
            </div>
              <div class="form-group">
              <input type="text" id="email" class="form-control input-lg" placeholder="Email">
            </div>
              <div class="form-group">
              <input type="password" id="psw" class="form-control input-lg" placeholder="Password">
            </div>
              <div class="form-group">
              <input type="password" id="psw2" class="form-control input-lg" placeholder="Repeat password">
            </div>
              <div >
              <input type="submit" value="Sign up"  class="btn btn-primary btn-lg btn-block">
             
              <input type="reset" value="Cancel" id="cancel" class="btn btn-primary btn-lg btn-block"> 
          </div>
          </form>
     
      <div class="modal-footer">
          	
      </div>
  </div>
  </div>
  </div>
</div>
    <!--signup ends-->
     <!--login modal-->
<div id="loginModal" style="position:fixed; margin-top:50px; visibility:hidden;"  class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h2 class="text-center">Login</h2>
      </div>
      <div class="modal-body">
          <form id="form2" class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" id="emaillogin" class="form-control input-lg" placeholder="Email">
            </div>
              <div class="form-group">
              <input type="password" id="pswlogin" class="form-control input-lg" placeholder="Password">
            </div>
              
              <div class="form-group">
                  <br>
              <input type="submit" value="Enter" class="btn  btn-primary btn-lg btn-block" >
           
              <input type="reset"id="cancellogin" value="Cancel" class="btn  btn-primary btn-lg btn-block" >
          </div>
          </form>
     
      <div class="modal-footer">
          	
      </div>
  </div>
  </div>
  </div>
</div>
    <!--login ends-->
    
    
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
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
                        <a href="#about">About us</a>
                    </li>
                    <li >
                        <?php
                        if(!IsSet($_SESSION['name']))
{
                        ?>
                       <a href="" id="signup">Sign up </a>
                        <?php
}else
    {?> </li><li><a href=" " id="credential"><?php echo($_SESSION['name']." ".$_SESSION['surname']);?></a><?php



}
                        ?>
                        
                    </li>
                    <li >
                        <?php
                        if(!IsSet($_SESSION['name']))
{
                        ?>
                        <a href=" " id="login">Login</a>
                        <?php
}else
    {?> <a href=" prenota.php" >book a bus</a> </li><li>
                        <a href=" " >Unbook</a></li>                        <li>

                        <a href="" id="logout">Logout</a></li>
    <?php

}
                        ?>
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
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">iit bus booking</h1>
                        <p class="intro-text">A free booking of iit bus travel</p>
                        <div class="page-scroll">
                            <a href="#about" id="bn" class="btn btn-circle">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class=" content-section text-center space">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>iit bus booking</h2>
                    <p>Grayscale is a premium quality, free Bootstrap 3 theme created by Start Bootstrap. It can be yours right now, all you need to do is download the template on the preview page. You can use this template for any purpose, personal or commercial.</p>
                    <p>This striking, black and white theme features stock photographs by <a href="http://gratisography.com/">Gratisography</a> along with a custom Google Map skin courtesy of <a href="http://snazzymaps.com/">Snazzy Maps</a>.</p>
                    <p>With this template, just the slightest splash of color can make a huge impact on the overall presentation and design.</p>
                </div>
            </div>
        </div>
        <div id="footer"class="line">
            <br>
            <br>
            <ul class="list-inline banner-social-buttons">
                    <li><a href="https://twitter.com/IITalk" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li><a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li><a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>   
            
        </div>
    </section>
    
    
   

    <!-- Core JavaScript Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>
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

$("#logout").click(function(){
            $.ajax({
                url: "esci.php",
                
            });
            alert("you are logged out");
        }); 
        
  //     $("#form2").ajaxForm({url: 'login.php', type: 'post'});

   
          $('#form1').submit(function(){

          //    $.post('verify.php', { name: $("#name").val(), surname: $("#surname").val(), email: $("#email").val(),psw: $("#psw").val()});

        $.ajax({
                type: "POST",
                url: "verify.php",
                data: "name=" + $("#name").val()+"&surname="+ $("#surname").val()+"&email="+ $("#email").val()+"&psw="+ $("#psw").val(),
                success: function(response){
                            $("#form1").html(response);

                }
            });
                
           
        }); 
              $('#form2').submit(function(){
     //$.post('login.php', { email: $("#emaillogin").val(), psw: $("#pswlogin").val()});
                
              $.ajax({
                type: "POST",
                url: "login.php",
                data: "email=" + $("#emaillogin").val()+"&psw="+ $("#pswlogin").val(),
                success: function(response){
                            $("#form2").html(response);

                }
            });
                
           
        }); 
        
//        $("#enterlogin").click(function(){
//             $.post('login.php', { email: $("#emaillogin").val(), psw: $("#pswlogin").val()});
//
//return false;
//            });
    
</script>
</html>
