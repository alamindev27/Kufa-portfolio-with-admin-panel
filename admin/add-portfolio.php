<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
?>
<div class="row">
  <div class="col-md-6">
    <div class="card card-info">
      <div class="card-header">
      <h3 class="card-title text-uppercase">Add Category</h3>
      </div>
      <form action="store/store-category.php" method="post">
        <div class="card-body">
          <div class="form-group">
            <label>Create Category Name</label>
            <input type="text" class="form-control" name="c_name" placeholder="Enter Category name" required>
          </div>
        </div>
        <?php
        if (isset($_SESSION['successCategory'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $_SESSION['successCategory'] ?>!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <?php
        unset($_SESSION['successCategory']);
        }
        ?>
        <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary">Create Category</button>
        </div>
      </form>
    </div>
  </div>


 <div class="col-md-6">
   <div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title text-uppercase">Add Portfolio</h3>
  </div>
  <form action="store/store-portfolio.php" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
        <label">Title</label>
        <input id="title" type="text" class="form-control" name="title" placeholder="Enter title" required>
      </div>
          <div class="form-group">
            <label>Sluge</label>
            <input id="sluge" type="text" class="form-control" name="sluge" placeholder="Sluge" required>
          </div>
      <div class="form-group">
        <label">Description</label>
        <textarea type="text" class="form-control" name="description" placeholder="Enter description" required rows="4"></textarea>
      </div>
      <div class="form-group">
        <label>Thumbnails</label>
        <input class="form-control" type="file" name="thumbnails" required>
      </div>
      <div class="form-group">
        <label>Featured</label>
        <input class="form-control" type="file" name="featured" required>
      </div>
      <div class="form-group">
        <?php 
        $select = "SELECT * FROM category ORDER BY c_name ASC";
        $query = mysqli_query($conn, $select);
         ?>
        <label>Featured</label>
        <select class="form-control" name="c_id" required>
          <option value>Select Category</option>
          <?php foreach ($query as $key => $category): ?>
          <option value="<?= $category['id'] ?>"><?= $category['c_name'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
      <?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> Adding a new intro successful
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            }
            
        if (isset($_SESSION['successPortfolio'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['successPortfolio'] ?></strong> 
        <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
        unset($_SESSION['successPortfolio']);
        }
          ?>
    <div class="card-footer text-center">
      <button type="submit" class="btn btn-primary">Add Portfolio</button>
    </div>
  </form>
</div>
 </div>
 </div>
  <?php require_once 'inc/footer.php' ?>