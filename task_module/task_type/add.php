<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Task Type Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Task Type</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Task Type Add</li>
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
        <form role="form" method="POST" id="task_type" class="task_type">
          <input type="hidden" id="task_type_id" name="task_type_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="task_type_name">Task Type Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" onkeypress="return /[a-z]/i.test(event.key)" id="task_type_name" name="task_type_name" placeholder="Enter Task Type Name">
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
    var task_type_id = '';
    task_type_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // task_type_id = Math.round(task_type_id-.5);
    task_type_id = Math.round(task_type_id);
    // alert(task_type_id);
    if (task_type_id != Number.isNaN(NaN) || task_type_id != '') {
      // alert("ID = "+task_type_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {task_type_id: task_type_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(task_type_id);
          // alert(data);
          $('#task_type_id').val(data.task_type_id); 
          $('#task_type_name').val(data.task_type_name); 
          $('#task_type_type').val(data.task_type_type);
          $('#task_type_desc').val(data.task_type_desc);

          $('#heading').html("Task Type Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#task_type', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#task_type')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
