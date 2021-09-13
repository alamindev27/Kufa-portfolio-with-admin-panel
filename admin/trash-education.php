<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $select = "SELECT * FROM education WHERE status = 2 ORDER BY year DESC";
  $query = mysqli_query($conn, $select);
?>
<?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> <?php echo $_SESSION['success'] ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            } ?>

<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title">trash Education</h3>

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
                <th style="width: 30%">
                    Title
                </th>
                <th style="width: 10%">
                    Year
                </th>
                <th style="width: 20%">
                    Progress
                </th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $key => $education): ?>
             <tr>
                <td>
                    0<?= ++$key ?>
                </td>
                <td class="text-uppercase">
                  <?php if (isset($education['title'])) {
                    echo $education['title'];
                  }  ?>
                    <br>
                </td>
                <td class="text-uppercase">
                    <?php if (isset($education['year'])) {
                    echo $education['year'];
                  }  ?>
                </td>
                <td class="text-capitalize">
                    <?php if (isset($education['progress'])) {
                    echo $education['progress'].' %';
                  }  ?>
                </td>
                
                <?php 
                  if (isset($education['progress'])) { ?>
                    <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="restore-education.php?id=<?= $education['id'] ?>">
                        <i class="fa fa-undo">
                        </i>
                        Restore
                    </a>
                    <a class="btn btn-danger btn-sm" href="permanent-delete-education.php?id=<?= $education['id'] ?>">
                        <i class="fas fa-trash">
                        </i>
                        Delete Permanent
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