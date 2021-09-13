<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {		
		foreach ($_POST['msg_id'] as $key => $id) {
			$update = "UPDATE message SET status = 2 WHERE id = $id";
			if (mysqli_query($conn, $update)) {
				$_SESSION['success'] = 'Message Delete Successfull';
				header('location:mail.php');	
			}			
		}
	}else{
		header('location:mail.php');
	}
?>