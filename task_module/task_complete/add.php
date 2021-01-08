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
    <h1 class="m-0 text-dark" id="heading" name="heading">Task Complete Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Task Complete</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Task Complete Add</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-primary">
        <form role="form" method="POST" id="medicine" class="medicine">
          <input type="hidden" id="task_complete_id" name="task_complete_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6" id="">
                <label for="task_id">Task Name <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="task_id" name="task_id">
                  <?php echo filled_task_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" id="">
                <label for="task_status">Task Status <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="task_status" name="task_status">
                  <?php echo filled_task_status_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="remarks">Remarks</label>
                  <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="task_complete_pic1">Image Upload</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="task_complete_pic" name="task_complete_pic">
                    <label class="custom-file-label" for="task_complete_pic1">Choose file</label>
                  </div>
                </div>
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="task_complete_pic_url" name="task_complete_pic_url">
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
    var task_complete_id = '';
    task_complete_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // task_complete_id = Math.round(task_complete_id-.5);
    task_complete_id = Math.round(task_complete_id);
    // alert(task_complete_id);
    if (task_complete_id != Number.isNaN(NaN) || task_complete_id != '') {
      // alert("ID = "+task_complete_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {task_complete_id: task_complete_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#task_complete_id').val(data.task_complete_id); 
          $('#task_id').val(data.task_id); 
          $('#task_status').val(data.task_status); 
          $('#remarks').val(data.remarks);
          $('#task_complete_pic_url').val(data.task_complete_pic);
          $('#targetLayer').attr('src', data.task_complete_pic);

          $('#heading').html("Task Complete Edit");
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
          // $('#alert_action').fadeIn().html('<div class="alert alert-success">' + data + '</div>');
          alert(data);
        }
      })
    });

    $('#task_complete_pic').change(function () {
      var file_data = $('#task_complete_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('task_complete_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#task_complete_pic_url").val(data);
        }
      });
    });

  });   //////////////////////  Ready Function
</script>
