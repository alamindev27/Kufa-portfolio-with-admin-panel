<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $id = $_GET['id'];
  $select = "SELECT * FROM services WHERE id = $id";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);
?>
 
<div class="card card-primary" style="width:500px;margin: 0 auto;">
  <div class="card-header">
    <h3 class="card-title text-uppercase">edit service</h3>
  </div>
  <form action="update-services.php" method="post">
    <div class="card-body">
      <div class="form-group">
        <label">Title</label>
        <input type="text" class="form-control" name="title" placeholder="enter title" required value="<?= $assoc['title'] ?>">
        <input type="hidden" value="<?php echo $id ?>" name="id">
      </div>
      <div class="form-group">
        <label">Description</label>
        <textarea class="form-control" name="description" rows="3" required placeholder="enter  description"><?= $assoc['description'] ?></textarea>
      </div>
      <div class="form-group">
        <label">Icon</label>
          <select class="form-control" name="icon" required>
              <option value>Select Icon</option>
              <option value="fab fa-react">React</option>
              <option value="fab fa-free-code-camp">free code camp</option>
              <option value="fa fa-desktop">Desktop</option>
              <option value="fa fa-exclamation-triangle">Error</option>
              <option value="fa fa-search">Search</option>
              <option value="fa fa-envelope-open">Envelope open</option>
              <option value="fa fa-graduation-cap">Graduation</option>
              <option value="fab fa-wordpress">Wordpress</option>
              <option value="fas fa-file-code">File</option>
              <option value="fab fa-elementor">Elementor</option>
              <option value="fab fa-dev">Development</option>
              <option value="fab fa-youtube">Youtube</option>
              <option value="fas fa-recycle">Recycle</option>
            </select>
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
      <button type="submit" class="btn btn-primary">Add Intro</button>
    </div>
  </form>
</div>









  <?php require_once 'inc/footer.php' ?>