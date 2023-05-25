<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'agileworrios1@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
//mail($to,$email_subject,$email_body,$headers);
//return true;





use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';

require 'src/PHPMailer.php';

require 'src/SMTP.php';

$mail = new PHPMailer;

$mail->isSMTP(); 

$mail->Mailer = "smtp";

$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages

$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6

$mail->Port = 587; // TLS only

$mail->SMTPSecure = 'tls'; // ssl is depracated

$mail->SMTPAuth = true;

$mail->Username = 'agileworrios1@gmail.com';

$mail->Password = 'bbhdkwfkcrushdfq';

$mail->setFrom($email_address, $name);

$mail->addAddress($to, 'AgileWarriors');

$mail->Subject = $email_subject;

$mail->msgHTML($email_body); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,

$mail->AltBody = $email_body;

// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){

    echo "Mailer Error: " . $mail->ErrorInfo;
	var_dump($mail)
return false;
	
	

}else{

    echo "Message sent!";
	return true;

}
?>
