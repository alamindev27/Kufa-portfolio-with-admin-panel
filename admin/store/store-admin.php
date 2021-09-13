<?php
	require_once '../../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$conpass = $_POST['conpass'];
		$phone = $_POST['phone'];
		$_SESSION['namevalue'] = $name;
		$_SESSION['emailvalue'] = $email;
		$_SESSION['passwordvalue'] = $password;
		$_SESSION['conpassvalue'] = $conpass;
		$_SESSION['phonevalue'] = $phone;
		if (empty($name)) {
			$_SESSION['name'] = 'error';
			header('location:../add-admin.php');
		}else if (empty($email)) {
			$_SESSION['email'] = 'error';
			header('location:../add-admin.php');
		}else if (empty($password)) {
			$_SESSION['password'] = 'error';
			header('location:../add-admin.php');
		}else if (empty($conpass)) {
			$_SESSION['conpass'] = 'error';
			header('location:../add-admin.php');
		}else if (empty($phone)) {
			$_SESSION['phone'] = 'error';
			header('location:../add-admin.php');
		}else{
			if (!preg_match('/^[A-Za-z ]+$/', $name)) {
				$_SESSION['name'] = "error";
				header('location:../add-admin.php');
			}else{
				$pattern1 = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
                if(!preg_match($pattern1, $email)){
                	$_SESSION['email'] = "error";
                    header('location:../add-admin.php');
                }else{
                	if (!preg_match('/^[0-9]+$/', $phone)) {
						$_SESSION['phone'] = "error";
						header('location:../add-admin.php');
					}else{
						if (strlen($name) < 2) {
							$_SESSION['name'] = "error";
							header('location:../add-admin.php');
						}else{
							if (strlen($password) < 6) {
								$_SESSION['password'] = "error";
								header('location:../add-admin.php');
							}else{
								if ($password != $conpass) {
									$_SESSION['conpass'] = "error";
									$_SESSION['password'] = "error";
									header('location:../add-admin.php');
								}else{
									$scount = "SELECT COUNT(*) as total FROM admin WHERE email = '$email'";
								    $sq = mysqli_query($conn, $scount);
								    $assoc = mysqli_fetch_assoc($sq);
								    if ($assoc['total']  > 0) {
								  	  $_SESSION['email'] = "error";
									  header('location:../add-admin.php');
								    }else{
								    	$encript = password_hash($password, PASSWORD_DEFAULT);
										 $sql = "INSERT INTO admin(name, email, password, phone) VALUES ('$name', '$email', '$encript', '$phone')";
										if ( mysqli_query($conn, $sql)) {
 										  	$_SESSION['success'] = "success";
											header('location:../add-admin.php');
									  	}else{
									  		$_SESSION['errors'] = "errors";
											header('location:../add-admin.php');
									  	}	
								    }
								}
							}
						}
					}
                }
			}
		}
	}else{
		header('location:../index.php');
	}
?>