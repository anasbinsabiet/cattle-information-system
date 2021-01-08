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
    <h1 class="m-0 text-dark" id="heading" name="heading">Growth Tracking Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Growth Tracking</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Growth Tracking Add</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="alert" role="alert" id="alert_action" style="display: none;"></div>
        <form role="form" method="POST" id="growth_tracking" class="growth_tracking">

          <input type="hidden" id="growth_tracking_id" name="growth_tracking_id" value="">

          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="cattle_code">Cattle Code</label>
                <select class="form-control" id="cattle_code" name="cattle_code">
                  <?php echo filled_cattle_code($connect); ?>
                </select>
              </div>
              
              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="select_date">Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control select_date" id="select_date" name="select_date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="weight">Weight <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control weight" id="weight" name="weight" placeholder="Enter Weight">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="height">Height</label>
                <input type="number" class="form-control height" id="height" name="height" placeholder="Enter Height">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="width">Width</label>
                <input type="number" class="form-control width" id="width" name="width" placeholder="Enter Width">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="length">Length</label>
                <input type="number" class="form-control length" id="length" name="length" placeholder="Enter Length">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="teeth">Teeth</label>
                <input type="number" class="form-control teeth" id="teeth" name="teeth" placeholder="Enter Teeth">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="age">Age</label>
                <input type="number" class="form-control age" id="age" name="age" placeholder="Enter Age">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" >
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control remarks" id="remarks" name="remarks" onkeypress="return /[a-z]/i.test(event.key)" placeholder="Enter Remarks">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="growth_tracking_pic1">File Input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="growth_tracking_pic" name="growth_tracking_pic">
                    <label class="custom-file-label" for="growth_tracking_pic1">Choose file</label>
                  </div>
                  <!--                  <div class="input-group-append">-->
                  <!--                    <span class="input-group-text" id="upload" name="upload">Upload</span>-->
                  <!--                  </div>-->
                </div>
                <!--                <img id="targetLayer" name="targetLayer">No Image-->
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="growth_tracking_pic_url" name="growth_tracking_pic_url">
              </div>
            </div>
            <!-- <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <input type="hidden" name="btn_action" id="btn_action" name="btn_action" value="Add"/>
            <button type="submit" id="action" name="action" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>

    <!-- /.row -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->

<?php
include_once "../../dashboard/index/footer.php";
?>
<script type="text/javascript">
  $(document).ready(function (e) {




    $('#growth_tracking_pic').change(function () {
      var file_data = $('#growth_tracking_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('growth_tracking_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#growth_tracking_pic_url").val(data);
        }
      });
    });
  });
</script>
<?php if(isset($_GET['id'])){ ?>
<script type="text/javascript">
  $(document).ready(function () {


    var url = document.URL;
    // alert(url);
    var id = url.substring(url.lastIndexOf('=') + 1);
    // alert(id);
    var growth_tracking_id = '';
    growth_tracking_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // growth_tracking_id = Math.round(growth_tracking_id-.5);
    growth_tracking_id = Math.round(growth_tracking_id);
    // alert(growth_tracking_id);
    if (growth_tracking_id != Number.isNaN(NaN) || growth_tracking_id != '') {

      // alert("ID = "+growth_tracking_id);

      var btn_action = 'fetch_single';

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {growth_tracking_id: growth_tracking_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(growth_tracking_id);
          // alert(data);

          $('#growth_tracking_id').val(data.growth_tracking_id); 
          $('#cattle_code').val(data.cattle_code); 
          $('#select_date').val(data.select_date);

          $('#weight').val(data.weight);
          $('#height').val(data.height);
          $('#width').val(data.width);
          $('#length').val(data.length);
          $('#teeth').val(data.teeth);
          $('#age').val(data.age);
          $('#remarks').val(data.remarks);
          
          $('#growth_tracking_pic_url').val(data.growth_tracking_pic_url);
          $('#targetLayer').attr('src', data.growth_tracking_pic_url);

          $('#heading').html(" Growth Tracking Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })

    }
  });

</script>

<?php } ?>

<script type="text/javascript">
  $(document).ready(function () {

    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#growth_tracking', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#growth_tracking')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });


  });


</script>
