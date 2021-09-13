<?php 
    require_once 'inc/header.php'; 
	require_once '../db.php';
    require_once 'inc/mail-left-sidebar.php';
	$id = $_GET['mail'];
	$update = "UPDATE message SET notification = 'off' WHERE id = $id";
	
	if (!mysqli_query($conn, $update)) {
		header('location:mai.php');
	}else{
		$select = "SELECT * FROM message WHERE id = $id";
		$query = mysqli_query($conn, $select);
		$assoc = mysqli_fetch_assoc($query);
	}
 ?>
 

    </div>
  </div>
  <!-- /.col -->
  <div class="col-md-9">
     <?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['success'] ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            } ?>
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Inbox </h3>
        <div class="card-tools">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Search Mail">
            <div class="input-group-append">
              <div class="btn btn-primary">
                <i class="fas fa-search"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="mailbox-controls">
          <!-- Check all button -->
          <div class="p-5">
          	<h5><b>Date :</b> <?= $assoc['dat'] ?></h5>
          	<h5><b>Name :</b> <?= $assoc['name'] ?></h5>
          	<h5><b>Email :</b> <?= $assoc['email'] ?></h5>
          	<h5 class="mt-4"><?= $assoc['message'] ?></h5>
          </div>
        <!-- /.mail-box-messages -->
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
    
  <?php require_once 'inc/footer.php' ?>
