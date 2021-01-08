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
    <h1 class="m-0 text-dark" id="heading" name="heading">Land Costing Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Land Costing</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Land Costing Add</li>
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
        <form role="form" method="POST" id="land_costing" class="land_costing">
          <input type="hidden" id="lc_id" name="lc_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="land_code">Land Code <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="land_code" name="land_code">
                  <?php echo filled_land_code($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="costing_type">Costing Type <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="costing_type" name="costing_type">
                  <?php echo filled_land_costing_type($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="cost_amount">Cost Amount <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control cost_amount" id="cost_amount" name="cost_amount" placeholder="Enter Amount">
              </div>

              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control remarks" id="remarks" name="remarks" placeholder="Enter Remarks">
              </div>

              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="land_costing_pic1">Image Upload</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="land_costing_pic" name="land_costing_pic">
                    <label class="custom-file-label" for="land_costing_pic1">Choose file</label>
                  </div>
                </div>
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="land_costing_pic_url" name="land_costing_pic_url">
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
<?php
include_once "../../dashboard/index/footer.php";
?>


<script type="text/javascript">
  $(document).ready(function () {
    var url = document.URL;
    var id = url.substring(url.lastIndexOf('=') + 1);
    var lc_id = '';
    lc_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    lc_id = Math.round(lc_id);
    if (lc_id != Number.isNaN(NaN) || lc_id != '') {
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {lc_id: lc_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#lc_id').val(data.lc_id); 
          $('#land_code').val(data.land_code); 
          $('#costing_type').val(data.costing_type);
          $('#cost_amount').val(data.cost_amount);
          $('#remarks').val(data.remarks);
          $('#land_costing_pic_url').val(data.land_costing_pic);
          $('#targetLayer').attr('src', data.land_costing_pic);

          $('#heading').html("Land Costing Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
////////////// Insert
    $(document).on('submit', '#land_costing', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#land_costing')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });

    $('#land_costing_pic').change(function () {
      var file_data = $('#land_costing_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('land_costing_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#land_costing_pic_url").val(data);
        }
      });
    });

  });   //////////////////////  Ready Function
</script>
