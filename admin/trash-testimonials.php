<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $select = "SELECT * FROM Testimonials WHERE status = 2";
  $query = mysqli_query($conn, $select);
  $selectcount = "SELECT COUNT(*) as total FROM Testimonials WHERE status = 2";
  $selectQuery = mysqli_query($conn, $selectcount);
  $assoc = mysqli_fetch_assoc($selectQuery);
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
    <h3 class="card-title">View Testimonials <?php if($assoc['total'] == 0 ){
        echo ''; }else{echo '('.$assoc['total'].')'; } ?></h3>

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
                    Name
                </th>
                <th style="width: 15%">
                    Title
                </th>
                <th style="width: 50%">
                    Description
                </th>
                <th style="width: 10%" class="text-center">
                    Image
                </th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $key => $testimonials): ?>
             <tr>
                <td>
                    0<?= ++$key ?>
                </td>
                <td class="text-uppercase">
                    <?= $testimonials['name'] ?>
                </td>
                <td class="text-uppercase">
                  <?php if (isset($testimonials['title'])) {
                    echo $testimonials['title'];
                  }  ?>
                    <br>
                </td>
                <td class="text-capitalize">
                    <?php if (isset($testimonials['description'])) {
                    echo $testimonials['description'];
                  }  ?>
                </td>
                <td class="text-center" style="font-size:30px; color: #8cc090; background: #ddd;">
                    <img style=" width: 80px;height: 80px; border: 2px solid #aaa; border-radius: 50%;" src="testimonial/<?= $testimonials['image'] ?>">
                </td>
                
                <?php 
                  if (isset($testimonials['title'])) { ?>
                    <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="restore-testimonials.php?id=<?= $testimonials['id'] ?>">
                        <i class="fa fa-undo">
                        </i>
                        Restore
                    </a>
                    <a class="btn btn-danger btn-sm" href="delete-permanent-testimonials.php?id=<?= $testimonials['id'] ?>">
                        <i class="fa fa-trash">
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