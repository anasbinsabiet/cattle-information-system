<?php
$connect = "";
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
include_once "../../dashboard/info_store/function.php";
?>

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">Stock In Medicine Inventory</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item active">Stock In Medicine Inventory</li>
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
            <h3 class="card-title">Stock In Medicine Inventory List</h3>
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
            <th>Supplier</th>
            <th>Storage / Fridge / Location</th>
            <th>Farm</th>
            <th>Remarks</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $query = $connect->prepare("SELECT * FROM `stock_in_med` WHERE delete_status = 0");

          $query->execute();

          $result = $query->fetchAll();

          foreach ($result as $row) {
            if ($row['storage_fridge_location'] == 1) {
                $storage_fridge_location = "Storage";
            } else if ($row['storage_fridge_location'] == 2) {
                $storage_fridge_location = "Fridge";
            }else {
                $storage_fridge_location = "Location";
            }


            ?>
            <tr>
              <td><?php echo $row['stock_in_med_id']; ?></td>
              <!--              <td><img src="--><?php //echo $row['stock_in_med_pic']; ?><!--" width='70px'></td>-->
              <td><?php echo $row['sim_date']; ?></td>
              <td><?php echo get_supplier_name($connect, $row['med_supplier']) ?></td>
              <td><?php echo $storage_fridge_location; ?></td>
              <td><?php echo get_farm_name($connect, $row['farm_id']) ?></td>
              <td><?php echo $row['remarks']; ?></td>
              <td><a
                  href="add.php?id=<?php echo((((($row['stock_in_med_id'] + 9954) * 777) / 100) * 2) * 1971); ?>">
                  <button class="badge badge-success btn-sm">Edit</button>
                </a>
                <button type="button" name="delete" id="<?php echo $row["stock_in_med_id"] ?>"
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
    var stock_in_med_id = $(this).attr('id');
    var status = $(this).data("status");
    var btn_action = 'delete';
    if (confirm("Are you sure you want to Delete?")) {
      $.ajax({
        url: "action.php",
        method: "POST",
        data: {stock_in_med_id: stock_in_med_id, status: status, btn_action: btn_action},
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
