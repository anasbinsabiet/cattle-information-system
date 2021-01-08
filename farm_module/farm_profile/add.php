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
    <h1 class="m-0 text-dark" id="heading" name="heading">Farm Profile Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Farm Profile</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Farm Profile Add</li>
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
          <input type="hidden" id="farm_profile_id" name="farm_profile_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="fp_name">Name <!-- <span class="text-red">*</span> --></label>
                  <input type="text" class="form-control" id="fp_name" name="fp_name" placeholder="Enter Name">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="start_date">Start Date <!-- <span class="text-red">*</span> --></label>
                  <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter Date">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="total_cow">Total Cow</label>
                  <input type="number" class="form-control" id="total_cow" name="total_cow" placeholder="Cow Number">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="total_chari">Total Chari</label>
                  <input type="number" class="form-control" id="total_chari" name="total_chari" placeholder="Chari Number">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="total_storage">Total Storage</label>
                  <input type="number" class="form-control" id="total_storage" name="total_storage" placeholder="Total Storage">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="total_required_employee">Total Required Employee</label>
                  <input type="number" class="form-control" id="total_required_employee" name="total_required_employee" placeholder="Required Employee">
              </div>

              <div class="form-group col-sm-6 col-md-6 col-lg-6" id="">
                <label for="manager">Manager <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="manager" name="manager">
                  <?php echo filled_manager_name($connect); ?>
                </select>
              </div>
              
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="contact_no">Contact No <!-- <span class="text-red">*</span> --></label>
                  <input type="number" class="form-control" id="contact_no" name="contact_no" placeholder="Enter Number">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="address">Address <!-- <span class="text-red">*</span> --></label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="remarks">Remarks</label>
                  <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter remarks">
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
    var farm_profile_id = '';
    farm_profile_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // farm_profile_id = Math.round(farm_profile_id-.5);
    farm_profile_id = Math.round(farm_profile_id);
    // alert(farm_profile_id);
    if (farm_profile_id != Number.isNaN(NaN) || farm_profile_id != '') {
      // alert("ID = "+farm_profile_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {farm_profile_id: farm_profile_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#farm_profile_id').val(data.farm_profile_id); 
          $('#fp_name').val(data.fp_name); 
          $('#start_date').val(data.start_date);
          $('#total_cow').val(data.total_cow);
          $('#total_chari').val(data.total_chari);
          $('#total_storage').val(data.total_storage);
          $('#total_required_employee').val(data.total_required_employee);
          $('#manager').val(data.manager);
          $('#contact_no').val(data.contact_no);
          $('#address').val(data.address);
          $('#remarks').val(data.remarks);

          $('#heading').html("Farm Profile Edit");
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
