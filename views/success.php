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
			}
			input[type=submit]:hover {
				background-color: #45a049;
			}
			div {
				border-radius: 5px;
				background-color: #f2f2f2;
				padding: 20px;
			}
		</style>
	</head>
	<body>
	<div>
	<img src="../asset/Logo-Panorama.png" width='400px' height='100px'>
	</div>
	<div>
	<center><h3>Hai there! <?php echo $_GET['company_name']; ?> <br />Thank you for using our services.<br />Please wait we will redirecting back to our main website.</h3></center>
	<?php header("refresh:5;url=../index.php"); ?>
	</div>
	</body>
	<script type="text/javascript" src="validasi.js"></script>
</html>