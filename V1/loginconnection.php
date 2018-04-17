<?php
  
    session_start();
    

    //Connect to DATABASE
        define("access",true);
        $connectusername = 'root';
        $connectpassword = '';

        $db = 'gamedatabase';

        $db = new mysqli('localhost', $connectusername, $connectpassword, $db) or die("Unable to connect");

    //Get values from form

        if (isset($_POST['Submit'])) {
        $Username = $_POST["username"];
        $Password = $_POST["password"];
        
    //Checks if users exsist in database
    
        $sqlquery = "SELECT * FROM `user` WHERE username='$Username' and password='$Password'";
        
        $result = mysqli_query($db, $sqlquery) or die(mysqli_error($db));
        $matchedusers = mysqli_num_rows($result);
            
    //If values inserted match ones in database, create session / ELSE Error message
        if ($matchedusers == 1){
        $_SESSION['username'] = $Username;
        }else{
        //If username or password incorrect display message
        header('Location: loginfail.php');
        
;
            }
        }

        if (isset($_SESSION['username'])){
        $Username = $_SESSION['username'];
        
        header('Location: loginsuccess.php');
       
        
        }

?>