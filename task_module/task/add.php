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
    <h1 class="m-0 text-dark" id="heading" name="heading">Task Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Task</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Task Add</li>
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
        <form role="form" method="POST" id="medicine" class="medicine">
          <input type="hidden" id="task_id" name="task_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="task_name">Task Name <!-- <span class="text-red">*</span> --></label>
                  <input type="text" class="form-control" id="task_name" name="task_name" placeholder="Enter Name">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="task_date">Task Date <!-- <span class="text-red">*</span> --></label>
                  <input type="date" class="form-control" id="task_date" name="task_date" value="<?php echo date('Y-m-d'); ?>">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" id="">
                <label for="task_type">Task Type</label>
                <select class="form-control" id="task_type" name="task_type">
                  <?php echo filled_task_type_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" id="">
                <label for="employee_id">Employee <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="employee_id" name="employee_id">
                  <?php echo filled_employee_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="deadline_date">Deadline Date <!-- <span class="text-red">*</span> --></label>
                  <input type="date" class="form-control" id="deadline_date" name="deadline_date" value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="dealine_time">Deadline Time</label>
                  <input type="time" class="form-control" id="dealine_time" name="dealine_time" placeholder="Enter Time">
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
    var task_id = '';
    task_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // task_id = Math.round(task_id-.5);
    task_id = Math.round(task_id);
    // alert(task_id);
    if (task_id != Number.isNaN(NaN) || task_id != '') {
      // alert("ID = "+task_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {task_id: task_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#task_id').val(data.task_id); 
          $('#task_name').val(data.task_name); 
          $('#task_date').val(data.task_date);
          $('#description').val(data.description);
          $('#task_type').val(data.task_type);
          $('#employee_id').val(data.employee_id);
          $('#deadline_date').val(data.deadline_date);
          $('#dealine_time').val(data.dealine_time);

          $('#heading').html("Task Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
////////////// Insert
    $(document).on('submit', '#medicine', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#medicine')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });  /////////////ready function
</script>
