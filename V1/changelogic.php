<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    //Connect to DATABASE
        define("access",true);
        $connectusername = 'root';
        $connectpassword = '';

        $db = 'gamedatabase';

        $db = new mysqli('localhost', $connectusername, $connectpassword, $db) or die("Unable to connect");

    //Get values from form

        if (isset($_POST['Submit'])) {
        $Password = $_POST["password"];
        $NewEmail = $_POST["newmail"];
        $Username = $_SESSION['username'];
        
    //Checks if password matches in database
    
        $sqlquery = "SELECT * FROM `user` WHERE username='$Username' and password='$Password'";
        
        $result = mysqli_query($db, $sqlquery) or die(mysqli_error($db));
        $matchedusers = mysqli_num_rows($result);
            
    //If values inserted match ones in database, create session / ELSE Error message
        if ($matchedusers == 1){
        $sqlquery2 = "UPDATE user SET email ='$NewEmail' WHERE username = '$Username'";
        $result = mysqli_query($db, $sqlquery2) or die(mysqli_error($db));
        header('Location: changemail0.php');
        }else{
        //If username or password incorrect display message
        header('Location: changemail1.php');
        

            }
            
        }



?>