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
    <h1 class="m-0 text-dark" id="heading" name="heading">Cattle Profile Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Cattle Profile</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Cattle Profile Add</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">

    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="alert" role="alert" id="alert_action" style="display: none;"></div>
        <form role="form" method="POST" id="cattle_profile" class="cattle_profile">
          <?php
          //          if ($id != 0) {
          ?>
          <input type="hidden" id="cattle_profile_id" name="cattle_profile_id" value="<?php //echo round($id,0); ?>">
          <?php
          //}
          ?>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="cattle_code">Cattle Code</label>
                <input type="text" class="form-control" id="cattle_code" name="cattle_code" placeholder="Cattle Code will be set after submission" readonly="">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="ear_tag">Ear Tag</label>
                <select class="form-control" id="ear_tag" name="ear_tag">
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="etc">
                <label for="ear_tag_color">Ear Tag Color</label>
                <select class="form-control" id="ear_tag_color" name="ear_tag_color" placeholder="Enter Ear Tag Color">
                  <?php echo filled_color_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="eet">
                <label for="electronic_ear_tag">Electronic Ear Tag <!-- <span class="text-red">*</span> --></label>
                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" id="electronic_ear_tag" name="electronic_ear_tag" placeholder="Enter Electronic Ear Tag">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="other_tag">Other Tag</label>
                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" id="other_tag" name="other_tag" placeholder="Enter Other Tag">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="brand">Brand Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" id="brand" name="brand" placeholder="Enter Brand Name">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="animal_type">Animal Type</label>
                <select class="form-control" id="animal_type" name="animal_type" placeholder="Enter Animal Type">
                  <?php echo filled_animal_type_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="birth_date">Birth Date</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date"
                       placeholder="Enter Birth Date">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="birth_weight">Birth Weight <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="birth_weight" name="birth_weight"
                       placeholder="Enter Birth Weight">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="weaning_date">Weaning Date</label>
                <input type="date" class="form-control" id="weaning_date" name="weaning_date"
                       placeholder="Enter Weaning Date">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="weaning_weight">Weaning Weight <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="weaning_weight" name="weaning_weight"
                       placeholder="Enter Weaning Weight">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="castrated">Castrated</label>
                <select class="form-control" id="castrated" name="castrated" placeholder="Enter Castrated">
                  <option value="No">No</option>
                  <option value="Yes">Yes</option>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="castrated_date">Castrated Date</label>
                <input type="date" class="form-control" id="castrated_date" name="castrated_date"
                       placeholder="Enter Castrated Date">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="conception_type">Conception Type</label>
                <select class="form-control" id="conception_type" name="conception_type"
                        placeholder="Enter Conception Type">
                  <option value="">SELECT Conception Type</option>
                  <option value="Artificial Insemination">Artificial Insemination</option>
                  <option value="Natural Selection">Natural Selection</option>
                  <option value="Others">Others</option>
                </select>
              </div>

              <!--              ////////////////////////////////////// NEW INPUTS END ///////////////////-->

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="height">Height <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="height" name="height" placeholder="Height">
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="width">Width <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="width" name="width" placeholder="Width">
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="length">Length <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="length" name="length" placeholder="Length">
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="weight">Current Weight <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="weight">
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="cattle_kin">Cattle Kin</label>
                <select class="form-control" id="cattle_kin" name="cattle_kin">
                  <?php echo filled_cattle_kin($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="teeth">Teeth <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="teeth" name="teeth" placeholder="teeth">
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="color">Color</label>
                <select class="form-control" id="color" name="color">
                  <?php echo filled_color_name($connect); ?>
                </select>
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="special_sign">Special Sign <!-- <span class="text-red">*</span> --></label>
                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" id="special_sign" name="special_sign"
                       placeholder="special_sign">
              </div>
              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="horn">Horn</label>
                <select class="form-control" id="horn" name="horn">
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="farm">Farm</label>
                <select class="form-control" id="farm" name="farm">
                  <?php echo filled_farm_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="remarks">Remarks</label>
                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control" id="remarks" name="remarks" placeholder="remarks">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                  <?php echo filled_cattle_status($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="age">Age <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="age" name="age" placeholder="age">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="problem_type">Problem Type</label>
                <select class="form-control" id="problem_type" name="problem_type">
                  <?php echo filled_problem_type($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="problem_details">Problem Details</label>
                <input type="text" class="form-control" id="problem_details" name="problem_details"
                       placeholder="problem_details">
              </div>


              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="problem_area">Problem Area</label>
                <select class="form-control" id="problem_area" name="problem_area">
                  <?php echo filled_problem_area($connect); ?>
                </select>
              </div>

              <!-- <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="problem_area">Problem Area</label>
                <select class="form-control select2 problem_area" multiple="multiple" id="problem_area" name="problem_area[]">
                  <?php echo filled_problem_area($connect); ?>
                </select>
              </div> -->


              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="mother_id">Mother</label>
                <select class="form-control" id="mother_id" name="mother_id">
                  <?php echo filled_cattle_code($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="father_id">Father</label>
                <select class="form-control" id="father_id" name="father_id">
                  <?php echo filled_cattle_code($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="buy_or_birth">Purchased/Raised</label>
                <select class="form-control" id="buy_or_birth" name="buy_or_birth">
                  <option value="Purchased">Purchased</option>
                  <option value="Raised">Raised</option>
                </select>
              </div>


              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="buy_prices">
                <label for="buy_price">Purchase Price</label>
                <input type="text" onkeypress="return /[a-z]/i.test(event.key)" class="form-control buy_price" id="buy_price" name="buy_price"
                       placeholder=" Purchase Price ">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="buy_dates">
                <label for="buy_date">Purchase Date</label>
                <input type="date" class="form-control buy_date" id="buy_date" name="buy_date" placeholder="">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3">
                <label for="cattle_profile_pic1">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="cattle_profile_pic" name="cattle_profile_pic">
                    <label class="custom-file-label" for="cattle_profile_pic1">Choose file</label>
                  </div>
                  <!--                  <div class="input-group-append">-->
                  <!--                    <span class="input-group-text" id="upload" name="upload">Upload</span>-->
                  <!--                  </div>-->
                </div>
                <!--                <img id="targetLayer" name="targetLayer">No Image-->
                <img src="" alt="" id="targetLayer" name="targetLayer" width="100px">
                <input type="hidden" id="cattle_profile_pic_url" name="cattle_profile_pic_url">
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

    $('#buy_or_birth').change(function () {
      if ($('#buy_or_birth').val() == 'Purchased') {
        $('#buy_prices').attr('style', "visibility:visible");
        $('#buy_dates').attr('style', "visibility:visible");
      } else {
        $('#buy_prices').attr('style', "visibility:hidden");
        $('#buy_dates').attr('style', "visibility:hidden");

      }
    });

    $('#ear_tag').change(function () {
      if ($('#ear_tag').val() == 'Yes') {
        $('#etc').attr('style', "visibility:visible");
        $('#eet').attr('style', "visibility:visible");
      } else {
        $('#etc').attr('style', "visibility:hidden");
        $('#eet').attr('style', "visibility:hidden");

      }
    });


    $('#cattle_profile_pic').change(function () {
      var file_data = $('#cattle_profile_pic').prop('files')[0];
      var form_data = new FormData();
      // alert(file_data);
      // alert(form_data);
      form_data.append('cattle_profile_pic', file_data);
      $.ajax({
        url: "action.php",
        type: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
          $("#targetLayer").attr('src', data);
          $("#cattle_profile_pic_url").val(data);
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
    var cattle_profile_id = '';
    cattle_profile_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // cattle_profile_id = Math.round(cattle_profile_id-.5);
    cattle_profile_id = Math.round(cattle_profile_id);
    // alert(cattle_profile_id);
    if (cattle_profile_id != Number.isNaN(NaN) || cattle_profile_id != '') {

      // alert("ID = "+cattle_profile_id);

      var btn_action = 'fetch_single';

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {cattle_profile_id: cattle_profile_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(cattle_profile_id);
          // alert(data);

          $('#cattle_profile_id').val(data.cattle_profile_id);

          $('#cattle_code').val(data.cattle_code);
          $('#ear_tag').val(data.ear_tag);
          $('#ear_tag_color').val(data.ear_tag_color);
          $('#electronic_ear_tag').val(data.electronic_ear_tag);
          $('#other_tag').val(data.other_tag);
          $('#brand').val(data.brand);
          $('#animal_type').val(data.animal_type);
          $('#conception_type').val(data.conception_type);
          $('#birth_date').val(data.birth_date);
          $('#birth_weight').val(data.birth_weight);
          $('#weaning_date').val(data.weaning_date);
          $('#weaning_weight').val(data.weaning_weight);
          $('#castrated').val(data.castrated);
          $('#castrated_date').val(data.castrated_date);
          $('#gender').val(data.gender);
          $('#height').val(data.height);
          $('#width').val(data.width);
          $('#length').val(data.length);
          $('#weight').val(data.weight);
          $('#cattle_kin').val(data.cattle_kin);
          $('#teeth').val(data.teeth);
          $('#color').val(data.color);
          $('#special_sign').val(data.special_sign);
          $('#horn').val(data.horn);
          $('#farm').val(data.farm);
          $('#remarks').val(data.remarks);
          $('#status').val(data.status);
          $('#age').val(data.age);
          $('#problem_type').val(data.problem_type);
          $('#problem_details').val(data.problem_details);
          $('#problem_area').val(data.problem_area);
          $('#mother_id').val(data.mother_id);
          $('#father_id').val(data.father_id);
          $('#buy_or_birth').val(data.buy_or_birth).trigger(data.buy_or_birth);
          $('.buy_price').val(data.buy_price);
          $('.buy_date').val(data.buy_date);
          $('#cattle_profile_pic_url').val(data.cattle_profile_pic);
          $('#targetLayer').attr('src', data.cattle_profile_pic);

          $('#heading').html("Cattle Profile Edit");
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
    $(document).on('submit', '#cattle_profile', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      var problem_area = $('.problem_area').val();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        problem_area: problem_area,
        success: function (data) {
          $('#cattle_profile')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });




  });


</script>
