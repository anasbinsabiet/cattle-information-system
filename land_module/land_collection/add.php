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
    <h1 class="m-0 text-dark" id="heading" name="heading">Land Collection Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Land Collection</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Land Collection Add</li>
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
        <form role="form" method="POST" id="land_collection" class="land_collection">
          <input type="hidden" id="collection_id" name="collection_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="collection_code">Collection Code</label>
                <input type="text" class="form-control" id="collection_code" name="collection_code" placeholder="Collection Code will be set after submission" readonly="">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="collection_date">Collection Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control" id="collection_date" name="collection_date" value="<?php echo date('Y-m-d'); ?>">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="land_code">Land Code <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="land_code" name="land_code">
                  <?php echo filled_land_code($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="agro_products">Products</label>
                <select class="form-control" id="agro_products" name="agro_products">
                  <?php echo filled_food_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">
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
    var collection_id = '';
    collection_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // collection_id = Math.round(collection_id-.5);
    collection_id = Math.round(collection_id);
    // alert(collection_id);
    if (collection_id != Number.isNaN(NaN) || collection_id != '') {
      // alert("ID = "+collection_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {collection_id: collection_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(collection_id);
          // alert(data);
          $('#collection_id').val(data.collection_id); 
          $('#collection_code').val(data.collection_code);
          $('#collection_date').val(data.collection_date);
          $('#amount').val(data.amount);
          $('#land_code').val(data.land_code);
          $('#agro_products').val(data.agro_products);
          $('#remarks').val(data.remarks);

          $('#heading').html("Land Collection Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#land_collection', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#land_collection')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
