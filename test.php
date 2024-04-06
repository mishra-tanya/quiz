<?php
require "config.php";
include('smtp/PHPMailerAutoload.php');
$email=$_GET['email'];
$key=md5(time()+123456789% rand(4000, 55000000));
//insert this temporary key into database
$sql_insert=mysqli_query($conn,"INSERT INTO forget_password(email,temp_key) VALUES('$email','$key')");
//sending email about update
$msg = "Please copy the link and paste in your browser address bar". "\r\n"."http://localhost/quiz_app/reset/forgot_password_reset.php?key=".$key."&email=".$email;
       
echo smtp_mailer($email,'Subject',$msg);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	// $mail->SMTPDebug = 2; 
	$mail->Username = "Your_email@gmail.com";
	$mail->Password = "";
	$mail->SetFrom("your_email@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return "<script>alert('Email sent for changing your password'); window.location.href = 'login.php';</script>";
	}
}
?>