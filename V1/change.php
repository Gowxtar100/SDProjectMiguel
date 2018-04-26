<?php
    session_start();
if (!isset($_SESSION['username'])){
        header('Location: login.php');
    }
?>
<!DOCTYPE html> 
<html> 
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
        <link rel="icon" href="Images/Logo.png">
    </head>
    <body>
        
        <div class="container homediv">
        <form action="changelogic.php" method="post">
				<div class="col-md-6 col-md-offset-3 form-line">
			  			<div class="form-group">
			  				<label for="password">Enter your password:</label>
					    	<input type="password" class="form-control" name="password" placeholder=" Enter password">
				  		</div>
					  	<div class="form-group">
					    	<label for="newmail">Enter your new email: </label>
                            <input type="email" class="form-control" name="newmail" placeholder="Enter your new email">
                            
			  			</div>
                    <a href="logindex.php"><button type="button" href="logindex.php" class="btn btn-success">Go back</button></a>
                        <button  value="Submit" name="Submit" class="btn btn-danger submit">Change Email</button><br><br>
                        
			  		</div>
			  		
            </form>
            </div>
        
        
    </body>
</html>