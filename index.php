<?php
	include("config/connection.php");
	$conn = opencon();
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
				font-family: Calibri;
				font-size: 20px;
			}
			div {
				border-radius: 5px;
				background-color: #f2f2f2;
				padding: 20px;
				font-family: Calibri;
			}
			label {
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
	<img src="asset/Logo-Panorama.png" width='400px' height='100px'>
	</div>
	<div>
	<center><h3>Welcome to PDES Appointment System</h3></center>
	<form action="name_appointment.php" method="POST" name="validasi_form" onsubmit="return validasi_input_appointment(this)">
		<label for="eventname">Where do you want yo meet</label>
		<select id="eventname" name="eventname">
			<option value="">Please choose</option>
			<?php
				$sql="SELECT * FROM event";
				$result=mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				foreach($result as $rows){
			?>
			<option value="<?php echo $rows['eventId'] ?>"><?php echo $rows['eventName'].", ".$row['lokasi']; ?></option>
			<?php } ?>
		</select>
		</br></br>
		<input type="submit" name="submit" value="Next" />
	</form>
	</div>
	</body>
	<script type="text/javascript" src="validasi.js"></script>
</html>