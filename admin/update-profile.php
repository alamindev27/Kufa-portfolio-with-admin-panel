<?php 
	session_start();
	require_once '../db.php';
		$adminid = $_SESSION['adminid'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$education = mysqli_real_escape_string($conn, $_POST['education']);
		$location = mysqli_real_escape_string($conn, $_POST['location']);
		$skill = mysqli_real_escape_string($conn, $_POST['skill']);
		$image = $_FILES['image']['name'];
		$arr = explode('.', $image);
	 	$extention = end($arr);
	 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];

		if (empty($name)) {
			$_SESSION['name'] = 'Name is required.';
			header('location:profile-view.php');
		}else{
			if (in_array($extention, $format)) {
				if ($_FILES['image']['size'] > 9000000) {
					echo "file size to big";
				}else{
					$img_name = strtolower(str_replace(' ', '-', $name));
	 				$image_name = $adminid.'.'.$img_name.'.'.$extention;
	 				$scount = "SELECT * FROM admin WHERE id = $adminid";
				    $sq = mysqli_query($conn, $scount);
				    $assoc = mysqli_fetch_assoc($sq);
				    if (file_exists('profile/'.$assoc['image'])) {
			    	unlink('profile/'.$assoc['image']);
			    	}
			    	$uploadFolder = 'profile/'.$image_name;
	 				move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
	 				$update = "UPDATE admin SET name = '$name', phone = '$phone', image = '$image_name', title = '$title', education = '$education', location = '$location', skill = '$skill' WHERE id = $adminid ";
	 				$uq = mysqli_query($conn, $update);
	 				if ($uq) {
	 					$_SESSION['success'] = 'success';
	 					header('location:profile-view.php');
	 				}else{
	 					echo "hoy nai";
	 				}
				}
			}else{
				echo "formate not allow";
			}
		}
	}else{
		header('location:index.php');
	}
 ?>