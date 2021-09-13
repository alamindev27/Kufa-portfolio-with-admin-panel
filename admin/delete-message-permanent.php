<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {		foreach ($_POST['msg_id'] as $key => $id) {
			$delete = "DELETE FROM message WHERE id = $id";
			if (mysqli_query($conn, $delete)) {
				$_SESSION['success'] = 'Message Delete Successfull';
				header('location:trash-messages.php');	
			}			
		}
	}else{
		header('location:trash-messages.php');
	}
?>