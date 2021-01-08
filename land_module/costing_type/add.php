<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Costing Type Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Costing Type</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Costing Type Add</li>
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
        <form role="form" method="POST" id="costing_type" class="costing_type">
          <input type="hidden" id="costing_type_id" name="costing_type_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="costing_type_name">Costing Type Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="costing_type_name" name="costing_type_name" placeholder="Enter Costing Type Name">
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
    var costing_type_id = '';
    costing_type_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // costing_type_id = Math.round(costing_type_id-.5);
    costing_type_id = Math.round(costing_type_id);
    // alert(costing_type_id);
    if (costing_type_id != Number.isNaN(NaN) || costing_type_id != '') {
      // alert("ID = "+costing_type_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {costing_type_id: costing_type_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(costing_type_id);
          // alert(data);
          $('#costing_type_id').val(data.costing_type_id); 
          $('#costing_type_name').val(data.costing_type_name); 
          $('#costing_type_type').val(data.costing_type_type);
          $('#costing_type_desc').val(data.costing_type_desc);

          $('#heading').html("Costing Type Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#costing_type', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#costing_type')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
