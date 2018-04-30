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
        <script src="ADMIN/vertify.js"></script>
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
              <li class="active"><a href="contact.php">Contact Us</a></li>
              <li><a href="help.php">Help</a></li>
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
        <?php
        if (isset($_GET['sent'])) {
		 
		switch($_GET['sent']){
            case 1 : echo '<div class="alert alert-success"><strong>Success!</strong> Email has been sent to client !</div>';
            break;
            
        }
    }
        ?>
        
        <div class="container whitebackground"> 
            <form action="sendmailadmin.php" method="post">
				<div class="col-md-6 col-md-offset-3 form-line">
			  			<div class="form-group">
			  				<label for="clientemail">Enter client email:</label>
					    	<input type="email" class="form-control" name="clientemail" placeholder=" Enter email">
				  		</div>
					  	<div class="form-group">
					    	<label for="topic">Enter your email topic: </label>
                            <input type="text" class="form-control" name="topic" placeholder="Enter topic"> 
			  			</div>
                        <div class="form-group">
					    	<label for="message">Enter your message: </label>
                            <input type="text" class="form-control" name="message" placeholder="Enter message"> 
			  			</div>
                        <button  value="Submit" name="Submit" class="btn btn-danger submit">Send Email</button><br><br>
			  		</div>
			  		
            </form>
        </div>  
        
        
    </body>
</html>