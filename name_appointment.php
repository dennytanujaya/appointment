<?php
	include("config/connection.php");
	$conn = opencon();
	$eventID = $_POST['eventname'];
	$sql="SELECT * FROM event";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	if($eventID = $row['eventId']){
		$eventName = $row['eventName'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewports" content="width=device-width intial-scale=1">
		<title>Appointment System</title>
		<style type="text/css">
			input[type=text], select , input[type=email] {
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
	<div>
	<center><h3>Welcome to PDES Appointment System for <?php echo $eventName; ?></h3></center>
	<form action="time_appointment.php" method="POST" name="validasi_form" onsubmit="return validasi_input_appointment(this)">
		
		<label for="country">With whom do you want to make appointment</label>
		<select id="country" name="country">
			<option value="">Please choose</option>
			<option value="PDES Group">Renato Domini&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | Panorama Destination Group</option>
			<option value="PDES Indonesia">Renato Domini&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | Panorama Destination Indonesia</option>
			<option value="PDES Malaysia">Noor Ismail Muhammad &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| Panorama Destination Malaysia</option>
			<option value="PDES Thailand">Nicola Scaramuzzino&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | Panorama Destination Thailand</option>
			<option value="PDES Vietnam">Tuong Trang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | Panorama Destination Vietnam</option>
		</select>
		<input type="hidden" name="eventname" value="<?php echo $eventName;?>"/>
		<input type="hidden" name="eventId" value="<?php echo $eventID;?>"/>
		</br></br>
		<input type="submit" name="submit" value="Next" />
	</form>
	</div>
	</body>
	<script type="text/javascript" src="validasi.js"></script>
</html>