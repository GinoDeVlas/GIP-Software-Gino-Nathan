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
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./test.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="body" ng-app="myApp">
        <div class="wrapper" ng-controller="MyCtrl">
            <div class="info">Raw Value: {{phoneVal}}</div>
            <div class="info">Filtered Value: {{phoneVal | tel}}</div>

            <input class="input-phone" type='text' phone-input ng-model="phoneVal"/>
        </div>
    </div>
</body>
</html>
<script type="text/javascript" src="./test.js"></script>
