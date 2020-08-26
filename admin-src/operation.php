<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../back-src/vendor/autoload.php';
$connection=mysqli_connect('localhost','root','','project');
function mailfor($email,$pass){
$mail=new PHPMailer();
$mail->isSMTP();
    $mail->Host='smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->Username='1stjuneadvjava@gmail.com';
$mail->Password='manit@123';
$mail->Port=465;
$mail->SMTPSecure='ssl';
$mail->CharSet='UTF-8';
$mail->isHtml(true);
$mail->setFrom("{$email}");
$mail->addAddress('1stjuneadvjava@gmail.com');
$mail->Subject='your password';
$mail->Body='<p>your passwrd for feedback System:'.$pass.'<p>';
return $mail->send();
}
function redirect($location){
	header("Location:".$location);
}
?>