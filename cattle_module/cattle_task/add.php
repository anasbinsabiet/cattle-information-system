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
    <h1 class="m-0 text-dark" id="heading" name="heading">Cattle Task Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Cattle Task</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Cattle Task Add</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="alert" role="alert" id="alert_action" style="display: none;"></div>
        <form role="form" method="POST" id="cattle_task" class="cattle_task">
          <input type="hidden" id="cattle_task_id" name="cattle_task_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="cattle_code">Cattle Code</label>
                <select class="form-control" id="cattle_code" name="cattle_code">
                  <?php echo filled_cattle_code($connect); ?>
                </select>
              </div>


              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="task_date">Task Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control task_date" id="task_date" name="task_date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="task_type">Task Type <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="task_type" name="task_type">
                  <?php echo filled_task_type_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="assigned_person">Assigned Person <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="assigned_person" name="assigned_person">
                  <?php echo filled_employee_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="task_status">Task Status <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="task_status" name="task_status">
                  <?php echo filled_task_status_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="task_title">Task Title <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control task_title" id="task_title" name="task_title" onkeypress="return /[a-z]/i.test(event.key)"  placeholder="Enter Title">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="task_description">Task Description</label>
                <input type="text" class="form-control task_description" id="task_description" name="task_description" placeholder="Enter Description">
              </div>


              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="cattle_task_pic1">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="cattle_task_pic" name="cattle_task_pic">
                    <label class="custom-file-label" for="cattle_task_pic1">Choose file</label>
                  </div>
                </div>
                <!--                <img id="targetLayer" name="targetLayer">No Image-->
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="cattle_task_pic_url" name="cattle_task_pic_url">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <input type="hidden" name="btn_action" id="btn_action" name="btn_action" value="Add"/>
            <button type="submit" id="action" name="action" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>

    <!-- /.row -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->

<?php
include_once "../../dashboard/index/footer.php";
?>
<script type="text/javascript">
  $(document).ready(function (e) {




    $('#cattle_task_pic').change(function () {
      var file_data = $('#cattle_task_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('cattle_task_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#cattle_task_pic_url").val(data);
        }
      });
    });
  });
</script>
<?php if(isset($_GET['id'])){ ?>
<script type="text/javascript">
  $(document).ready(function () {


    var url = document.URL;
    // alert(url);
    var id = url.substring(url.lastIndexOf('=') + 1);
    // alert(id);
    var cattle_task_id = '';
    cattle_task_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // cattle_task_id = Math.round(cattle_task_id-.5);
    cattle_task_id = Math.round(cattle_task_id);
    // alert(cattle_task_id);
    if (cattle_task_id != Number.isNaN(NaN) || cattle_task_id != '') {

      // alert("ID = "+cattle_task_id);

      var btn_action = 'fetch_single';

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {cattle_task_id: cattle_task_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(cattle_task_id);
          // alert(data);

          $('#cattle_task_id').val(data.cattle_task_id); 
          $('#cattle_code').val(data.cattle_code); 
          $('#task_date').val(data.task_date);
          $('#task_type').val(data.task_type);
          $('#assigned_person').val(data.assigned_person);
          $('#task_status').val(data.task_status);
          $('#task_title').val(data.task_title);
          $('#task_description').val(data.task_description); 
          $('#cattle_task_pic_url').val(data.cattle_task_pic);
          $('#targetLayer').attr('src', data.cattle_task_pic);

          $('#heading').html(" Cattle Task Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })

    }

  });

</script>

<?php } ?>

<script type="text/javascript">
  $(document).ready(function () {


    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#cattle_task', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#cattle_task')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });


  });


</script>
