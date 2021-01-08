<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Supplier Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Supplier</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Supplier Add</li>
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
        <form role="form" method="POST" id="supplier" class="supplier">
          <input type="hidden" id="supplier_id" name="supplier_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="supplier_name">Supplier Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Enter Supplier Name">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="supplier_number">Phone Number <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="supplier_number" name="supplier_number" placeholder="Phone Number">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="supplier_address">Address</label>
                <input type="text" class="form-control" id="supplier_address" name="supplier_address" placeholder="Enter Address">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="supplier_email">Email</label>
                <input type="text" class="form-control" id="supplier_email" name="supplier_email" placeholder="Enter Address">
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
    var supplier_id = '';
    supplier_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // supplier_id = Math.round(supplier_id-.5);
    supplier_id = Math.round(supplier_id);
    // alert(supplier_id);
    if (supplier_id != Number.isNaN(NaN) || supplier_id != '') {
      // alert("ID = "+supplier_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {supplier_id: supplier_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(supplier_id);
          // alert(data);
          $('#supplier_id').val(data.supplier_id); 
          $('#supplier_name').val(data.supplier_name);
          $('#supplier_number').val(data.supplier_number);
          $('#supplier_address').val(data.supplier_address);
          $('#supplier_email').val(data.supplier_email);

          $('#heading').html("supplier Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#supplier', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#supplier')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
