<?php
    // Import PHPMailer 
            
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            
            require 'vendor/autoload.php';
              
    if (isset($_POST['Submit'])) {
        $Name = $_POST["contactname"];
        $Email = $_POST["contactemail"];
        $Topic = $_POST["contacttopic"];
        $Message = $_POST["contactmessage"]; 
        
        $Message .= '<br><br><b> Customer Email: : '.$Email.'<br> Customer Name: '.$Name;
        
        if(!empty($Name) && !empty($Email) && !empty($Message)){
        
      
    
        switch($Topic){
            case 'Product':
            $Topic = "Product Question";
                break;
            case 'TV':
            $Topic= 'Order Issue';
            break;
            case 'Phone':
            $Topic= "Reservation Order";
            break;
        }
            
            
            
           

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                //$mail->SMTPDebug = 1;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'conceptgamestorebuisness@gmail.com';             // Sender Email
                $mail->Password = 'gowxtar100';                          // Sender Password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('conceptgamestorebuisness@gmail.com', $Name);
                $mail->addAddress('GameStoreConceptManager@gmail.com');     //Address that receives the email
        


                //Content
                $mail->isHTML(true);                                  // Sets the  email format to HTML
                $mail->Subject = $Topic;
                $mail->Body    =  $Message;
                $mail->AltBody = strip_tags($Message);

                $mail->send();
               header('Location: messagesent.php');
            } catch (Exception $e) {
                header('Location: contact.php?invalid=1');
            }


        }



    }
        
    else{
        echo '<div class="container homediv"> Please fill in all required fields <br>';
        echo'<a href="contact.php"><button type="button" href="contact.php" class="btn btn-danger">Go back</button></a></div>';
        
        
        
    }
 
?>