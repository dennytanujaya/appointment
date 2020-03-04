<?php 
	include("../../config/connection.php");
	$conn = opencon();
	
	date_default_timezone_set('Asia/Jakarta');
	$waktuSekarang = date("Y-m-d H:i");
	
	$userId = $_POST['userId'];
	$tanggal = $_POST['tanggal'];
	function ubahTanggal($tanggal){
		 $pisah = explode('/',$tanggal);
		 $array = array($pisah[2],$pisah[0],$pisah[1]);
		 $satukan = implode('-',$array);
		 return $satukan;
	}

	$date_jadwal = ubahTanggal($tanggal);
	$status = 'free';
	$timeStart = $_POST['start_time'];
	$insertTimeStart = $_POST['start_time'];
	$timeEnd = $_POST['end_time'];
	$startTime = DateTime::createFromFormat('H:i', $timeStart); // create today 10 o'clock
	$endTime = DateTime::createFromFormat('H:i', $timeEnd); // create today 10 o'clock
	
	/*
	$sql = "INSERT INTO jadwal (userId, date, time, startTime, endTime, status, dateCreated) VALUES ('".$userId."', '".$date_jadwal."', '".$insertTimeStart."', '".$timeStart."', '".$timeEnd."', '".$status."', '".$waktuSekarang."')";
	if(mysqli_query($conn, $sql)){
		header("location:../form-admin.php?pesan=success");
	} else{
		header("location:../form-admin.php?pesan=gagal");
	}
	$startTime = DateTime::createFromFormat('H:i', $timeStart); // create today 10 o'clock
	$endTime = DateTime::createFromFormat('H:i', $timeEnd); // create today 10 o'clock
	*/
	for($i = $startTime; $i <= $endTime; $i++){
		//$sql = "INSERT INTO jadwal (userId, date, time, status, dateCreated) VALUES ('".$userId."', '".$date_jadwal."', '".$timeStart."', '".$status."', '".$waktuSekarang."')";
		$sql = "INSERT INTO jadwal (userId, date, time, startTime, endTime, status, dateCreated) VALUES ('".$userId."', '".$date_jadwal."', '".$timeStart."', '".$insertTimeStart."', '".$timeEnd."', '".$status."', '".$waktuSekarang."')";
		$startTime->add(new DateInterval('PT15M'));// adds 30 minutes
		$timeStart = $startTime->format('H:i');
		if(mysqli_query($conn, $sql)){
			header("location:../form-admin.php?pesan=success");
		} else{
			header("location:../form-admin.php?pesan=gagal");
		}
	}
?>