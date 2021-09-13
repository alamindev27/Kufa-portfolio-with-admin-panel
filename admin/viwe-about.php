<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $select = "SELECT * FROM about";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);
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
    <h3 class="card-title">View About</h3>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    SL
                </th>
                <th style="width: 20%">
                    Heading
                </th>
                <th style="width: 55%">
                    Description
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php if (isset($assoc['heading'])): ?>
                      01
                    <?php endif ?>
                </td>
                <td class="text-uppercase">
                    <?php if (isset($assoc['heading'])) {
                    echo $assoc['heading'];
                  }  ?>
                </td>
                <td class="text-capitalize">
                    <?php if (isset($assoc['description'])) {
                    echo $assoc['description'];
                  }  ?>
                </td>
                
                <?php 
                  if (isset($assoc['heading'])) { ?>
                    <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="edit-about.php?id=<?= $assoc['id'] ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="delete-about.php?id=<?= $assoc['id'] ?>">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                </td>
                    <?php
                  }
                 ?>
            </tr>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
  <?php require_once 'inc/footer.php' ?>