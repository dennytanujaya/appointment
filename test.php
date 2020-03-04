<?php

	include('config/connection.php');
	$conn = opencon();
	date_default_timezone_set('Asia/Jakarta');
	$waktuSekarang = date("Y-m-d");
	$tanggal_sekarang = date('Y-m-d');
	$userId = '1';
	
	$sql1="SELECT date FROM jadwal WHERE userId=$userId GROUP BY date ORDER BY jadwalId ASC";
	$result1=mysqli_query($conn,$sql1);
	while($row1 = mysqli_fetch_assoc($result1)) {
		$date[] = $row1['date'];
		$totalDate = count($date);
	}
	
	$sql2="SELECT time FROM jadwal WHERE userId=$userId ORDER BY jadwalId ASC";
	$result2=mysqli_query($conn,$sql2);
	while($row2 = mysqli_fetch_assoc($result2)) {
		$time[] = $row2['time'];
		$totalTime = count($time);
	}
	
	foreach($date AS $dateArray){
		echo $dateArray.'<br />';
	}
		echo $totalTime."<br />";
		echo "Array 0: ".$date[0]."<br />Array 1: ".$date[1]."<br /><br />";
		$sql="SELECT date, jadwalId, userId, time , endTime, status FROM jadwal WHERE userId=$userId ORDER BY jadwalId ASC";
		$result=mysqli_query($conn,$sql);
		
		for($k=0;$k<$totalDate;$k++){
			echo 'Echo K: '.$date[$k].'<br />';
			echo "For K: ".$date[$k]."<br />";
			$dateArray = $date[$k];
			echo 'Date Array: '.$dateArray.'<br />';
			
			for($j=0; $j<$totalTime; $j++){
				while($row = mysqli_fetch_assoc($result)) {
					if($dateArray != $row['date']){
						break;
					}else{
						$jadwalId = $row['jadwalId'];
						$date = $row['date'];
						$time = $row['time'];
						$timeEnd = $row['endTime'];
						$status = $row['status'];
						echo $date."&nbsp;&nbsp;".$time."&nbsp;&nbsp;".$status."&nbsp;&nbsp;".$jadwalId."<br />";
					}
				}
			}
		}
		/*
		for($i=0;$i<$totalTime;$i++){
		echo $date[$i].'&nbsp';
			if($date[$i] = $row['date']){
				$jadwalId = $row['jadwalId'];
				$date = $row['date'];
				$timeEnd = $row['endTime'];
				$status = $row['status'];
				
				//echo $date."&nbsp;&nbsp;".$jadwalId."<br />";
			}
		}*/

?>