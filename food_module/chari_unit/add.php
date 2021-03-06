<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Chari Unit Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Chari Unit</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Chari Unit Add</li>
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
        <form role="form" method="POST" id="chari_unit" class="chari_unit">
          <input type="hidden" id="chari_unit_id" name="chari_unit_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="chari_unit_name">Chari Unit Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="chari_unit_name" name="chari_unit_name" placeholder="Enter Chari Unit Name">
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
    var chari_unit_id = '';
    chari_unit_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // chari_unit_id = Math.round(chari_unit_id-.5);
    chari_unit_id = Math.round(chari_unit_id);
    // alert(chari_unit_id);
    if (chari_unit_id != Number.isNaN(NaN) || chari_unit_id != '') {
      // alert("ID = "+chari_unit_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {chari_unit_id: chari_unit_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(chari_unit_id);
          // alert(data);
          $('#chari_unit_id').val(data.chari_unit_id); 
          $('#chari_unit_name').val(data.chari_unit_name); 
          $('#chari_unit_type').val(data.chari_unit_type);
          $('#chari_unit_desc').val(data.chari_unit_desc);

          $('#heading').html("Chari Unit Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#chari_unit', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#chari_unit')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
