<?php
	include("../../config/connection.php");
	$conn = opencon();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "UPDATE user SET password='$password' WHERE username='$username'";
	if(mysqli_query($conn, $sql)){
		header("location:../form-admin.php?pesan=success pass");
	} else{
		header("location:../form-admin.php?pesan=gagal pass");
	}
?>