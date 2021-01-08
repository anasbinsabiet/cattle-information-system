<?php
$connect = '';
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
include_once "../../dashboard/info_store/function.php";
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Land Task</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item active"><a
          href="<?php echo $_SESSION['base_url'] . 'dashboard/index'; ?>">Dashboard</a></li>
      <li class="breadcrumb-item active">Land Task</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-11">
            <h3 class="card-title">Land Task List</h3>
          </div>
          <div class="col-lg-1">
            <a href="add.php">
              <button class="btn btn-sm btn-success"><b>Add</b> <i class="fas fa-plus"></i></button>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th> ID</th>
            <th> Name</th>
            <th> Code</th>
            <th> Date</th>
            <th> Work Type</th>
            <th> Labour Amount</th>
            <th> Task Description</th>
            <th> Assigned Person</th>
            <th> Action</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $query = $connect->prepare("SELECT * FROM `land_task` WHERE delete_status = 0");
          $query->execute();
          $result = $query->fetchAll();
          foreach ($result as $row) {                         
            ?>
            <tr>
              <td><?php echo $row['lt_id']; ?></td>
              <td><?php echo htmlspecialchars($row['lt_name']) ?></td>
              <td><?php echo get_land_code($connect, $row['lt_code']); ?></td>
              <td><?php echo htmlspecialchars($row['lt_date']) ?></td>
              <td><?php echo get_work_type_name($connect, $row['work_type']); ?></td>
              <td><?php echo htmlspecialchars($row['labour_amount']) ?></td>
              <td><?php echo htmlspecialchars($row['task_description']) ?></td>
              <td><?php echo htmlspecialchars($row['assigned_person']) ?></td>
              <td><a href="add.php?id=<?php echo((((($row['lt_id'] + 9954) * 777) / 100) * 2) * 1971); ?>">
                  <button class="badge badge-success btn-sm">Edit</button>
                </a>
                  <button type="button" name="delete" id="<?php echo $row["lt_id"] ?>"
                                                    class="badge badge-danger btn-sm delete"
                                                    data-status="<?php echo $row["delete_status"] ?>">Delete
                                            </button>
              </td>
            </tr>
            <?php
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div><!--/. container-fluid -->
</section>
<?php
include_once "../../dashboard/index/footer.php";
?>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
if(screen.width <= 768)
{
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
}
if(screen.width > 768)
{
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": false,
    });
  });
}
            $(document).on('click', '.delete', function () {
                var lt_id = $(this).attr('id');
                var status = $(this).data("status");
                var btn_action = 'delete';
                if (confirm("Are you sure you want to Delete?")) {
                    $.ajax({
                        url: "action.php",
                        method: "POST",
                        data: {lt_id: lt_id, status: status, btn_action: btn_action},
                        success: function (data) {
                            alert(data); 
                            location.reload();
                        }
                    })
                } else {
                    return false;
                }
            });
</script>
