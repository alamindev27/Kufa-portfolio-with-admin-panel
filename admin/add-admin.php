<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="add-admin.php" class="h1"><b>F.M.A</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg text-uppercase font-weight-bold">Register a new Admin</p>

      <form action="store/store-admin.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="name" value="<?php if(isset($_SESSION['namevalue'])) echo $_SESSION['namevalue'] ?? "" ?>" class="form-control" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user a"></span>
            </div>
          </div>
        </div>
        <?php if (isset($_SESSION['name'])) { ?>
        <style type="text/css"> .a{ color: red; } </style>
        <?php unset($_SESSION['name']); } ?>
        <div class="input-group mb-3">
          <input type="text" value="<?php if(isset($_SESSION['emailvalue'])) echo $_SESSION['emailvalue'] ?? "" ?>" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope b"></span>
              	<?php if (isset($_SESSION['email'])) { ?>
		        	<style type="text/css"> .b{ color: red; } </style>
		        <?php unset($_SESSION['email']); } ?>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" value="<?php if(isset($_SESSION['passwordvalue'])) echo $_SESSION['passwordvalue'] ?? "" ?>" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock c"></span>
              <?php if (isset($_SESSION['password'])) { ?>
		        <style type="text/css"> .c{ color: red; } </style>
		       <?php unset($_SESSION['password']); } ?>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" value="<?php if(isset($_SESSION['conpassvalue'])) echo $_SESSION['conpassvalue'] ?? "" ?>" name="conpass" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock d"></span>
              <?php if (isset($_SESSION['conpass'])) { ?>
		        <style type="text/css"> .d{ color: red; } </style>
		       <?php unset($_SESSION['conpass']); } ?>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="phone" value="<?php if(isset($_SESSION['phonevalue'])) echo $_SESSION['phonevalue'] ?? "" ?>" class="form-control" placeholder="Enter phone">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone e"></span>
              <?php if (isset($_SESSION['phone'])) { ?>
		        <style type="text/css"> .e{ color: red; } </style>
		       <?php unset($_SESSION['phone']); } ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
          <br><br>
			<?php
				if (isset($_SESSION['success'])) { ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Successfull!</strong> Adding a new admin has been successful
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>

					<?php
					unset($_SESSION['success']);
				}
			?>
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->


<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>
