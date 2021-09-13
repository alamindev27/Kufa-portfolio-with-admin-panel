<?php 
	require_once '../../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$counter = $_POST['counter'];
		$icon = $_POST['icon'];
		$insert = "INSERT INTO counterup (title, counter, icon) VALUES ('$title', '$counter', '$icon')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Adding a new counterup successful';
			header('location:../add-counterup.php');
		}else{
			$_SESSION['errors'] = 'Adding counterup Faield.';
			header('location:../add-counterup.php');
		}
	}else{
		header('location:../add-counterup.php');
	} ?>