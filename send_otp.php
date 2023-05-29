<?php
/*##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################*/

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
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "dovantrung47201@gmail.com";
//Set gmail password
	$mail->Password = "kpqegkvndvktszia";
//Email subject
	$mail->Subject = "Verify Your Account Email Address";
//Set sender email
	$mail->setFrom($email);
//Enable HTML
	//$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$otp = rand(100000,999999);
	$mail->Body = "Your OTP code is: ".$otp;
//Add recipient
	$mail->addAddress($email);
//Finally send email
	if ( $mail->send() ) {
		echo "<script type='text/javascript'>alert('Please check your email!');</script>";
		include ('verify_email.php');
	}else{
		echo "<script type='text/javascript'>alert('Error!');</script>";
	}
//Closing smtp connection
	$mail->smtpClose();


	$email_ = $email;
?>


