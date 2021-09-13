<?php 
  require_once 'inc/header.php'; 
	require_once '../db.php';
	$id = $_GET['id'];
  $select = "SELECT * FROM education WHERE id = $id";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);

 ?>

 <div class="card card-primary" style="width:500px;margin: 0 auto;">
  <div class="card-header">
    <h3 class="card-title text-uppercase">edit education</h3>
  </div>
  <form action="update-education.php" method="post">
    <div class="card-body">
      <div class="form-group">
        <label">Title</label>
        <input type="text" class="form-control" name="heading" placeholder="enter heading" required value="<?= $assoc['title'] ?>">
        <input type="hidden" value="<?= $id ?>" name="id">
      </div>
      <div class="form-group">
        <label">Year</label>
        <input type="number" name="year" placeholder="Enter Year" class="form-control" value="<?= $assoc['year'] ?>" required>
      </div> 
      <div class="form-group">
        <label">Progress</label>
        <input type="number" name="progress" min="1" max="100" placeholder="Enter Year" class="form-control" value="<?= $assoc['progress'] ?>" required>
      </div> 
    </div>
      <?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> <?= $_SESSION['success'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            }
            if (isset($_SESSION['errors'])) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Opps! </strong> <?= $_SESSION['errors'] ?>
                <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php
              unset($_SESSION['errors']);
            }
          ?>
    <div class="card-footer text-center">
      <button type="submit" class="btn btn-primary">Add Education</button>
    </div>
  </form>
</div>
<?php 

  require_once 'inc/footer.php'; 
 ?>