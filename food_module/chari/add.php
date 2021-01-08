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
    <h1 class="m-0 text-dark" id="heading" name="heading">Chari Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Chari</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Chari Add</li>
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
        <form role="form" method="POST" id="chari" class="chari">
          <input type="hidden" id="chari_id" name="chari_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="chari_code">Chari Code</label>
                <input type="text" class="form-control" id="chari_code" name="chari_code" placeholder="Chari Code will be set after submission" readonly="">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="chari_name">Chari Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="chari_name" name="chari_name" placeholder="Enter Name">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="size">Size <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="size" name="size" placeholder="Enter Size">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="unit">Unit <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="unit" name="unit">
                  <?php echo filled_chari_unit($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="farm_id">Farm ID <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="farm_id" name="farm_id">
                  <?php echo filled_farm_name($connect); ?>
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
    var chari_id = '';
    chari_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // chari_id = Math.round(chari_id-.5);
    chari_id = Math.round(chari_id);
    // alert(chari_id);
    if (chari_id != Number.isNaN(NaN) || chari_id != '') {
      // alert("ID = "+chari_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {chari_id: chari_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(chari_id);
          // alert(data);
          $('#chari_id').val(data.chari_id); 
          $('#chari_code').val(data.chari_code); 
          $('#chari_name').val(data.chari_name);
          $('#size').val(data.size);
          $('#unit').val(data.unit);
          $('#farm_id').val(data.farm_id);

          $('#heading').html("Chari Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#chari', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#chari')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
