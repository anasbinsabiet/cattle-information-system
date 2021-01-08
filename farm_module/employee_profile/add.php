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
    <h1 class="m-0 text-dark" id="heading" name="heading">Employee Profile Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Employee Profile</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Employee Profile Add</li>
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
        <form role="form" method="POST" id="employee_profile" class="employee_profile">

          <input type="hidden" id="employee_profile_id" name="employee_profile_id" value="">

          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="emp_name">Employee Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Enter Name">
              </div>


              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="designation">Designation <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="designation" name="designation">
                  <?php echo filled_designation_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="phone">Phone <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control phone" id="phone" name="phone" placeholder="Enter Number">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="social_media">Social Media</label>
                <input type="text" class="form-control social_media" id="social_media" name="social_media" placeholder="Enter Link / ID">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="email">Email</label>
                <input type="email" class="form-control email" id="email" name="email" placeholder="Enter Email" required>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="address">Address</label>
                <input type="text" class="form-control address" id="address" name="address" placeholder="Enter Address">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="contact_person">Contact Person</label>
                <input type="text" class="form-control contact_person" id="contact_person" name="contact_person" placeholder="Enter Name">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="contact_person_details">Contact Person Details</label>
                <input type="text" class="form-control" id="contact_person_details" name="contact_person_details" placeholder="Enter Number">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="dob">Date of Birth <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control dob" id="dob" name="dob" placeholder="">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="gender">Gender <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="gender" name="gender">
                  <option value="">Select</option>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>

              
              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="farm_id">Farm ID <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="farm_id" name="farm_id">
                  <?php echo filled_farm_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="employee_profile_pic1">File Input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="employee_profile_pic" name="employee_profile_pic">
                    <label class="custom-file-label" for="employee_profile_pic1">Choose file</label>
                  </div>
                </div>
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="employee_profile_pic_url" name="employee_profile_pic_url">
              </div>
            </div>
          </div>
          <!-- /.card-body -->

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




    $('#employee_profile_pic').change(function () {
      var file_data = $('#employee_profile_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('employee_profile_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#employee_profile_pic_url").val(data);
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
    var employee_profile_id = '';
    employee_profile_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // employee_profile_id = Math.round(employee_profile_id-.5);
    employee_profile_id = Math.round(employee_profile_id);
    // alert(employee_profile_id);
    if (employee_profile_id != Number.isNaN(NaN) || employee_profile_id != '') {

      // alert("ID = "+employee_profile_id);

      var btn_action = 'fetch_single';

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {employee_profile_id: employee_profile_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(employee_profile_id);
          // alert(data);

          $('#employee_profile_id').val(data.employee_profile_id); 
          $('#emp_name').val(data.emp_name); 
          $('#designation').val(data.designation);

          $('#phone').val(data.phone);
          $('#social_media').val(data.social_media);
          $('#email').val(data.email);
          $('#address').val(data.address);
          $('#contact_person').val(data.contact_person);
          $('#contact_person_details').val(data.contact_person_details);
          $('#dob').val(data.dob);
          $('#gender').val(data.gender);
          // $('#role').val(data.role);
          // $('#permission').val(data.permission);
          // $('#user_name').val(data.user_name);
          // $('#password').val(data.password);
          $('#farm_id').val(data.farm_id);
          
          $('#employee_profile_pic_url').val(data.employee_profile_pic_url);
          $('#targetLayer').attr('src', data.employee_profile_pic_url);

          $('#heading').html("Employee Profile Edit");
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
    $(document).on('submit', '#employee_profile', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#employee_profile')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });


  });


</script>
