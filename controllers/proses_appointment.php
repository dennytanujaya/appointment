<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../asset/PHPMailer/src/Exception.php';
require '../asset/PHPMailer/src/PHPMailer.php';
require '../asset/PHPMailer/src/SMTP.php';
	
$response = $_POST["g-recaptcha-response"];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
	'secret' => '6Lf979UUAAAAAE-E-cVq_GA66VpBcbQQlqNiizwt',
	'response' => $_POST["g-recaptcha-response"]
);
$options = array(
	'http' => array (
		'method' => 'POST',
		'content' => http_build_query($data)
	)
);
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);

if ($captcha_success->success==false) {
	echo "<p>You are a bot! Go away!</p>";
} else if ($captcha_success->success==true) {

	include("../config/connection.php");
	$conn = opencon();
	

	date_default_timezone_set('Asia/Jakarta');
	$waktuSekarang = date("Y-m-d H:i");

	$company_name = $_POST['company_name'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email_address = $_POST['email_address'];
	$contact_number = $_POST['contact_number'];
	$time = $_POST['time'];
	$name = $_POST['nama'];
	$jadwalId = $_POST['jadwalId'];
	$userId = $_POST['userId'];
	$notes = $_POST['notes'];
	$eventName = $_POST['eventname'];
	$eventId = $_POST['eventId'];
	$day = $_POST['day'];

	$status = "booked";
	$sqlEmail="SELECT * FROM user";
	$result=mysqli_query($conn,$sqlEmail);
	$row = mysqli_fetch_assoc($result);
	if($userId = $row['userId']){
		$email = $row['email'];
	}

	$sql = "UPDATE jadwal SET status='$status', eventId='$eventId', companyName='$company_name', firstName='$first_name', lastName='$last_name', emailAddress='$email_address', contactNumber='$contact_number', dateCreated='$waktuSekarang', notes='$notes' WHERE jadwalId='$jadwalId'";
	mysqli_query($conn, $sql);

	$sql1 = "INSERT INTO visitor (jadwalId, userId, companyName, firstName, lastName, emailAddress, contactNumber, date, time, notes) VALUES ('".$jadwalId."', '".$userId."', '".$company_name."', '".$first_name."', '".$last_name."', '".$email_address."', '".$contact_number."', '".$time."', '".$notes."')";
	mysqli_query($conn, $sql1);



	$mail = new PHPMailer(true);

		try {
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'noreply@panorama-destination.com';                     // SMTP username
			$mail->Password   = 'Pas5w0rd';                               // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('noreply@panorama-destination.com', 'No Reply');
			//$mail->addAddress('denni.tanudjaja@panorama-destination.com');
			$mail->addAddress($email);     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			$mail->addCC('phimella.soelaksmono@panorama-destination.com');
			//$mail->addBCC('bcc@example.com');

			// Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'appointment';
			$mail->Body    = "<center><b>YIPPIE! There is a new appointment for ".$eventName.".</b></center>Here are the details: <br /><br />First Name: ".$first_name."<br />Last Name: ".$last_name."<br />Company Name: ".$company_name."<br />Email Address: ".$email_address."<br />Contact Number: ".$contact_number."<br />Date, Day: ".$day." ".$time.".<br />Notes: ".$notes.".<br /> <br />";
			$mail->send();
			
			$mail->isSMTP();                                            // Send using SMTP
			$mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			$mail->Username   = 'noreply@panorama-destination.com';                     // SMTP username
			$mail->Password   = 'Pas5w0rd';                               // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			$mail->Port       = 587;
			$mail->setFrom('noreply@panorama-destination.com', 'No Reply');
			$mail->addAddress($email_address);     // Add a recipient
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'appointment';
			$mail->Body    = "<center><b>Thank you for using PDES Appointment System for ".$eventName.".</b></center>You have choose to meet our representative as per below schedule:<br />Name: ".$name."<br />Date, Day: ".$day."<br />Time: ".$time.".<br /><br />".$name." looks forward to meet you.";
			$mail->send();
			header("Location: ../views/success.php?company_name=$company_name");
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
/*
if($time != NULL){
	$to_email = 'denni.tanudjaja@panorama-destination.com';
	$subject = "Appointment";
	$message = "Company Name: ".$company_name."<br />First Name: ".$first_name."<br />Last Name: ".$last_name."<br />Email Address: ".$email_address."<br />Contact Number: ".$contact_number."<br />Time: ".$time."<br /> <br />";
	$headers = 'From: denni.tanudjaja@panorama-destination.com';
	mail($to_email,$subject,$message,$headers);
}*/
?>
