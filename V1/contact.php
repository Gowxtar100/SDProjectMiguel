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
              <li class="active"><a href="contact.php">Contact Us</a></li>
              <li><a href="help.php">Help</a></li>
              <li><a href="about.php">About Us</a></li>
            </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="viewcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart( <?php echo count($_SESSION["totalprice"]).')' ?></a></li>
                <li><a href="checkout.php"><span class="glyphicon glyphicon-ok"></span>Checkout</a></li>
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
            if (isset($_GET['invalid'])) {
		 
		switch($_GET['invalid']){
            case 1 : echo '<div class="alert alert-danger"><strong>Error! </strong>Invalid email</div>';
            break;
          
        }
            
        }
        ?>
        <div class="container whitebackground"> 
            <form action="contactform.php" method="post">
				<div class="col-md-6 form-line">
			  			<div class="form-group">
			  				<label for="contactname">Name:</label>
					    	<input type="text" class="form-control" name="contactname" placeholder=" Enter name">
				  		</div>
				  		<div class="form-group">
					    	<label for="contactemail">Email Address</label>
					    	<input type="email" class="form-control" name="contactemail" placeholder=" Enter a valid Email Address">
                            <small> Your email is never published or shared.</small>
					  	</div>	
					  	<div class="form-group">
					    	<label>Please select topic:</label>
					    	<select name="contacttopic">
                              <option value="Product">I have a question about a product</option>
                              <option value="Issue">I have an issue with my order</option>
                              <option value="Reserve">I want to make a product reservation.</option>
                            </select>
			  			</div>
			  		</div>
			  		<div class="col-md-6">
			  			<div class="form-group">
			  				<label> Message</label>
			  			 	<textarea  class="form-control" name="contactmessage" placeholder="Enter Your Message"></textarea>
			  			</div>
			  			<div>

			  				<button  type="submit" value="Submit" name="Submit" class="btn btn-default submit">Send Message</button>
			  			</div>
			  			
					</div>
            </form>
        </div>
    </body>
</html>