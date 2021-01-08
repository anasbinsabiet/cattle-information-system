<?php
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
include_once "../../dashboard/info_store/function.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Land Task Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Land Task</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Land Task Add</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="alert" role="alert" id="alert_action" style="display: none;"></div>
        <form role="form" method="POST" id="land_task" class="land_task">
          <input type="hidden" id="lt_id" name="lt_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="lt_name">Land Task <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="lt_name" name="lt_name" placeholder="Enter Task">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="lt_code">Land Code <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="lt_code" name="lt_code">
                  <?php echo filled_land_code($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="lt_date">Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control" id="lt_date" name="lt_date" placeholder="Date">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="work_type">Work Type <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="work_type" name="work_type">
                  <?php echo filled_work_type($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="labour_amount">Labour Amount</label>
                <input type="text" class="form-control" id="labour_amount" name="labour_amount" placeholder="Enter Amount">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="task_description">Task Description</label>
                <input type="text" class="form-control" id="task_description" name="task_description" placeholder="Description">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="assigned_person">Assigned Person</label>
                <input type="text" class="form-control" id="assigned_person" name="assigned_person" placeholder="Assigned Person">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <input type="hidden" name="btn_action" id="btn_action" name="btn_action" value="Add"/>
            <button type="submit" id="action" name="action" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div><!--/. container-fluid -->
</section>
<?php include_once "../../dashboard/index/footer.php"; ?>

<script type="text/javascript">
  $(document).ready(function () {
    var url = document.URL;
    var id = url.substring(url.lastIndexOf('=') + 1);
    // alert(id);
    var lt_id = '';
    lt_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // lt_id = Math.round(lt_id-.5);
    lt_id = Math.round(lt_id);
    // alert(lt_id);
    if (lt_id != Number.isNaN(NaN) || lt_id != '') {
      // alert("ID = "+lt_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {lt_id: lt_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#lt_id').val(data.lt_id); 
          $('#lt_name').val(data.lt_name); 
          $('#lt_code').val(data.lt_code);
          $('#lt_date').val(data.lt_date);
          $('#work_type').val(data.work_type);
          $('#labour_amount').val(data.labour_amount);
          $('#task_description').val(data.task_description);
          $('#assigned_person').val(data.assigned_person);

          $('#heading').html("Land Task Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
////////////// Insert
    $(document).on('submit', '#land_task', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#land_task')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
