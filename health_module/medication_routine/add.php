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
    <h1 class="m-0 text-dark" id="heading" name="heading">Medication Routine Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Medication Routine</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Medication Routine Add</li>
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
          <input type="hidden" id="mr_id" name="mr_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-4 col-md-6 col-lg-4" >
                <label for="cattle_id">Cattle <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="cattle_id" name="cattle_id">
                  <?php echo filled_cattle_code($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-4 col-md-6 col-lg-4" >
                <label for="medicine_name">Medicine <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="medicine_name" name="medicine_name">
                  <?php echo filled_medicine_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-4 col-md-6 col-lg-4" >
                <label for="dr_name">Doctor ID <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="dr_name" name="dr_name">
                  <?php echo filled_dr_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-4 col-md-6 col-lg-4" >
                <label for="problem_type">Problem Type</label>
                <select class="form-control" id="problem_type" name="problem_type">
                  <?php echo filled_problem_type($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-4 col-md-6 col-lg-4">
                  <label for="problem_area">Problem Area</label>
                  <select class="form-control" id="problem_area" name="problem_area">
                    <?php echo filled_problem_area($connect); ?>
                  </select>
              </div>
              <div class="form-group col-sm-4 col-md-6 col-lg-4">
                  <label for="duration_date_from">Date From</label>
                  <input type="date" class="form-control" id="duration_date_from" name="duration_date_from" placeholder="Enter Date">
              </div>
              <div class="form-group col-sm-4 col-md-6 col-lg-4">
                  <label for="duration_date_to">Date To</label>
                  <input type="date" class="form-control" id="duration_date_to" name="duration_date_to" placeholder="Enter Date">
              </div><div class="form-group col-sm-4 col-md-6 col-lg-4">
                  <label for="how_many_time">How Many Time (Per Day)</label>
                  <input type="number" class="form-control" id="how_many_time" name="how_many_time" placeholder="Enter Number">
              </div>
              <div class="form-group col-sm-4 col-md-6 col-lg-4">
                  <label for="remarks">Remarks</label>
                  <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
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
    var mr_id = '';
    mr_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // mr_id = Math.round(mr_id-.5);
    mr_id = Math.round(mr_id);
    // alert(mr_id);
    if (mr_id != Number.isNaN(NaN) || mr_id != '') {
      // alert("ID = "+mr_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {mr_id: mr_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#mr_id').val(data.mr_id); 
          $('#cattle_id').val(data.cattle_id); 
          $('#medicine_name').val(data.medicine_name);
          $('#dr_name').val(data.dr_name);
          $('#problem_type').val(data.problem_type);
          $('#problem_area').val(data.problem_area);
          $('#duration_date_from').val(data.duration_date_from);
          $('#duration_date_to').val(data.duration_date_to);
          $('#how_many_time').val(data.how_many_time);
          $('#remarks').val(data.remarks);

          $('#heading').html("Medicine Edit");
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
  });
</script>
