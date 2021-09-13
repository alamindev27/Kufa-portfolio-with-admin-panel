<?php 
	require_once '../../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$intro = mysqli_real_escape_string($conn, $_POST['intro']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$image = $_FILES['image']['name'];
		$arr = explode('.', $image);
	 	$extention = end($arr);
	 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
	 	if (in_array($extention, $format)) {
	 		if ($_FILES['image']['size'] > 9000000) {
	 			$_SESSION['errors'] = 'Image to long';
	 			header('location:add-intro.php');
	 		}else{
	 			$img_name = strtolower(str_replace(' ', '-', $name));
	 			$image_name = rand(000,99999).$img_name.'.'.$extention;
	 			$uploadFolder = '../intro/'.$image_name;
	 			move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
	 			$selectcount = "SELECT COUNT(*) as total FROM hero";
				$selectQuery = mysqli_query($conn, $selectcount);
				$selectAssoc = mysqli_fetch_assoc($selectQuery);
				if ($selectAssoc['total'] > 0) {
					$_SESSION['errors'] = 'Already addet a intro';
					header('location:../add-intro.php');
				}else{
					
					$insert = "INSERT INTO hero (intro, name, sort_description , image) VALUES ('$intro', '$name', '$description', '$image_name') ";
					$query = mysqli_query($conn, $insert);
					if ($query) {
						$_SESSION['success'] = 'success';
						header('location:../add-intro.php');
					}else{
						$_SESSION['errors'] = 'Adding a new intro Faield.';
						header('location:../add-intro.php');
					}
				}
	 			
	 		}
	 	}	
	}else{
		header('location:../add-intro.php');
	}

 ?>