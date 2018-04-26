<?php
    session_start();
    if (isset($_SESSION['username'])){
        $tempuser = $_SESSION["username"];
        $logcheck = '<li><a href="userprofile.php"><span class="glyphicon glyphicon-user"></span>Welcome, '.$tempuser.'</a></li>';
    }
    else{
        $logcheck = '<li ><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Concept Box Game Store</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS File -->
        <link rel="stylesheet" type="text/css" href="CSS/style.css?ts="<?=time()?>&quot; /> 
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Tab Icon -->
        <link rel="icon" href="Images/Logo.png">
    </head>
    
    <body>
        <!--Navbar -->
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-left"><img class="Logo" src="Images/Logo.png"></a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="help.php">Help</a></li>
              <li><a href="about.php">About Us</a></li>
            </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-ok"></span>Checkout</a></li>
                <?php echo $logcheck; ?>
               

                
                 </ul>
            
            <div class="col-sm-4 col-md-4 pull-right">
                <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="searchbar" class="searchbar">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                </form>
             </div> 
          </div>
        </nav>
            <!-- IMAGE SLIDESHOW -->
            <div class="container">
            <div class="row">
                <div class="col-md-12" align="center" >
                    <div id="CarouselHome" class="carousel slide" data-ride="carousel" >
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#CarouselHome" data-slide-to="0" class="active"></li>
                            <li data-target="#CarouselHome" data-slide-to="1"></li>
                            <li data-target="#CarouselHome" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="Images/image1.jpg" alt="GodOfWar" >
                            </div>
                            <div class="item">
                                <img src="Images/image2.jpg" alt="FarCry5">
                            </div>
                            <div class="item">
                                <img src="Images/image3.jpg" alt="GrandTheftAuto">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#CarouselHome" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#CarouselHome" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="container homediv " >
          <div class="row margintop">
            <div class="col-sm-6">
              <h3> Our Location </h3><hr>
                <div><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2496.5044981326364!2d14.508757710421591!3d35.87611609101553!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe17dab500ccdd3ae!2sMCAST+Institute+of+Information+and+Communications+Technology!5e0!3m2!1sen!2smt!4v1521405432552" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> </div>
            </div>
            <div class="col-sm-6">
              <h3>Opening Hours: </h3><hr>
                <p> Monday : 8am - 7pm</p><br>
                <p> Tuesday : 8am - 7pm</p><br>
                <p> Wednesday : 8am - 4pm</p><br>
                <p> Thursday : 8am - 4pm</p><br>
                <p> Friday : 8am - 8pm</p><br>
                <p> Saturday : 8am - 7pm</p><br>
                <p> Sunday : CLOSED </p><br>
            </div>
          </div>
        </div>
        
        
        
    </body>
</html>