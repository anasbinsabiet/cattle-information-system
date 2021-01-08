<?php
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Cattle Food Tracking Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Cattle Food Tracking</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Cattle Food Tracking Add</li>
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
        <form role="form" method="POST" id="land_task" class="land_task">
          <input type="hidden" id="cft_id" name="cft_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="cattle_code">Cattle Code</label>
                <select class="form-control" id="cattle_code" name="cattle_code">
                  <option value="">Select</option>
                  <option value="1">Cattle 1</option>
                  <option value="2">Cattle 2</option>
                  <option value="3">Cattle 3</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="chari_no">Chari No</label>
                <select class="form-control" id="chari_no" name="chari_no">
                  <option value="">Select</option>
                  <option value="1">Chari 1</option>
                  <option value="2">Chari 2</option>
                  <option value="3">Chari 3</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="feeding_formula_number">Feeding Formula Number</label>
                <input type="text" class="form-control" id="feeding_formula_number" name="feeding_formula_number" placeholder="Feeding Formula Number">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="avg_amount_of_food">Avg. Amount of Food</label>
                <input type="number" class="form-control" id="avg_amount_of_food" name="avg_amount_of_food" placeholder="Enter Amount">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks">
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
    var cft_id = '';
    cft_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // cft_id = Math.round(cft_id-.5);
    cft_id = Math.round(cft_id);
    // alert(cft_id);
    if (cft_id != Number.isNaN(NaN) || cft_id != '') {
      // alert("ID = "+cft_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {cft_id: cft_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          $('#cft_id').val(data.cft_id); 
          $('#cattle_code').val(data.cattle_code); 
          $('#date').val(data.date);
          $('#chari_no').val(data.chari_no);
          $('#feeding_formula_number').val(data.feeding_formula_number);
          $('#avg_amount_of_food').val(data.avg_amount_of_food);
          $('#remarks').val(data.remarks);

          $('#heading').html("Cattle Food Tracking Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
////////////// Insert
    $(document).on('submit', '#land_task', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#land_task')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
