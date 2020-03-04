<?php
	include("config/connection.php");
	$conn = opencon();
	
	$country = $_POST['country'];
	if($country == NULL){
		header("Location: index.php");
	} else {
		$name = $_POST['nama'];
		$userId = $_POST['userId'];
		$eventName = $_POST['eventname'];
		$time = $_POST['time'];
		$eventId = $_POST['eventId'];
		$jadwalId = $_POST['jadwalId'];
		$day = $_POST['day'];
		
		
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewports" content="width=device-width intial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<title>Appointment System</title>
		<style type="text/css">
			input[type=text], select , input[type=email], textarea {
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
				font-family: Calibri;
				font-size: 20px;
			}
			input[type=submit] {
				width: 100%;
				background-color: #FFA500;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				border-radius: 4px;
				cursor: pointer;
				font-family: Calibri;
				font-size: 20px;
			}
			input[type=submit]:hover {
				background-color: #FF8C00;
				font-family: Calibri;
				font-size: 20px;
			}
			div {
				border-radius: 5px;
				background-color: #f2f2f2;
				padding: 20px;
				font-family: Calibri;
				font-size: 20px;
			}	
			h3{
				font-family: Calibri;
			}
		</style>
	</head>
	<body>
	<div>
	<a href='index.php'><img src="asset/Logo-Panorama.png" width='400px' height='100px'></a>
	</div>
	<center><h3>Welcome to PDES Appointment System for <?php echo $eventName; ?></h3></center>
	<div>
	<form action="controllers/proses_appointment.php" method="POST" name="validasi_form" onsubmit="return validasi_input(this)">
		<input type="hidden" name="nama" value="<?php echo $name;?>"/>
		<input type="hidden" name="userId" value="<?php echo $userId;?>"/>
		<input type="hidden" name="country" value="<?php echo $country;?>"/>
		<input type="hidden" name="time" value="<?php echo $time;?>"/>
		<input type="hidden" name="eventname" value="<?php echo $eventName;?>"/>
		<input type="hidden" name="eventId" value="<?php echo $eventId;?>"/>
		<input type="hidden" name="jadwalId" value="<?php echo $jadwalId;?>"/>
		<input type="hidden" name="day" value="<?php echo $day;?>"/>
		<label for="company_name">Company Name / Agent Name</label><input type="text" id="company_name" name="company_name" placeholder="Your Company Name / Agent Name" />
		<label for="first_name">First Name</label><input type="text" id="first_name" name="first_name" placeholder="Your First Name" />
		<label for="last_name">Last Name</label><input type="text" id="last_name" name="last_name" placeholder="Your Last Name" />
		<label for="email_address">Email Address</label><input type="email" id="email_address" name="email_address" placeholder="Your Email Address" />
		<label for="contact_number">Contact Number</label><input type="text" id="contact_number" name="contact_number" placeholder="Your Contact Number" />
		<label for="notes">Notes / Messages</label><textarea name="notes" rows="5" cols="40"></textarea>
		<br /><br /><br />
		<label><b><input type="checkbox" id="checkbox1" name="checkbox1" value="agree" /> By checking the checkbox, I hereby agree and express my voluntarily, unequivocal and informed consent that my personal data which I provided to Panorama Destination shall be processed for the purposes of making meeting appointment.</b></label>
		<!-- CAPTCHA -->
		<div class="g-recaptcha" data-sitekey="6Lf979UUAAAAABFrk5lJ7cM8_SmdlIbYj0O6GHtG"></div>
		<!-- END OF CAPTCHA -->
		<input type="submit" name="submit" value="submit" />
	</form>
	</div>
	</body>
	<script type="text/javascript" src="validasi.js"></script>
</html>

<?php 
	}
?>