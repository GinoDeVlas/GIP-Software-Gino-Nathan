<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 function sendmail($name, $email, $message, $subject){
require_once './phpmailer/Exception.php';
require_once './phpmailer/PHPMailer.php';
require_once './phpmailer/SMTP.php';
 
// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);
 
try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                 // Enable SMTP authentication
    $mail->Username   = 'ginotest1qqqqq@gmail.com';                     // SMTP username
    $mail->Password   = 'G13012003';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
 
    //Recipients
    $mail->setFrom('ginotest1qqqqq@gmail.com', 'GAC');
    $mail->addAddress($email , $name);     // Add a recipient
 
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "$message";;
    $mail->SMTPDebug = false;
    
    $mail->send();
 
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
