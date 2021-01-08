<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Cattle Kin Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Cattle Kin</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Cattle Kin Add</li>
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
        <form role="form" method="POST" id="cattle_kin" class="cattle_kin">
          <input type="hidden" id="cattle_kin_id" name="cattle_kin_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="cattle_kin_name">Cattle Kin Name <!--<span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="cattle_kin_name" name="cattle_kin_name" onkeypress="return /[a-z]/i.test(event.key)" placeholder="Enter Name">
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
    var cattle_kin_id = '';
    cattle_kin_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // cattle_kin_id = Math.round(cattle_kin_id-.5);
    cattle_kin_id = Math.round(cattle_kin_id);
    // alert(cattle_kin_id);
    if (cattle_kin_id != Number.isNaN(NaN) || cattle_kin_id != '') {
      // alert("ID = "+cattle_kin_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {cattle_kin_id: cattle_kin_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(cattle_kin_id);
          // alert(data);
          $('#cattle_kin_id').val(data.cattle_kin_id); 
          $('#cattle_kin_name').val(data.cattle_kin_name);

          $('#heading').html("Cattle Kin Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#cattle_kin', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#cattle_kin')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
