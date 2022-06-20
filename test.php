<?php


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.mail.yahoo.com', 587, 'tls'))
  ->setUsername('gac_banking@yahoo.com')
  ->setPassword('iylfvpphpapvsmfd')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['gac_banking@yahoo.com' => 'John Doe'])
  ->setTo(['ginodevlas@gmail.com'=> 'Gino'])
  ->setBody('Here is the message itself')
  ;

// Send the message
if($mailer->send($message))
{
    echo 'mails verstuurd';
}
?>
    