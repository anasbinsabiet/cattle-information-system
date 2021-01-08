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
    <h1 class="m-0 text-dark" id="heading" name="heading">Land Profile Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Land Profile</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Land Profile Add</li>
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
        <form role="form" method="POST" id="land_profile" class="land_profile">
          <?php
          //          if ($id != 0) {
          ?>
          <input type="hidden" id="land_id" name="land_id" value="<?php //echo round($id,0); ?>">
          <?php
          //}
          ?>
          <div class="card-body">
            <div class="row">
              <p class="alert alert-primary" role="alert" id="alert_action" style="display: none;"></p>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="land_code">Land Code</label>
                <input type="text" class="form-control" id="land_code" name="land_code" placeholder="Land Code will be set after submission" readonly="">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="land_type">Land Type <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="land_type" name="land_type">
                  <?php echo filled_land_type_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="land_location">Land Location <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="land_location" name="land_location" placeholder="Enter Location">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="land_size">Land Size</label>
                <input type="text" class="form-control" id="land_size" name="land_size" placeholder="Enter Size">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="land_ownership_date">Ownership Date</label>
                <input type="date" class="form-control" id="land_ownership_date" name="land_ownership_date" placeholder="land_ownership_date">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="date_of_purchase">Date of Purchase</label>
                <input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase" placeholder="date_of_purchase">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="ownership_renew_date">Renew date</label>
                <input type="date" class="form-control" id="ownership_renew_date" name="ownership_renew_date" placeholder="ownership_renew_date">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="land_value">Land Value</label>
                <input type="text" class="form-control" id="land_value" name="land_value" placeholder="Enter Amount">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="cs_no">CS No</label>
                <input type="text" class="form-control" id="cs_no" name="cs_no" placeholder="Enter CS No">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="rs_no">RS No</label>
                <input type="text" class="form-control" id="rs_no" name="rs_no" placeholder="Enter RS NO">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="bs_no">BS No</label>
                <input type="text" class="form-control" id="bs_no" name="bs_no" placeholder="Enter BS No">
              </div>
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="land_profile_pic1">Land Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="land_profile_pic" name="land_profile_pic">
                    <label class="custom-file-label" for="land_profile_pic1">Choose file</label>
                  </div>
                </div>
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="land_profile_pic_url" name="land_profile_pic_url">
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
    $('#land_profile_pic').change(function () {
      var file_data = $('#land_profile_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('land_profile_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#land_profile_pic_url").val(data);
        }
      });
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    var url = document.URL;
    // alert(url);
    var id = url.substring(url.lastIndexOf('=') + 1);
    // alert(id);
    var land_id = '';
    land_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // land_profile_id = Math.round(land_profile_id-.5);
    land_id = Math.round(land_id);
    // alert(land_profile_id);
    if (land_id != Number.isNaN(NaN) || land_id != '') {
      // alert("ID = "+land_profile_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {land_id: land_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(land_profile_id);
          // alert(data);
          $('#land_id').val(data.land_id);
          $('#land_code').val(data.land_code);
          $('#land_type').val(data.land_type);
          $('#land_location').val(data.land_location);
          $('#land_size').val(data.land_size);
          $('#land_ownership_date').val(data.land_ownership_date);
          $('#date_of_purchase').val(data.date_of_purchase);
          $('#ownership_renew_date').val(data.ownership_renew_date);
          $('#remarks').val(data.remarks);
          $('#land_value').val(data.land_value);
          $('#cs_no').val(data.cs_no);
          $('#rs_no').val(data.rs_no);
          $('#bs_no').val(data.bs_no);
          $('#land_profile_pic_url').val(data.land_profile_pic);
          $('#targetLayer').attr('src', data.land_profile_pic);

          $('#heading').html("Land Profile Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#land_profile', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#land_profile')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
