<?php 

require '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions



function sendEmail($to, $subject,$message){ 
    try{ 


    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'recapp67@gmail.com';                     //SMTP username
    $mail->Password   = 'ajptlhzmxjjturno';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('recapp67@gmail.com');
    $mail->addAddress($to); 

    // content 
    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    return true;

    } catch (Exception $e) {
        return false;
    }



} 

//applicationrec12345
//  recapp67@gmail.com
// ajptlhzmxjjturno
