<?php
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION["cart"] = array();
        $_SESSION["totalprice"] = array();
     }
    
    $totalprice = array_sum($_SESSION["totalprice"]);
                            
    if (isset($_SESSION['username'])){
        $tempuser = $_SESSION["username"];
        $logcheck = '<li><a href="userprofile.php"><span class="glyphicon glyphicon-user"></span>Welcome, '.$tempuser.'</a></li>';
        $totalprice = $totalprice * 0.90;
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
              <li  ><a href="products.php">Products</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="help.php">Help</a></li>
              <li><a href="about.php">About Us</a></li>
            </ul>
              <ul class="nav navbar-nav navbar-right">
                <li ><a href="viewcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart( <?php echo count($_SESSION["totalprice"]).')' ?></a></li>
                <li class="active"><a href="checkout.php"><span class="glyphicon glyphicon-ok"></span>Checkout</a></li>
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
            if (isset($_GET['error'])) {
		 
		switch($_GET['error']){
            case 1 : echo '<div class="alert alert-danger"><strong>Error! </strong>Please fill in all fields !</div>';
            break;
                
        }
    }
        if (isset($_GET['purchase'])) {
		 
		switch($_GET['purchase']){
            case 2 : echo '<div class="alert alert-danger"><strong>Error! </strong>Invalid email address !</div>';
            break;
                
        }
    }
        
        ?>
        <div class="container whitebackground">
            <table class="table">
            
				<tr>
					<th>Game Name</th>
					<th>Price</th>
                    <th>Quantity</th>
        
                  
				</tr>
				<?php
					//process $result
                $link = mysqli_connect("localhost", "root", "", "gamedatabase");
					if (mysqli_connect_errno()) {
						echo "<div class=\"alert alert-error\">Error connecting to DB...".mysqli_connect_error()."</div>";
						exit;
					}
				
                $ids = '(' . implode(',', $_SESSION["cart"]) .')';
                
				$query1 = "SELECT * 
                        FROM stock 
                        WHERE id IN ". $ids;
               

                $result = mysqli_query($link, $query1);
                 if($result == true){
					while ($row = mysqli_fetch_assoc($result)) { 
                
						echo "<tr>";
							echo "<td>".$row['name']."</td>";
                            echo "<td>"."$".$row['price']."</td>";
                            echo "<td>".$_SESSION["quantity"][$row['id']]."</td>";
                        echo "</tr>";
                        
					}
                 }
                
                
    
					
				?>
			</table>
            <?php 
            
            
                                    
            echo '<div class="alert alert-info"><strong>Total price is: $'.$totalprice;
            echo '</strong></div>';
            if($result == false){ 
                    header('Location: viewcart.php?empty=1');
                }
            
          ?>
            
            <div class="container whitebackground"> 
            <form action="receipt.php" method="post">
				<div class="col-md-6 col-md-offset-3 form-line">
			  			<div class="form-group">
			  				<label for="name">Please enter recepient's name:</label>
					    	<input type="text" class="form-control" name="name" placeholder=" Enter name">
				  		</div>
					  	<div class="form-group">
					    	<label for="address">Please enter recepient's address: </label>
                            <input type="text" class="form-control" name="address" placeholder="Enter address">    
			  			</div>
                    <div class="form-group">
					    	<label for="email">Please enter valid email address: </label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">    
			  			</div>
                    <div class="form-group">
					    	<label>Please enter payment type: </label>
					    	<select name="typepayment">
                              <option value="visa">VISA</option>
                              <option value="paypal">PAYPAL</option>
                              <option value="mastercard">MASTERCARD</option>
                              <option value="debitcard">DEBIT CARD</option>
                              <option value="creditcard">CREDIT CARD</option>
                            </select>
			  			</div>
                    <input type="hidden" name="totalprice" value= <?php echo $totalprice ?> />
                    <button  value="Submit" name="Submit" class="btn btn-danger submit">Order</button><br><br>
                      
			  		</div>
			  		
            </form>
        </div>   
            
            
            
            
        </div>
        
    </body>
</html>
