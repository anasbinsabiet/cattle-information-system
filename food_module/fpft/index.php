<?php
$connect = "";
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
include_once "../../dashboard/info_store/function.php";
?>

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Food Place Food Tracking</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item active">Food Place Food Tracking</li>
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
            <h3 class="card-title">Food Place Food Tracking List</h3>
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
            <th>Date</th>
            <th>Time</th>
            <th>Chari</th>
            <th>Formula</th>
            <th>Total Food Amount</th>
            <th>Total Wastage</th>
            <th>Farm</th>
            <th>Remarks</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $query = $connect->prepare("SELECT * FROM `fpft` WHERE delete_status = 0");

          $query->execute();

          $result = $query->fetchAll();

          foreach ($result as $row) {

            ?>
            <tr>
              <td><?php echo $row['fpft_id']; ?></td>
              <td><?php if(!empty($row['select_date'])){ echo date("d-F-Y", strtotime($row['select_date'])); } ?></td>
              <td><?php echo date('g:i A', strtotime($row['time'])); ?></td>
              <td><?php echo get_chari_code($connect, $row['chari_no']) ?></td>
              <td><?php echo get_food_formula($connect, $row['feeding_formula_no']); ?></td>
              <td><?php echo $row['total_food_amount']; ?></td>
              <td><?php echo $row['total_wastage']; ?></td>
              <td><?php echo get_farm_name($connect, $row['farm_id']) ?></td>
              <td><?php echo $row['remarks']; ?></td>
              <td><a
                  href="add.php?id=<?php echo((((($row['fpft_id'] + 9954) * 777) / 100) * 2) * 1971); ?>">
                  <button class="badge badge-success btn-sm">Edit</button>
                </a>
                <button type="button" name="delete" id="<?php echo $row["fpft_id"] ?>"
                        class="badge badge-danger  btn-sm delete"
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
  $(function () {
    // $("#example1").DataTable({
    //   "responsive": false,
    //   "autoWidth": false,
    // });
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
    });
  });


  $(document).on('click', '.delete', function () {
    var fpft_id = $(this).attr('id');
    var status = $(this).data("status");
    var btn_action = 'delete';
    if (confirm("Are you sure you want to Delete?")) {
      $.ajax({
        url: "action.php",
        method: "POST",
        data: {fpft_id: fpft_id, status: status, btn_action: btn_action},
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
