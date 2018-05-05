<?php
        // Import PHPMailer 
    session_start();
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;

            //Load Composer's autoloader
            require 'vendor/autoload.php';

    if (isset($_POST['Submit'])) {
        $payment = $_POST["payment"];
        $address = $_POST["address"];
        $name = $_POST["name"];
        $price= $_POST["price"];
        $Topic = "ORDER CONFIRMATION";
        $Message = "Thank you for your purchase with Concept Game Store !<br>Here is your receipt:<br>Name: ".$name."<br>Address: ".$address."<br>Payment type: ".$payment."<BR>Total cost: $".$price;
        $Email = $_POST["email"];
        
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
                
            $_SESSION["cart"] = array();
            $_SESSION["totalprice"] = array();

             
               header('Location: index.php?purchase=1');
            } catch (Exception $e) {
                header('Location: checkout.php?purchase=2');
            }
    }
else{
    header('Location: index.php');
}
?>