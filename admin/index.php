<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewports" content="width=device-width intial-scale=1">
		<title>Appointment System</title>
		<style type="text/css">
			input[type=text], select , input[type=email], input[type=password] {
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
	<img src="../asset/Logo-Panorama.png" width='400px' height='100px'>
	</div>
	<div>
	<center><h3>Welcome to PDES Appointment System</h3></center>
	<form action="controllers/proses_login.php" method="POST" name="validasi_form_login" onsubmit="return validasi_input_login(this)">
		<label for="username">Username</label><input type="text" id="username" name="username" placeholder="input your username" />
		<label for="password">Password</label><input type="password" id="password" name="password" placeholder="input your password" />
		</br></br>
		<label for="pesan">
			<?php
				if(isset($_GET['pesan'])){
					if($_GET['pesan'] == "gagal"){
						echo "Login Failed!<br /> Username and Password not match !";
					}else if($_GET['pesan'] == "logout"){
						echo "You succeed to Logout !";
					}else if($_GET['pesan'] == "belum_login"){
						echo "You must login to Access Admin Pages !";
					}
				}
			?>
		</label>
		<br /><br />
		<input type="submit" name="submit" value="Login" />
	</form>
	</div>
	</body>
	<script type="text/javascript" src="../validasi.js"></script>
</html>