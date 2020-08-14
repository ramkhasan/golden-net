<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'formtest@list.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'YIROuiur4x3|'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('formtest@list.ru'); // от кого будет уходить письмо?
$mail->addAddress('ramhas87@gmail.com');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Добавить вложения
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Дополнительное имя
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Новая заявка с сайта';
$mail->Body    = ''. $name .' оставил/а заявку.<br>
Его/её телефон: <i>'.$phone.'</i><br>
Его/её почта: <i>'.$email.'</i>';
$mail->AltBody = '';

if(!$mail->send()) {
  echo 'Error';
} 
else {
  header('location: thanks.html');
}
?>