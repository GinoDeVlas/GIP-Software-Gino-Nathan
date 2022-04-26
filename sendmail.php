<?php
  use PHPMailer\PHPMailer\PHPMailer;
function sendMail($name, $eMail, $message){
    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';
    
    $mail = new PHPMailer(true);

    $alert = '';
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ginotest1qqqqq@gmail.com';
        $mail->Password = 'G13012003';
        $SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = '587';

        $mail->setFrom('ginotest1qqqqq@gmail.com'); // Username (onze email adress)
        $mail->addAddress($eMail); // email ontvanger

        $mail->isHTML(true);
        $mail->Subject = 'Test';
        $mail->Body = "<h3>Name: $name <br>Email : $eMail<br>Subject : $message</h3>";
    } catch (Exception $e) {
        $alert = '<div class="alert-error">
                    <span>' . $e->getMessage().'</span>
                  </div>';
                  echo '<script type="text/javascript">
        $(document).ready(function() {
        swal({
            title: "fout!",
            text: "Ongeldig Wachtwoord!!",
            icon: "error",
            button: "Ok",
            timer: 200000
            });
        });
</script>' ;
    }
}


?>