<?php
	include("config/connection.php");
	$conn = opencon();
	$eventId = $_POST['eventId'];
	$eventName = $_POST['eventname'];
	$country = $_POST['country'];
	if($country == NULL){
		header("Location: index.php");
	} else {
		if($country == 'PDES Indonesia'){
			$name = "Renato Domini";
			$userId = '1';
		} else if ($country == 'PDES Group'){
			$name = "Renato Domini";
			$userId = '1';
		} else if ($country == 'PDES Malaysia'){
			$name = "Noor Ismail Muhammad";
			$userId = '2';
		} else if ($country == 'PDES Thailand'){
			$name = "Nicola Scaramuzzino";
			$userId = '3';
		} else if ($country == 'PDES Vietnam'){
			$name = "Tuong Trang";
			$userId = '4';
		}
		
		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewports" content="width=device-width intial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
				font-size: 20px;
			}
			/* HIDE RADIO */
			[type=radio] { 
			  position: absolute;
			  opacity: 0;
			  width: 0;
			  height: 0;
			}

			/* IMAGE STYLES */
			[type=radio] + img {
			  cursor: pointer;
			}

			/* CHECKED STYLES */
			[type=radio]:checked + img {
			  outline: 2px solid #f00;
			}
			h4{
				font-family: Calibri;
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
	<form action="form_appointment.php" method="POST" name="validasi_form" onsubmit="return validasi_input_appointment(this)">
		<input type="hidden" name="nama" value="<?php echo $name;?>"/>
		<input type="hidden" name="userId" value="<?php echo $userId;?>"/>
		<input type="hidden" name="eventname" value="<?php echo $eventName;?>"/>
		<input type="hidden" name="country" value="<?php echo $country;?>"/>
		<input type="hidden" name="eventId" value="<?php echo $eventId;?>"/>
		<label for="time">Date and Time</label><br />
		<label><img src="http://placehold.it/50x25/FFA500/fff&text=Available">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Available time</label><br />
		<label><img src="http://placehold.it/50x25/A9A9A9/fff&text=Not Available">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not Available time</label>
		<?php 
			/*
			$tanggal_sekarang = date('Y-m-d');
			$sql="SELECT date, jadwalId, userId,  time, startTime, endTime, status FROM jadwal WHERE userId=$userId GROUP BY date";
			$result=mysqli_query($conn,$sql);
			
			while($row = mysqli_fetch_assoc($result)) {
				$jadwalId = $row['jadwalId'];
				$date = $row['date'];
				$timeStart = $row['startTime'];
				$timeEnd = $row['endTime'];
				$status = $row['status'];
				
				$date = new DateTime($date);
				$date_banding = $date->format("Y-m-d");
				if($date_banding >= $tanggal_sekarang){
				$date = $date->format("l, d F Y");
				echo "<br />";
				echo "<h4>".$date."</h4>";
				
				$startTime = DateTime::createFromFormat('H:i', $timeStart); // create today 10 o'clock
				$endTime = DateTime::createFromFormat('H:i', $timeEnd); // create today 10 o'clock
					
				for($i = $startTime; $i < $endTime; $i++){
					if($status != 'free'){
			*/
			$tanggal_sekarang = date('Y-m-d');
			
			$sql1="SELECT date FROM jadwal WHERE userId=$userId GROUP BY date ORDER BY jadwalId ASC";
			$result1=mysqli_query($conn,$sql1);
			while($row1 = mysqli_fetch_assoc($result1)) {
				$date[] = $row1['date'];
				$totalDate = count($date);
			}
			
			
			
			//$sql="SELECT date, jadwalId, userId, time , endTime, status FROM jadwal WHERE userId=$userId AND date='$dateArray' ORDER BY jadwalId ASC";
			//$result=mysqli_query($conn,$sql);
			
			foreach($date AS $dateArray ){
				$date = new DateTime($dateArray);
				$date_banding = $date->format("Y-m-d");
				if($date_banding >= $tanggal_sekarang){
					$date = $date->format("l, d F Y");
					echo "<br />";
					echo "<center><h4>".$date."</h4></center>";
				$sql2="SELECT date, jadwalId, userId, time , endTime, status FROM jadwal WHERE userId='$userId' AND date='$dateArray' ORDER BY jadwalId ASC";
				$result2=mysqli_query($conn,$sql2);
				while($row2 = mysqli_fetch_assoc($result2)) {
					$time[] = $row2['time'];
				}
				
					foreach($result2 AS $result){
					/*while($row = mysqli_fetch_assoc($result)) {
						if($dateArray = $row['date']){
							$jadwalId = $row['jadwalId'];
							$date = $row['date'];
							$time = $row['time'];
							$timeEnd = $row['endTime'];
							$status = $row['status'];*/
							if($result['status'] != 'free'){
		?>
					
					<label>
						<input type="radio" name="time" value="<?php echo $result['time']//$startTime->format('H:i'); ?>" disabled="disabled">
						<img src="http://placehold.it/100x50/A9A9A9/fff&text=<?php echo $result['time']//$startTime->format('H:i');?>">
					</label>
					<?php } else { ?>
					<input type="hidden" name="jadwalId" value="<?php echo $result['jadwalId']; ?>">
					<input type="hidden" name="userId" value="<?php echo $result['userId']; ?>">
					<input type="hidden" name="day" value="<?php echo $date; ?>">
					<label>
						<input type="radio" name="time" value="<?php echo $result['time']//$startTime->format('H:i'); ?>" checked>
						<img src="http://placehold.it/100x50/FFA500/fff&text=<?php echo $result['time']//$startTime->format('H:i'); ?>">
					</label>
					<?php
					//}
					//$startTime->sub(new DateInterval('PT30M'));// substract 30 minutes
					//$startTime->add(new DateInterval('PT30M'));// adds 30 minutes
						//}
					}
				}
			}
		}
		?>
		
		<input type="submit" name="submit" value="Next" />
	</form>
	</div>
	</body>
	<script type="text/javascript" src="validasi.js"></script>
</html>
<?php } ?> 
