<?php
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Doctor Profile Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Doctor Profile</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Doctor Profile Add</li>
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
        <form role="form" method="POST" id="doctor_profile" class="doctor_profile">
          <input type="hidden" id="dp_id" name="dp_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="dr_name">Doctor Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="dr_name" name="dr_name" placeholder="Enter Name">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="chamber_address">Chamber Address</label>
                <input type="text" class="form-control" id="chamber_address" name="chamber_address" placeholder="Enter Address">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="phone_no_1">Phone No 1 <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="phone_no_1" name="phone_no_1" placeholder="Enter Number">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="phone_no_2">Phone No 2</label>
                <input type="text" class="form-control" id="phone_no_2" name="phone_no_2" placeholder="Enter Number">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="social_media">Social Media</label>
                <input type="text" class="form-control" id="social_media" name="social_media" placeholder="Enter ID / Link">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="dr_helping_hand">Dr Helping Hand</label>
                <input type="text" class="form-control" id="dr_helping_hand" name="dr_helping_hand" placeholder="Enter Name">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="dr_helping_hand_contact">Dr Helping Hand Contact</label>
                <input type="text" class="form-control" id="dr_helping_hand_contact" name="dr_helping_hand_contact" placeholder="Enter Contact Number">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="chamber_timing_start">Chamber Timing Start</label>
                <input type="time" class="form-control" id="chamber_timing_start" name="chamber_timing_start">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="chamber_timing_end">Chamber Timing End</label>
                <input type="time" class="form-control" id="chamber_timing_end" name="chamber_timing_end" placeholder="chamber_timing_end">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="day_off">Day off</label>
                <select class="form-control" id="day_off" name="day_off">
                  <option value="">Select Day</option>
                  <option value="Saturday">Saturday</option>
                  <option value="Sunday">Sunday</option>
                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thirsday">Thirsday</option>
                  <option value="Friday">Friday</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="visiting_charge_in_chamber">Visiting Charge in Chamber</label>
                <input type="text" class="form-control" id="visiting_charge_in_chamber" name="visiting_charge_in_chamber" placeholder="Enter Amount">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="visiting_charge_in_farm">Visiting Charge in Farm</label>
                <input type="text" class="form-control" id="visiting_charge_in_farm" name="visiting_charge_in_farm" placeholder="Enter Amount">
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
    var dp_id = '';
    dp_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // dp_id = Math.round(dp_id-.5);
    dp_id = Math.round(dp_id);
    // alert(dp_id);
    if (dp_id != Number.isNaN(NaN) || dp_id != '') {
      // alert("ID = "+dp_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {dp_id: dp_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#dp_id').val(data.dp_id); 
          $('#dr_name').val(data.dr_name); 
          $('#address').val(data.address);
          $('#chamber_address').val(data.chamber_address);
          $('#phone_no_1').val(data.phone_no_1);
          $('#phone_no_2').val(data.phone_no_2);
          $('#email').val(data.email);
          $('#social_media').val(data.social_media);
          $('#dr_helping_hand').val(data.dr_helping_hand);
          $('#dr_helping_hand_contact').val(data.dr_helping_hand_contact);
          $('#chamber_timing_start').val(data.chamber_timing_start);
          $('#chamber_timing_end').val(data.chamber_timing_end);
          $('#day_off').val(data.day_off);
          $('#visiting_charge_in_chamber').val(data.visiting_charge_in_chamber);
          $('#visiting_charge_in_farm').val(data.visiting_charge_in_farm);

          $('#heading').html("Doctor Profile Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
////////////// Insert
    $(document).on('submit', '#doctor_profile', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#doctor_profile')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
