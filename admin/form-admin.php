<?php 
	session_start();
	if($_SESSION['userId']== ''){
		header("location:login.php?pesan=belum_login");
	}else{
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewports" content="width=device-width intial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link href="../asset/js/jquery-ui.css" rel="stylesheet" />
		<script src="../asset/js/external/jquery/jquery.js"></script>
		<script src="../asset/js/jquery-ui.js"></script>
		<script src="../asset/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="../asset/js/jquery-ui.theme.css">
		
		<title>Admin | Appointment System</title>
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
				background-color: #4CAF50;
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
				background-color: #45a049;
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
			table {
			  font-family: Arial, Helvetica, sans-serif;
			  color: #666;
			  text-shadow: 1px 1px 0px #fff;
			  background: #eaebec;
			  border: #ccc 1px solid;
			  font-family: Calibri;
			  font-size: 20px;
			}
			 
			table th {
			  padding: 15px 35px;
			  border-left:1px solid #e0e0e0;
			  border-bottom: 1px solid #e0e0e0;
			  background: #ededed;
			}
			 
			table th:first-child{  
			  border-left:none;  
			}
			 
			table tr {
			  text-align: center;
			  padding-left: 20px;
			}
			 
			table td:first-child {
			  text-align: left;
			  padding-left: 20px;
			  border-left: 0;
			}
			 
			table td {
			  padding: 15px 35px;
			  border-top: 1px solid #ffffff;
			  border-bottom: 1px solid #e0e0e0;
			  border-left: 1px solid #e0e0e0;
			  background: #fafafa;
			  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
			  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
			}
			 
			table tr:last-child td {
			  border-bottom: 0;
			}
			 
			table tr:last-child td:first-child {
			  -moz-border-radius-bottomleft: 3px;
			  -webkit-border-bottom-left-radius: 3px;
			  border-bottom-left-radius: 3px;
			}
			 
			table tr:last-child td:last-child {
			  -moz-border-radius-bottomright: 3px;
			  -webkit-border-bottom-right-radius: 3px;
			  border-bottom-right-radius: 3px;
			}
			 
			table tr:hover td {
			  background: #f2f2f2;
			  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
			  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
			}
		</style>
	</head>
	<body>
	<div>
	<a href='index.php'><img src="../asset/Logo-Panorama.png" width='400px' height='100px'></a><br />
	<a href='ubah_password.php'>Changes Password</a>
	</div>
	<center><h3>Howdy, <?php echo $_SESSION['namaUser']; ?><br /></h3></center>
	<div>
	<form action="controllers/proses_form_admin.php" method="POST" name="validasi_form_admin" onsubmit="return validasi_input_admin(this)">
		<input type="hidden" name="userId" value="<?php echo $_SESSION['userId'];?>"/>
		<label for="date">Date</label><input type="text" id="tanggal" name="tanggal" placeholder="Please pick your available date" />
		<label for="start_time">Start Time ( 00: 00 )</label><input type="text" id="start_time" name="start_time" placeholder="Please input your available time" />
		<label for="end_time">End Time ( 00:00 )</label><input type="text" id="end_time" name="end_time" placeholder="Please input your end time" />
		<input type="submit" name="submit" value="submit" />
	</form>
	<label for="pesan">
		<?php
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "gagal"){
					echo "Failed input your schedule ! ";
				}else if($_GET['pesan'] == "success"){
					echo "Success input your schedule !";
				}else if($_GET['pesan'] == "success pass"){
					echo "Success changes your password !";
				}else if($_GET['pesan'] == "success"){
					echo "Success changes your password !";
				}
			}
		?>
	</label>
	</div>
	<div>
		<table align="center">
			<thead>
				<tr>
					<th>Company Name / Agent Name</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>Contact Number</th>
					<th>Date</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include("../config/connection.php");
					$conn = opencon();
					$tanggal_sekarang = date('Y-m-d');
					$userId = $_SESSION['userId'];
					$sql="SELECT * FROM jadwal WHERE date >= '$tanggal_sekarang' AND userId = '$userId' AND status = 'booked' ORDER BY date ASC";
					$result=mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($result)) {
				?>		<tr>
							<td><?php echo $row['companyName']; ?></td>
							<td><?php echo $row['firstName']; ?></td>
							<td><?php echo $row['lastName']; ?></td>
							<td><?php echo $row['emailAddress']; ?></td>
							<td><?php echo $row['contactNumber']; ?></td>
							<td><?php echo $row['date']; ?></td>
							<td><?php echo $row['time'];?></td>
						</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	</body>
	<script type="text/javascript" src="../validasi.js"></script>
	<script>
		$(document).ready(function(){
				$("#tanggal").datepicker({
			})
		})
	</script>
</html>
<?php } ?>