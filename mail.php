<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$websit =$_POST['user_websiteUrl'];
$adres =$_POST['user_adres'];
$cercal =$_POST['user_cercal-b'];
$square =$_POST['user_square-b'];
$elipse =$_POST['user_elipse-b'];
$opener =$_POST['user_opener-b'];
$message =$_POST['user_message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'Brelok-QR-Bot@yandex.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'qr-01082023-qr'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('Brelok-QR-Bot@yandex.ru'); // от кого будет уходить письмо?
$mail->addAddress('Brelok-QR@yandex.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новая заявка!';
$mail->Body    = '' .$name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email. '<br>Веб сайт этого пользователя: ' .$websit. '<br>Адрес этого пользователя: ' .$adres. '<br>В заказе круглые брелоки: ' .$cercal. '<br>В заказе квадратные брелоки: ' .$square. '<br>В заказе овальные брелоки: ' .$elipse. '<br>В заказе открывалки брелоки: ' .$opener. '<br>Сообщение пользователя: ' .$message ;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thank-you.html');
}
?>