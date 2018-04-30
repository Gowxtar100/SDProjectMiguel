<?php
    // Import PHPMailer 
    
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            //Load Composer's autoloader
            require 'vendor/autoload.php';
    
//Connect to DATABASE
        define("access",true);
        $connectusername = 'root';
        $connectpassword = '';

        $db = 'gamedatabase';

        $db = new mysqli('localhost', $connectusername, $connectpassword, $db) or die("Unable to connect");


        //Get values from form

        if (isset($_POST['Submit'])) {
        $Username = $_POST["username"];
        $Email = $_POST["email"];
        
    //Checks if users exsist in database
    
        $sqlquery = "SELECT * FROM `user` WHERE username='$Username' and email='$Email'";
        
        $result = mysqli_query($db, $sqlquery) or die(mysqli_error($db));
        $matchedusers = mysqli_num_rows($result);
        
        //If a user is found 
        
        if ($matchedusers == 1){
        session_start();

        $idquery = "SELECT id FROM `user` WHERE username='$Username' and email='$Email'";
        $idresult = mysqli_query($db,$idquery);
        $idtoken = mysqli_fetch_assoc($idresult);
        $_SESSION['id'] = $idtoken['id']; 
        $created = time();
        $expires = $created + (3600);
        
        $Topic = 'Forgotten Password - Concept Box';
        $Message = '<br> Dear, '.$Username.'<br><br><b> <a href="http://localhost/v1/changepassword.php?expires='.$expires.'&created='.$created.'">Change your password here</a><br><br><b>Please note that this link will expire in 1 hour</b><br><br> If it was not you who requested a password change contact us immediately';
        
        
      
        if($idquery){
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
                $mail->addAddress($Email);     //Address that receives the email
        


                //Content
                $mail->isHTML(true);                                  // Sets the  email format to HTML
                $mail->Subject = $Topic;
                $mail->Body    =  $Message;
                $mail->AltBody = strip_tags($Message);

                $mail->send();
               header('Location: forgotsent.php');
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
      }
            
            
            
            
        }else{
        //If username or email incorrect 
        header('Location: loginfail.php');
        

            }
        }
?>