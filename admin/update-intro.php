<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
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
	 			header('location:edit-intro.php?id='.$id);
	 		}else{
	 			$selecImg = "SELECT * FROM hero";
				$sQuery = mysqli_query($conn, $selecImg);
				$ImgAssoc = mysqli_fetch_assoc($sQuery);
	 			if (file_exists('intro/'.$ImgAssoc['image'])) {
	 				unlink('intro/'.$ImgAssoc['image']);
	 			}
	 			
	 			$img_name = strtolower(str_replace(' ', '-', $name));
	 			$image_name = rand(000,99999).$img_name.'.'.$extention;
	 			$uploadFolder = 'intro/'.$image_name;
	 			move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
	 			$selectcount = "SELECT COUNT(*) as total FROM hero";
				$selectQuery = mysqli_query($conn, $selectcount);
				$selectAssoc = mysqli_fetch_assoc($selectQuery);
				if ($selectAssoc['total'] < 0) {
					$_SESSION['errors'] = 'Already addet a intro';
					header('location:edit-intro.php?id='.$id);
				}else{
					$update = "UPDATE hero SET intro = '$intro', name = '$name', sort_description = '$description', image = '$image_name' WHERE id = $id";
					$query = mysqli_query($conn, $update);
					if ($query) {
						$_SESSION['success'] = 'success';
						header('location:edit-intro.php?id='.$id);
					}else{
						$_SESSION['errors'] = 'update faield';
						header('location:edit-intro.php?id='.$id);
					}
				}
			}
		}
	}

 ?>