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
        $Password = $_POST['password1'];
        $Password2 = $_POST['password2'];
        $expires = $_POST['expires'];
        $created = $_POST['created'];
            
        if($Password == $Password2){
            if(!empty($Password) && !empty($Password2)){
                $hashedpassword = hash('sha256',$Password);
                $sqlquery = "UPDATE user SET password ='".$hashedpassword."' WHERE id=".$_SESSION['id'];
                $result = mysqli_query($db, $sqlquery) or die(mysqli_error($db));
                header('Location: login.php?success=1');
                $_SESSION = array();
                session_destroy();
            }
            else{
                header("Location: changepassword.php?expires=".$expires."&created=".$created."&error=1");
            }
        }
        else{
           header("Location: changepassword.php?expires=".$expires."&created=".$created."&error=2");
        }
          
        }

                                          
?>