<?php
include 'passemail.php';
session_start();
     

    if (isset($_GET['expires'])) {
		
		$expires = $_GET['expires'];  
    }
    if (isset($_GET['created'])) {
		
		$created = $_GET['created'];  
    }

    if ($expires < time()) {
        header('Location: index.php');
    }

    if (!isset($_SESSION['id'])){
            header('Location: index.php');
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
              <li><a href="help.php">Help</a></li>
              <li><a href="about.php">About Us</a></li>
            </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-ok"></span>Checkout</a></li>
                <li ><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
        <?php
 
              
         if (isset($_GET['error'])) {
		 
		switch($_GET['error']){
            case 1 : echo '<div class="alert alert-danger"><strong>Error! </strong>Please fill in all the fields</div>';
            break;
                
            case 2: echo '<div class="alert alert-danger"><strong>Error! </strong>Passwords do not match</div>';
                break;
        }
    }
    ?>
        
        <div class="container whitebackground"> 
            <form action="changepasslogic.php" method="post">
				<div class="col-md-6 col-md-offset-3 form-line">
			  			<div class="form-group">
			  				<label for="username">Enter your new password:</label>
					    	<input type="password" class="form-control" name="password1" placeholder=" Enter password">
				  		</div>
					  	<div class="form-group">
					    	<label for="password">Repeat new password: </label>
                            <input type="password" class="form-control" name="password2" placeholder="Repeat password">
                            <input type="hidden" name="expires" value="<?= $expires?>" />
                            <input type="hidden" name="created" value="<?= $created?>" />
			  			</div>
                        <button  value="Submit" name="Submit" class="btn btn-danger submit">Change Password</button><br><br>
			  		</div>
            </form>
        </div>        
    </body>
</html>