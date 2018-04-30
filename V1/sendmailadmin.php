<?php
        // Import PHPMailer 
    
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            //Load Composer's autoloader
            require 'vendor/autoload.php';

    if (isset($_POST['Submit'])) {
        $Topic = $_POST["topic"];
        $Message = $_POST["message"];
        $Email = $_POST["clientemail"];
        
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
               header('Location: adminmail.php?sent=1');
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
    }
?>