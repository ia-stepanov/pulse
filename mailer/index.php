<?php

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';

//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

//Create instance of PHPMailer
	$mail = new PHPMailer();
	$mail->CharSet = "utf-8";

//Set mailer to use smtp
	$mail->isSMTP();

//Define smtp host
	$mail->Host = "smtp.gmail.com";

//Enable smtp authentication
	$mail->SMTPAuth = true;

//Set gmail username
	$mail->Username = "gmaillogin@gmail.com";

//Set gmail password
$mail->Password = "password";

//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";

//Port to connect smtp
	$mail->Port = "587";

//Set sender email
	$mail->setFrom("gmaillogin@gmail.com", "Pulse");

//Add recipient
	$mail->addAddress("");

//Enable HTML
	$mail->isHTML(true);

//Email subject
	$mail->Subject = "Data Pulse";

//Email body
	$mail->Body    = '
	Пользователь оставил данные <br> 
	Имя: ' . $name . ' <br>
	Номер телефона: ' . $phone . '<br>
	E-mail: ' . $email . '';

//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: ";
	}

//Closing smtp connection
	$mail->smtpClose();
