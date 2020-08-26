<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$connection=mysqli_connect('localhost','root','','project');
if(isset($_POST['submit'])){
	$len=10;
$validity=bin2hex(openssl_random_pseudo_bytes($len));
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
$email=$_POST['email'];
$mail->setFrom("{$email}");
$mail->addAddress('1stjuneadvjava@gmail.com');
$mail->Subject='first smtp mail';
$mail->Body='<p>click link below:<a href="http://localhost/Feedback-vishal/back-src/forgotpassword.php?&email='.$email.'&validity='.$validity.'">http://localhost/Feedback-vishal/back-src/forgotpassword.php?&email='.$email.'&validity='.$validity.'</a><p>';
if($mail->send()){	
$query="UPDATE student SET validity='$validity' WHERE email=?";
$stmt=mysqli_prepare($connection,$query);
if($stmt){
	mysqli_stmt_bind_param($stmt,'s',$email);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}
else{
	echo 'something goes wrong which is:'.mysqli_error($connection);
}
   echo 'message sent';
}
else{
    echo 'message not sent';
}
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>email sending</title>
</head>
<body>
	<!--------../front-src/pages/index3.html--->
	<form action="#" method="POST" enctype="multiparts/form-data">
		<input type="email" name="email" >
	<input type='submit' name='submit' value="send mail">
</form>
</body>
</html>