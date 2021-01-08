<?php
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Medicine Unit Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Medicine Unit</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Medicine Unit Add</li>
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
        <form role="form" method="POST" id="medicine_unit" class="medicine_unit">
          <input type="hidden" id="medicine_unit_id" name="medicine_unit_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="medicine_unit_name">Medicine Unit Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="medicine_unit_name" name="medicine_unit_name" placeholder="Enter Medicine Unit Name">
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
    var medicine_unit_id = '';
    medicine_unit_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // medicine_unit_id = Math.round(medicine_unit_id-.5);
    medicine_unit_id = Math.round(medicine_unit_id);
    // alert(medicine_unit_id);
    if (medicine_unit_id != Number.isNaN(NaN) || medicine_unit_id != '') {
      // alert("ID = "+medicine_unit_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {medicine_unit_id: medicine_unit_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(medicine_unit_id);
          // alert(data);
          $('#medicine_unit_id').val(data.medicine_unit_id); 
          $('#medicine_unit_name').val(data.medicine_unit_name); 
          $('#medicine_unit_type').val(data.medicine_unit_type);
          $('#medicine_unit_desc').val(data.medicine_unit_desc);

          $('#heading').html("Medicine Unit Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#medicine_unit', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#medicine_unit')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
