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
    <h1 class="m-0 text-dark" id="heading" name="heading">User Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">User</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">User Add</li>
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
          <input type="hidden" id="farm_user_id" name="farm_user_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="user_name">User Name <!-- <span class="text-red">*</span> --></label>
                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Name">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="user_email">User Email <!-- <span class="text-red">*</span> --></label>
                  <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Enter Email">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="user_password">User Password <!-- <span class="text-red">*</span> --></label>
                  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter Password">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="full_name">Full Name</label>
                  <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Name">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" id="">
                <label for="farm_id">Farm ID</label>
                <select class="form-control" id="farm_id" name="farm_id">
                  <?php echo filled_farm_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" id="">
                <label for="employee_id">Employee</label>
                <select class="form-control" id="employee_id" name="employee_id">
                  <?php echo filled_employee_name($connect); ?>
                </select>
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
    var farm_user_id = '';
    farm_user_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // farm_user_id = Math.round(farm_user_id-.5);
    farm_user_id = Math.round(farm_user_id);
    // alert(farm_user_id);
    if (farm_user_id != Number.isNaN(NaN) || farm_user_id != '') {
      // alert("ID = "+farm_user_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {farm_user_id: farm_user_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#farm_user_id').val(data.farm_user_id); 
          $('#user_name').val(data.user_name); 
          $('#user_email').val(data.user_email); 
          $('#user_password').val(data.user_password);
          $('#full_name').val(data.full_name);
          $('#farm_id').val(data.farm_id);
          $('#employee_id').val(data.employee_id);

          $('#heading').html("User Edit");
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
