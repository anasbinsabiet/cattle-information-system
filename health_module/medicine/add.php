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
    <h1 class="m-0 text-dark" id="heading" name="heading">Medicine Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Medicine</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Medicine Add</li>
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
        <form role="form" method="POST" id="medicine" class="medicine">
          <input type="hidden" id="med_id" name="med_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="med_name">Medicine Name <!-- <span class="text-red">*</span> --></label>
                  <input type="text" class="form-control" id="med_name" name="med_name" placeholder="Enter Name">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="med_gen_name">Generic Name</label>
                  <input type="text" class="form-control" id="med_gen_name" name="med_gen_name" placeholder="Enter Generation">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="med_purpose">Medicine Use Purpose</label>
                  <input type="text" class="form-control" id="med_purpose" name="med_purpose" placeholder="Enter Purpose">
              </div>
<!--               <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="med_price_in_set">Price in Set</label>
                  <input type="text" class="form-control" id="med_price_in_set" name="med_price_in_set" placeholder="Enter Price">
              </div> -->
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="med_unit">Unit <!-- <span class="text-red">*</span> --></label>
                  <select class="form-control" name="med_unit" id="med_unit">
                    <?php echo filled_medicine_unit($connect); ?>
                  </select>
              </div>
              <!-- <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="med_amount">Medicine Amount</label>
                  <input type="text" class="form-control" id="med_amount" name="med_amount" placeholder="Enter Amount">
              </div> -->
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                  <label for="unit_price">Unit Price <!-- <span class="text-red">*</span> --></label>
                  <input type="text" class="form-control" id="unit_price" name="unit_price" placeholder="Enter Price">
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
    var med_id = '';
    med_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // med_id = Math.round(med_id-.5);
    med_id = Math.round(med_id);
    // alert(med_id);
    if (med_id != Number.isNaN(NaN) || med_id != '') {
      // alert("ID = "+med_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {med_id: med_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#med_id').val(data.med_id); 
          $('#med_name').val(data.med_name); 
          $('#med_gen_name').val(data.med_gen_name);
          $('#med_purpose').val(data.med_purpose);
          $('#med_unit').val(data.med_unit);
          $('#unit_price').val(data.unit_price);

          $('#heading').html("Medicine Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
////////////// Insert
    $(document).on('submit', '#medicine', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#medicine')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
