<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once('src/Exception.php');
    require_once('src/PHPMailer.php');
    require_once('src/SMTP.php');

    function sendmail($to, $subject, $message){
        $mail = new PHPMailer(true);
        try{
            //server setting
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host      = 'smtp.gmail.com';
            $mail->SMTPAuth  = true;
            $mail->Username  = 'hungco381@gmail.com';
            $mail->Password  = '1mbyi2ioc';
            $mail->SMTPSecure= 'tls';
            $mail->Port      = 587;
            // recipients
            $mail->setFrom('hungco381@gmail.com', 'Admin NTTU');
            $mail->addAddress($to);
            //content
            $mail->isHTML(true);
            $mail->Subject   =$subject;
            $mail->Body      =$message;
            // Mail-> altbody ='this body...'

            $sended = $mail->send();
            return $sended ? true : false;
        }catch(Exception $e){
        }
    }
?>