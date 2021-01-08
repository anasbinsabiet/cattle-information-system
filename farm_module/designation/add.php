<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Designation Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Designation</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Designation Add</li>
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
        <form role="form" method="POST" id="designation" class="designation">
          <input type="hidden" id="designation_id" name="designation_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="designation_name">Designation Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="designation_name" name="designation_name" onkeypress="return /[a-z]/i.test(event.key)" placeholder="Enter Designation">
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
    var designation_id = '';
    designation_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // designation_id = Math.round(designation_id-.5);
    designation_id = Math.round(designation_id);
    // alert(designation_id);
    if (designation_id != Number.isNaN(NaN) || designation_id != '') {
      // alert("ID = "+designation_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {designation_id: designation_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(designation_id);
          // alert(data);
          $('#designation_id').val(data.designation_id); 
          $('#designation_name').val(data.designation_name); 
          $('#designation_type').val(data.designation_type);
          $('#designation_desc').val(data.designation_desc);

          $('#heading').html("designation Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#designation', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#designation')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
