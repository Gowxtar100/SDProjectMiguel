<?php
    session_start();
    if (!isset($_SESSION['cart'])) {
        header('Location : viewcart.php');
     }
    
                            
    if (isset($_SESSION['username'])){
        $tempuser = $_SESSION["username"];
        $logcheck = '<li><a href="userprofile.php"><span class="glyphicon glyphicon-user"></span>Welcome, '.$tempuser.'</a></li>';
    }
    else{
        $logcheck = '<li ><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
    }

    if (isset($_POST['Submit'])) {
        
    $name = $_POST["name"];
    $address = $_POST["address"];
    $payment = $_POST["typepayment"];
    $price = $_POST["totalprice"];
    $email = $_POST["email"];
    
    switch($address){
            case 'visa':
            $payment = "VISA";
                break;
            case 'paypal':
            $payment = 'PAYPAL';
            break;
            case 'mastercard':
            $payment = 'MASTERCARD';
            break;
            case 'creditcard':
            $payment = 'CREDIT CARD';
            break;
            case 'debitcard':
            $payment = 'DEBIT CARD';
            break;
        } 
    }
    else{
        header('Location: checkout.php?error=1');
    }
    if(empty($name) || empty($address) || empty($email)){
        header('Location: checkout.php?error=1');

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
        
        <div class="container whitebackground"> 
				<div class="col-md-6 col-md-offset-3 form-line">
                <h2> YOUR RECEIPT: </h2><br>
			     <p><b>CUSTOMER NAME : </b><?php echo $name ?> </p><br> 	
                 <p><b>ADDRESS : </b><?php echo $address ?> </p><br> 
                <p><b>PAYMENT TYPE : </b><?php echo $payment ?> </p><br>
                <p><b>EMAIL : </b><?php echo $email ?> </p><br><br>
                
                <h3> YOUR ORDER : </h3>
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
            <h2> TOTAL PRICE : $<?php echo $price  ?></h2>
                    
                <form action="confirmorder.php" method="post">
                    <input type="hidden" name="payment" value= <?php echo $payment ?> />
                    <input type="hidden" name="address" value= <?php echo $address ?> />
                    <input type="hidden" name="name" value= <?php echo $name ?> />
                    <input type="hidden" name="price" value= <?php echo $price ?> />
                    <input type="hidden" name="email" value= <?php echo $email ?> />
                    <button  type="submit" value="Submit" name="Submit" class="btn btn-danger submit">Confirm & Pay</button>
                </form>  
			 </div>
        </div>   
    </body>
</html>
