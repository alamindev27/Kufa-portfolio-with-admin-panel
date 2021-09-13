<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $select = "SELECT * FROM hero";
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
    <h3 class="card-title">View Intro</h3>

<!--     <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div> -->
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    SL
                </th>
                <th style="width: 15%">
                    Name
                </th>
                <th style="width: 15%">
                    Intro
                </th>
                <th style="width: 30%">
                    Description
                </th>
                <th style="width: 10%">
                    Image
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php if (isset($assoc['name'])): ?>
                      01
                    <?php endif ?>
                </td>
                <td class="text-uppercase">
                  <?php if (isset($assoc['name'])) {
                    echo $assoc['name'];
                  }  ?>
                    <br>
                </td>
                <td class="text-uppercase">
                    <?php if (isset($assoc['intro'])) {
                    echo $assoc['intro'];
                  }  ?>
                </td>
                <td class="text-capitalize">
                    <?php if (isset($assoc['sort_description'])) {
                    echo $assoc['sort_description'];
                  }  ?>
                </td>
                <td class="text-center">
                    <img src="intro/<?php echo $assoc['image'] ?>" style="width: 80px;"/>
                </td>
                
                <?php 
                  if (isset($assoc['name'])) { ?>
                    <td class="project-actions text-right">
                    <!-- <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a> -->
                    <a class="btn btn-info btn-sm" href="edit-intro.php?id=<?= $assoc['id'] ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="delete-intro.php?id=<?= $assoc['id'] ?>">
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