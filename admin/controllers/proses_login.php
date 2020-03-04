<?php
	session_start();
	include("../../config/connection.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$conn = opencon();
	
	$sql="SELECT userId, username, namaUser, email FROM user WHERE username='$username' and password='$password'";
	$result=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	
	if(mysqli_num_rows($result) == 1){
		$_SESSION['userId'] = $row['userId'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['namaUser'] = $row['namaUser'];
		$_SESSION['status'] = "login";
		header("location:../form-admin.php");
	}else{
		header("location:../index.php?pesan=gagal");
	}
?>