<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $select = "SELECT * FROM portfolios INNER JOIN category ON portfolios.category_id = category.id";
  $query = mysqli_query($conn, $select);
?>
<?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> Delete Successfull.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            } ?>

<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title">View Portfolio</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    SL
                </th>
                <th style="width: 10%">
                    Title
                </th>
                <th style="width: 10%">
                    Category
                </th>
                <th style="width: 70%">
                    Description
                </th>
                <th class="text-center" style="width: 10%">
                    Thumbnails
                </th>
                <th class="text-center" style="width: 10%">
                    Featured
                </th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $key => $portfolio): ?>
             <tr>
                <td>
                    0<?= ++$key ?>
                </td>
                <td class="text-uppercase">
                  <?php if (isset($portfolio['title'])) {
                    echo $portfolio['title'];
                  }  ?>
                    <br>
                </td>
                <td class="text-capitalize">
                  <?= $portfolio['c_name'] ?>
                </td>
                <td class="text-capitalize">
                    <?php if (isset($portfolio['description'])) {
                    echo $portfolio['description'];
                  }  ?>
                </td>
                <td class="text-center">
                    <img style="width: 70px;" src="thumbnails/<?= $portfolio['thumbnails'] ?>">
                </td>
                <td class="text-center">
                    <img style="width: 70px;" src="featured/<?= $portfolio['featurd'] ?>">
                </td>
                
                <?php 
                  if (isset($portfolio['title'])) { ?>
                    <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="edit-portfolio.php?id=<?= $portfolio['id'] ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="delete-portfolio.php?id=<?= $portfolio['id'] ?>">
                        <i class="fa fa-ban">
                        </i>
                        Delete
                    </a>
                </td>
                    <?php
                  }
                 ?>
            </tr>   
            <?php endforeach ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>







    
  <?php require_once 'inc/footer.php' ?>