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
    <h1 class="m-0 text-dark" id="heading" name="heading">Health Checkup Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Health Checkup</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Health Checkup Add</li>
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
        <form role="form" method="POST" id="health_checkup" class="health_checkup">
          <input type="hidden" id="hc_id" name="hc_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="cattle_id">Cattle <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="cattle_id" name="cattle_id">
                  <?php echo filled_cattle_code($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="dr_id">Doctor <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="dr_id" name="dr_id">
                  <?php echo filled_dr_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="dr_advise">Doctor Advise</label>
                <textarea class="form-control" id="dr_advise" name="dr_advise"></textarea>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="medicine_id">Medicine ID</label>
                <select class="form-control" id="medicine_id" name="medicine_id">
                  <?php echo filled_medicine_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="dr_visiting_time">Dr Visiting Time</label>
                <input type="time" class="form-control" id="dr_visiting_time" name="dr_visiting_time">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="medicine_routine_id">Medicine Routine ID</label>
                <select class="form-control" id="medicine_routine_id" name="medicine_routine_id">
                  <?php echo filled_medication_routine($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="problem_type">Problem Type</label>
                <select class="form-control" id="problem_type" name="problem_type">
                  <?php echo filled_problem_type($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="problem_details">Problem Details</label>
                  <input type="text" class="form-control" id="problem_details" name="problem_details" placeholder="Enter Details">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="problem_area">Problem Area</label>
                  <select class="form-control" id="problem_area" name="problem_area">
                    <?php echo filled_problem_area($connect); ?>
                  </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="health_checkup_pic1">Image Upload</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="health_checkup_pic" name="health_checkup_pic">
                    <label class="custom-file-label" for="health_checkup_pic1">Choose file</label>
                  </div>
                </div>
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="health_checkup_pic_url" name="health_checkup_pic_url">
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
    var hc_id = '';
    hc_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // hc_id = Math.round(hc_id-.5);
    hc_id = Math.round(hc_id);
    // alert(hc_id);
    if (hc_id != Number.isNaN(NaN) || hc_id != '') {
      // alert("ID = "+hc_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {hc_id: hc_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#hc_id').val(data.hc_id);
          $('#cattle_id').val(data.cattle_id);
          $('#date').val(data.date); 
          $('#dr_id').val(data.dr_id);
          $('#dr_advise').val(data.dr_advise);
          $('#medicine_id').val(data.medicine_id);
          $('#dr_visiting_time').val(data.dr_visiting_time);
          $('#medicine_routine_id').val(data.medicine_routine_id);
          $('#remarks').val(data.remarks);
          $('#problem_type').val(data.problem_type);
          $('#problem_details').val(data.problem_details);
          $('#problem_area').val(data.problem_area);
          $('#health_checkup_pic_url').val(data.health_checkup_pic);
          $('#targetLayer').attr('src', data.health_checkup_pic);

          $('#heading').html("Health Checkup Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
////////////// Insert
    $(document).on('submit', '#health_checkup', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#health_checkup')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });

    $('#health_checkup_pic').change(function () {
      var file_data = $('#health_checkup_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('health_checkup_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#health_checkup_pic_url").val(data);
        }
      });
    });

  });  //////// Ready Function
</script>
