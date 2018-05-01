<?php
    session_start();
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
        <style>
            .buttonclass{
                background-color: indianred;
                color:white;
            }
        </style>
    </head>
    <?php
    
              
        if (isset($_GET['changed'])) {
		 
		switch($_GET['changed']){
            case 1 : echo '<div class="alert alert-success"><strong>Success!</strong> Email has been changed successfully.</div>';
            break;
            case 2 : echo '<div class="alert alert-danger"><strong>Error! </strong>Incorrect credentials !</div>';
            break;
                
        }
    }
        ?>
    <body>
        
        <div class="container homediv">Welcome, <?php echo $_SESSION['username'];  ?><br>
        <p> Please select an option </p>
        <a href="index.php"><button type="button" href="index.php" class="btn buttonclass">Go back</button></a>
       <a href="logout.php"><button type="button" href="logout.php" class="btn buttonclass">Logout</button></a>
        <a href="change.php"><button type="button" href="changemail/change.php" class="btn buttonclass">Change Registered Email</button></a>
            </div>
        
        
    </body>
</html