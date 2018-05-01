<?php
// Import PHPMailer 
    
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            //Load Composer's autoloader
            require 'vendor/autoload.php';

//Connect to DATABASE

$connectusername = 'root';
$connectpassword = '';

$db = 'gamedatabase';

$db = new mysqli('localhost', $connectusername, $connectpassword, $db) or die("Unable to connect");

//Get values from form

if (isset($_POST['Submit'])) {
    $Username = $_POST["username"];
    $EmailAdd = $_POST["email"];
    $Password = $_POST["password"];
    $PasswordHashed = hash('sha256',$Password);
    
    
    
    
    if(!empty($Username)&&!empty($EmailAdd)&&!empty($Password)){
     $query = "INSERT INTO `user` (username, email, password) VALUES ('$Username', '$EmailAdd', '$PasswordHashed')";
    
        $Topic = 'Registration Completed';
        $Message = '<br> Dear, '.$Username.'<br><br> Thank you for registering with Concept Box Game Store!';
    
        $result = mysqli_query($db, $query);
    
        if($result){
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                //$mail->SMTPDebug = 1;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'gamestoreconceptmanager@gmail.com';             // Sender Email
                $mail->Password = 'gowxtar100';                          // Sender Password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('GameStoreConceptManager@gmail.com');
                $mail->addAddress($EmailAdd);     //Address that receives the email
        


                //Content
                $mail->isHTML(true);                                  // Sets the  email format to HTML
                $mail->Subject = $Topic;
                $mail->Body    =  $Message;
                $mail->AltBody = strip_tags($Message);

                $mail->send();
                header('Location: login.php?success=2');
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
            
            
          
        }else{
           header('Location: register.php?error=1');
        }
    }
    else{
        header('Location: register.php?error=2');
    }
    
   
}
?>﻿