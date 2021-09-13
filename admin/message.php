<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = mysqli_real_escape_string($conn, $_POST['message']);
		$insert = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Thanks for connecting us.';
			header('location:../index.php#contact');
		}else{
			$_SESSION['errors'] = 'Sorry!! Message Not Send.';
			header('location:../index.php#contact');
		}
	}else{
		header('location:../index.php#contact');
	}
 ?>