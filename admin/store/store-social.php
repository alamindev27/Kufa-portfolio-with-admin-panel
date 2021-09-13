<?php session_start();
	require_once '../../db.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$link = mysqli_real_escape_string($conn, $_POST['link']);
		$icon = $_POST['icon'];
		$insert = "INSERT INTO social (link, icon) VALUES ('$link', '$icon')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Adding a social icon successfull.';
			header('location:../add-social.php');
		}else{
			$_SESSION['errors'] = 'Adding Faield.';
			header('location:../add-social.php');
		}
	}else{
		header('location:../add-social.php');
	}
 ?>