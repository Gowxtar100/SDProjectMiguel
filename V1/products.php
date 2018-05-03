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
              <li  class="active"><a href="products.php">Products</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="help.php">Help</a></li>
              <li><a href="about.php">About Us</a></li>
            </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="viewcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart( <?php echo count($_SESSION["totalprice"]).')' ?></a></li>
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
            $link = mysqli_connect("localhost", "root", "", "gamedatabase");
				if (mysqli_connect_errno()) {
					echo "<div class=\"alert alert-error\">Error connecting to DB...".mysqli_connect_error()."</div>";
					
					exit;
				}

				
				//create the SQL statement
				$query = "SELECT * FROM stock";
				
				//pass the $query to MySQL through the connection ($link)
				$result = mysqli_query($link, $query);
        
            if (isset($_GET['added'])) {

            switch($_GET['added']){
                case 1 : echo '<div class="alert alert-success"><strong>Success!</strong> Product has been added to cart</div>';
                break;

              
            }
        }
        
                
				
				
        ?>
        <div class="container whitebackground">
        <h2 class="alignedcenter"> List of available products:</h2>
        <table class="table">
            
				<tr>
					<th>Game Name</th>
					<th>Price</th>
                  
				</tr>
				<?php
					//process $result
					while ($row = mysqli_fetch_assoc($result)) {     
						echo "<tr>";
							echo "<td>".$row['name']."</td>";
                            echo "<td>"."$".$row['price']."</td>";
							echo "<td><a class=\"btn btn-danger\" href=\"detailedinfo.php?id=".$row['id']."\">More Information</a></td>";
                        echo "</tr>";
					}
					
				?>
			</table>
        </div>
    </body>
</html>
