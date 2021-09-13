<?php 
  session_start(); 
  require_once '../db.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  	$email = $_POST['email'];
  	$password = $_POST['password'];
  	$_SESSION['emailvalues'] = $email;
  	$_SESSION['passwordvalues'] = $password;
  	if (empty($email)) {
  		$_SESSION['email'] = 'error';
  		header('location:index.php');
  	}else if (empty($password)) {
  		$_SESSION['password'] = 'error';
  		header('location:index.php');
  	}else{
  		$lcount = "SELECT COUNT(*) as total, id, email, password FROM admin WHERE email = '$email'";
	    $lq = mysqli_query($conn, $lcount);
	    $lassoc = mysqli_fetch_assoc($lq);
	    if ($lassoc['total'] == 1) {
	  	  $hash = $lassoc['password'];
	  	  if (password_verify($password, $hash)) {
	  	  	$_SESSION['loginSuccess'] = 'loginSuccess';
	  	  	$_SESSION['adminid'] = $lassoc['id'];
	  	  	header('location:dashboard.php');
	  	  }else{
	  	  	$_SESSION['password'] = 'error';
  			header('location:index.php');
	  	  }
	    }else{
	    	$_SESSION['email'] = 'error';
  			header('location:index.php');
	    }
  	}
  }else{
  	header('location:index.php');
  }
?>