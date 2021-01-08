<?php
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
include_once "../../dashboard/info_store/function.php";
$id = 0;
$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Cattle Profile</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Cattle Profile</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Cattle Profile</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>


<div id="divToPrint">
    <!-- <button class="print-link avoid-this btn btn-info mb-3">Print</button> -->
    <!--<a href="bill_statement_report.php"><button class="btn btn-primary">PDF</button></a>-->
    <style type="text/css">
    .footer {
    position: fixed;
    bottom: 0;
    }
    
    .myTable { background-color:transparent;border-collapse:collapse; }
    .myTable th { background-color:transparent;width:0%; border-width:0px; }
    .myTable td { padding:5px;border:1px solid #ddd; }
    .myTable  td {
    border-bottom: 1px solid #ddd;
    }
    </style>
    <div class="row invoice-info">
      <div class="col-sm-1 invoice-col"></div>
      <div class="col-sm-10 invoice-col" align="center">
      <!-- <h4> Cattle Profile Report - CIMS </h4>  -->  
      </div>
      <div class="col-sm-1 invoice-col"></div>
    </div>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center mb-3">
                  <img src="" alt="" id="targetLayer" name="targetLayer" height="100px">
                </div>
                <ul>
                  <li class="list-group-item"><strong>ID</strong> <p id="cattle_profile_id" class="float-right"> <?php echo $id; ?></p></li>
                  <li class="list-group-item"><strong>Code</strong> <p id="cattle_code" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Birth Date</strong> <p id="birth_date" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Animal Type</strong> <p id="animal_type" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Age</strong> <p id="age" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Gender</strong> <p id="gender" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Farm</strong> <p id="farm" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Mother ID</strong> <p id="mother_id" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Father ID</strong> <p id="father_id" class="float-right"></p></li>
                </ul>
    
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body">
                <ul>                  
                  <li class="list-group-item"><strong>Height</strong> <p id="height" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Width</strong> <p id="width" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Length</strong> <p id="length" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Weight</strong> <p id="weight" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Teeth</strong> <p id="teeth" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Horn</strong> <p id="horn" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Birth Weight</strong> <p id="birth_weight" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Weaning Weight</strong> <p id="weaning_weight" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Special Sign</strong> <p id="special_sign" class="float-right"></p></li>             
                  <li class="list-group-item"><strong>Proble Type</strong> <p id="problem_type" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Problem Details</strong> <p id="problem_details" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Status</strong> <p id="status" class="float-right"></p></li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body">
                <ul>
                  <li class="list-group-item"><strong>Conception type</strong> <p id="conception_type" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Ear tag</strong> <p id="ear_tag" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Ear Tag color</strong> <p id="ear_tag_color" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Electronic Ear Tag</strong> <p id="electronic_ear_tag" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Other Tag</strong> <p id="other_tag" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Brand</strong> <p id="brand" class="float-right"></p></li>
                  
                  <li class="list-group-item"><strong>Castrated</strong> <p id="castrated" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Castrated Date</strong> <p id="castrated_date" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Remarks</strong> <p id="remarks" class="float-right"></p></li>
                  
                  
                  <li class="list-group-item"><strong>Buy or Birth</strong> <p id="buy_or_birth" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Buy Price</strong> <p id="buy_price" class="float-right"></p></li>
                  <li class="list-group-item"><strong>Buy Date</strong> <p id="buy_date" class="float-right"></p></li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

<br>
    <!-- <div class="footer hide">
      <img src="../../dist/img/gg.png">
    </div> -->
  </div>
  </div>
      <!-- /.card-body -->
    </div>
    <!-- /.row -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content-wrapper -->
<?php include_once "../../dashboard/index/footer.php"; ?>
<script src="../../dist/js/jquery.print.js"></script>
<script type="text/javascript">
jQuery(function ($) {
$("#divToPrint").find('button').on('click', function () {
$("#divToPrint").print({
//Use Global styles
globalStyles: false,
//Add link with attrbute media=print
mediaPrint: false,
//Custom stylesheet
stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",
//Print in a hidden iframe
iframe: false,
//Don't print this
noPrintSelector: ".avoid-this",
//Add this at top
prepend: "",
//Add this on bottom
append: "",
//Log to console when printing is done via a deffered callback
deferred: $.Deferred().done(function () {
console.log('Printing done', arguments);
})
});
});
});
</script>
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

          $('#cattle_profile_id').html(data.cattle_profile_id);
          $('#cattle_code').html(data.cattle_code);
          $('#ear_tag').html(data.ear_tag);
          $('#ear_tag_color').html(data.ear_tag_color);
          $('#electronic_ear_tag').html(data.electronic_ear_tag);
          $('#other_tag').html(data.other_tag);
          $('#brand').html(data.brand);
          $('#animal_type').html(data.animal_type);
          $('#conception_type').html(data.conception_type);
          $('#birth_date').html(data.birth_date);
          $('#birth_weight').html(data.birth_weight);
          $('#weaning_weight').html(data.weaning_weight);
          $('#castrated').html(data.castrated);
          $('#castrated_date').html(data.castrated_date);
          $('#gender').html(data.gender);
          $('#height').html(data.height);
          $('#width').html(data.width);
          $('#length').html(data.length);
          $('#weight').html(data.weight);
          $('#teeth').html(data.teeth);
          $('#color').html(data.color);
          $('#special_sign').html(data.special_sign);
          $('#horn').html(data.horn);
          $('#farm').html(data.farm);
          $('#remarks').html(data.remarks);
          $('#status').html(data.status);
          $('#age').html(data.age);
          $('#problem_type').html(data.problem_type);
          $('#problem_details').html(data.problem_details);
          $('#mother_id').html(data.mother_id);
          $('#father_id').html(data.father_id);
          $('#buy_or_birth').html(data.buy_or_birth);
          $('#buy_price').html(data.buy_price);
          $('#buy_date').html(data.buy_date);

          $('#cattle_profile_pic_url').val(data.cattle_profile_pic);
          $('#targetLayer').attr('src', data.cattle_profile_pic);

          $('#heading').html("Cattle Profile");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');

          // $('#problem_area option').eq(0).prop('selected',true);

          // $('#problem_area').select2(data.problem_area);


// $('#problem_area').select2({
//   // ...
//   templateSelection: function (data, container) {
//     // Add custom attributes to the <option> tag for the selected option
//     $(data.element).attr('data-custom-attribute', data.problem_area);
//     return data.text;
//   }
// });

// // Retrieve custom attribute value of the first selected element
// $('#problem_area').find(':selected').data('custom-attribute');

          var pa = data.problem_area;


          var baa = new Array();
          var c = 0;
          for(var i = 0; i<pa.length; i++)
          {
            if(pa[i] != ',' || pa[i] != ' '){
              // alert(pa[i]);
              baa[c] = pa[i];
              c++;
              // $('#problem_area').val(pa[i]).trigger('change');
            }
          }

          var element = document.getElementById('problem_area');

          for (var i = 0; i < element.options.length; i++) {
              element.options[i].selected = baa.indexOf(element.options[i].value) >= 0;
          }

            // Get Value
            var selectedItens = Array.from(element.selectedOptions)
                    .map(option => option.value);


              spanSelectedItens.innerHTML = selectedItens;

          //     $('#problem_area').val(0).trigger('change');

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
