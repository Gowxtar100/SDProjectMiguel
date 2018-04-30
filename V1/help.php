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
              <li><a href="index.php">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li class="active" ><a href="help.php">Help</a></li>
              <li><a href="about.php">About Us</a></li>
            </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-ok"></span>Checkout</a></li>
                <?php echo $logcheck; ?>
              </ul>
            
            <div class="col-sm-4 col-md-4 pull-right">
                <form class="navbar-form" role="search" method="post" action="searchlogic.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="searchbar" class="searchbar">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit" value="Submit" name="Submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
                </form>
             </div> 
          </div>
        </nav>
        
        <div  class="container aboutdiv">
            <h3> FAQ </h3><hr>
            <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                Can I make purchases even If i do not have an account ? 
              </a>
          
            </p>
            <div class="collapse" id="collapseExample2">
              <div class="card card-body">
                Yes, however your cart will not be saved if you exit the website. 
              </div>
        </div>
        <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
               Does registering an account cost money ?
              </a>
          
            </p>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                No.
              </div>
        </div>
        <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
               What types of payment does Concept Game Box accept ?
              </a>
          
            </p>
            <div class="collapse" id="collapseExample3">
              <div class="card card-body">
                All types of mainstream payments are accepted<br>
                This includes Credit Cards,Debit Cards,MasterCard and PayPal
              </div>
        </div>
            <p>
              <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
               When will  games purchased be delivered ?
              </a>
          
            </p>
            <div class="collapse" id="collapseExample4">
              <div class="card card-body">
                As soon as the order is processed on confirmed, a delivery man will be deployed in an estimate of 2-3 days.
              </div>
        </div>
            
        </div>
    </body>
</html>
