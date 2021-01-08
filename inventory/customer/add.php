<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Customer Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Customer</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Customer Add</li>
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
        <form role="form" method="POST" id="customer" class="customer">
          <input type="hidden" id="customer_id" name="customer_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="customer_name">Customer Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="customer_number">Phone Number <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="customer_number" name="customer_number" placeholder="Phone Number">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="customer_address">Address</label>
                <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Enter Address">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="customer_email">Email</label>
                <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="Enter Address">
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
    var customer_id = '';
    customer_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // customer_id = Math.round(customer_id-.5);
    customer_id = Math.round(customer_id);
    // alert(customer_id);
    if (customer_id != Number.isNaN(NaN) || customer_id != '') {
      // alert("ID = "+customer_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {customer_id: customer_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(customer_id);
          // alert(data);
          $('#customer_id').val(data.customer_id); 
          $('#customer_name').val(data.customer_name);
          $('#customer_number').val(data.customer_number);
          $('#customer_address').val(data.customer_address);
          $('#customer_email').val(data.customer_email);

          $('#heading').html("Customer Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#customer', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#customer')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
