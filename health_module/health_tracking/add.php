<?php
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Health Tracking Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Health Tracking</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Health Tracking Add</li>
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
        <form role="form" method="POST" id="health_tracking" class="health_tracking">
          <input type="hidden" id="ht_id" name="ht_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="cattle_id">Cattle ID</label>
                <select class="form-control" id="cattle_id" name="cattle_id">
                  <option value="">Select</option>
                  <option value="1">Cattle 1</option>
                  <option value="2">Cattle 2</option>
                  <option value="3">Cattle 3</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" placeholder="Enter date">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="problem_type">Problem Type</label>
                <select class="form-control" id="problem_type" name="problem_type">
                  <option value="">Select</option>
                  <option value="1">Problem 1</option>
                  <option value="2">Problem 2</option>
                  <option value="3">Problem 3</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="problem_details">Problem Details</label>
                  <input type="text" class="form-control" id="problem_details" name="problem_details" placeholder="Enter Details">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="problem_area">Problem Area</label>
                  <input type="text" class="form-control" id="problem_area" name="problem_area" placeholder="Enter Problem">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="medication_type">Medication Type</label>
                <select class="form-control" id="medication_type" name="medication_type">
                  <option value="">Select</option>
                  <option value="1">Medication 1</option>
                  <option value="2">Medication 2</option>
                  <option value="3">Medication 3</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="medication_details">Medication Details</label>
                  <input type="text" class="form-control" id="medication_details" name="medication_details" placeholder="Medication details">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="medication_routine_id">Medication Routine</label>
                <select class="form-control" id="medication_routine_id" name="medication_routine_id">
                  <option value="">Select</option>
                  <option value="1">Medication Routine 1</option>
                  <option value="2">Medication Routine 2</option>
                  <option value="3">Medication Routine 3</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="dr_id">Doctor Type</label>
                <select class="form-control" id="dr_id" name="dr_id">
                  <option value="">Select</option>
                  <option value="1">Doctor 1</option>
                  <option value="2">Doctor 2</option>
                  <option value="3">Doctor 3</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="dr_visiting_time">Dr Visiting Time</label>
                  <input type="time" class="form-control" id="dr_visiting_time" name="dr_visiting_time" placeholder="Dr Visiting Time">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="health_checkup_id">Health Checkup ID</label>
                <select class="form-control" id="health_checkup_id" name="health_checkup_id">
                  <option value="">Select</option>
                  <option value="1">Health Checkup 1</option>
                  <option value="2">Health Checkup 2</option>
                  <option value="3">Health Checkup 3</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="remarks">Remarks</label>
                  <input type="text" class="form-control" id="remarks" name="remarks" placeholder="remarks">
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
    var ht_id = '';
    ht_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // ht_id = Math.round(ht_id-.5);
    ht_id = Math.round(ht_id);
    // alert(ht_id);
    if (ht_id != Number.isNaN(NaN) || ht_id != '') {
      // alert("ID = "+ht_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {ht_id: ht_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#ht_id').val(data.ht_id); 
          $('#cattle_id').val(data.cattle_id); 
          $('#date').val(data.date);
          $('#problem_type').val(data.problem_type);
          $('#problem_details').val(data.problem_details);
          $('#problem_area').val(data.problem_area);
          $('#medication_type').val(data.medication_type);
          $('#medication_details').val(data.medication_details);
          $('#medication_routine_id').val(data.medication_routine_id);
          $('#dr_id').val(data.dr_id);
          $('#dr_visiting_time').val(data.dr_visiting_time);
          $('#health_checkup_id').val(data.health_checkup_id);
          $('#remarks').val(data.remarks);

          $('#heading').html("Health Tracking Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
////////////// Insert
    $(document).on('submit', '#health_tracking', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#health_tracking')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
