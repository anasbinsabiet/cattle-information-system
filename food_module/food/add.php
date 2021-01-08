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
    <h1 class="m-0 text-dark" id="heading" name="heading">Food Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Food</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Food Add</li>
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
        <form role="form" method="POST" id="food" class="food">
          <input type="hidden" id="food_id" name="food_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="food_name">Food Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Enter Food">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6" >
                <label for="food_type">Food Type</label>
                <select class="form-control" id="food_type" name="food_type">
                  <?php echo filled_food_type_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="food_desc">Description</label>
                <input type="text" class="form-control" id="food_desc" name="food_desc" placeholder="Enter Description">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="unit">Unit <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="unit" name="unit">
                  <?php echo filled_food_formula_unit_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="unit_price">Unit Price <!-- <span class="text-red">*</span> --></label>
                <input type="NUMBER" class="form-control" id="unit_price" name="unit_price" placeholder="Enter Unit Price">
              </div>
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="food_pic1">Image Upload</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="food_pic" name="food_pic">
                    <label class="custom-file-label" for="food_pic1">Choose file</label>
                  </div>
                </div>
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="food_pic_url" name="food_pic_url">
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
    var food_id = '';
    food_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // food_id = Math.round(food_id-.5);
    food_id = Math.round(food_id);
    // alert(food_id);
    if (food_id != Number.isNaN(NaN) || food_id != '') {
      // alert("ID = "+food_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {food_id: food_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(food_id);
          // alert(data);
          $('#food_id').val(data.food_id); 
          $('#food_name').val(data.food_name); 
          $('#food_type').val(data.food_type);
          $('#food_desc').val(data.food_desc);
          $('#unit').val(data.unit);
          $('#unit_price').val(data.unit_price);
          $('#food_pic_url').val(data.food_pic);
          $('#targetLayer').attr('src', data.food_pic);

          $('#heading').html("Food Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#food', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#food')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });

    $('#food_pic').change(function () {
      var file_data = $('#food_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('food_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#food_pic_url").val(data);
        }
      });
    });

    
  });  //////////// Ready Function
</script>
