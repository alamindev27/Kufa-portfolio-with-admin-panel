<?php require_once '../../db.php';
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
		$s = mysqli_real_escape_string($conn, $_POST['sluge']);
		$sluge = strtolower(str_replace(' ', '-', $s));
		$insert = "INSERT INTO category (c_name, sluge) VALUES ('$c_name', '$sluge')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['successCategory'] = 'Adding a new category successfull.';
			header('location:../add-portfolio.php');
		}
	}else{
		header('location:../add-portfolio.php');
	}
?>