<?php
$connect = '';
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
include_once "../../dashboard/info_store/function.php";
?>

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Cattle Task</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item active">Cattle Task</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-11">
            <h3 class="card-title">Cattle Task List</h3>
          </div>
          <div class="col-lg-1">
            <a href="add.php">
              <button class="btn btn-sm btn-success"><b>Add</b> <i class="fas fa-plus"></i></button>
            </a>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Cattle Code</th>
            <th>Date</th>
            <th>Type</th>
            <th>Name</th>
            <th>Description</th>
            <th>Assigned Person</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $query = $connect->prepare("SELECT * FROM `cattle_task` WHERE delete_status = 0");

          $query->execute();

          $result = $query->fetchAll();

          foreach ($result as $row) {
                                    
            ?>
            <tr>
              <td><?php echo $row['cattle_task_id']; ?></td>
              <td><img src="<?php echo $row['cattle_task_pic']; ?>" width='70px'></td>
              <td><?php echo get_cattle_code($connect, $row['cattle_code']); ?></td>
              <td><?php if(!empty($row['task_date'])){ echo date("d-F-Y", strtotime($row['task_date'])); } ?></td>
              <td><?php echo get_task_type_name($connect, $row['task_type']) ; ?></td>
              <td><?php echo $row['task_title']; ?></td>
              <td><?php echo $row['task_description']; ?></td>
              <td><?php echo get_employee_name($connect, $row['assigned_person']); ?></td>
              <td><?php echo get_task_status_name($connect, $row['task_status']) ; ?></td>
              <td><a href="add.php?id=<?php echo((((($row['cattle_task_id'] + 9954) * 777) / 100) * 2) * 1971); ?>">
                  <button class="badge badge-success btn-sm">Edit</button>
                </a>
                  <button type="button" name="delete" id="<?php echo $row["cattle_task_id"] ?>"
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
      <!-- /.card-body -->
    </div>
    <!-- /.row -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<!--//////////////// DATATABLES-->

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
                var cattle_task_id = $(this).attr('id');
                var status = $(this).data("status");
                var btn_action = 'delete';
                if (confirm("Are you sure you want to Delete?")) {
                    $.ajax({
                        url: "action.php",
                        method: "POST",
                        data: {cattle_task_id: cattle_task_id, status: status, btn_action: btn_action},
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
