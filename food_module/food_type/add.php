<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Food Type Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Food Type</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Food Type Add</li>
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
        <form role="form" method="POST" id="food_type" class="food_type">
          <input type="hidden" id="food_type_id" name="food_type_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="food_type_name">Food Type Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="food_type_name" name="food_type_name" placeholder="Enter Food Type Name">
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
    var food_type_id = '';
    food_type_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // food_type_id = Math.round(food_type_id-.5);
    food_type_id = Math.round(food_type_id);
    // alert(food_type_id);
    if (food_type_id != Number.isNaN(NaN) || food_type_id != '') {
      // alert("ID = "+food_type_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {food_type_id: food_type_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(food_type_id);
          // alert(data);
          $('#food_type_id').val(data.food_type_id); 
          $('#food_type_name').val(data.food_type_name); 
          $('#food_type_type').val(data.food_type_type);
          $('#food_type_desc').val(data.food_type_desc);

          $('#heading').html("Food Type Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#food_type', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#food_type')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
