<?php
$connect = "";
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
include_once "../../dashboard/info_store/function.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>

<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Food Place Food Tracking Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Food Place Food Tracking</a>
      </li>
      <li class="breadcrumb-item active" id="heading" name="heading">Food Place Food Tracking Add</li>
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
        <form role="form" method="POST" id="fpft" class="fpft">

          <input type="hidden" id="fpft_id" name="fpft_id" class="fpft_id" >

          <div class="card-body">
            <div class="row">


              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="select_date">Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control select_date" id="select_date" name="select_date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="time">Time</label>
                <input type="time" class="form-control time" id="time" name="time">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="total_food_amount">Total food Amount</label>
                <input type="number" class="form-control total_food_amount" id="total_food_amount" name="total_food_amount" placeholder="Cow Avg Weight">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="total_wastage">Total Wastage</label>
                <input type="number" class="form-control" id="total_wastage" name="total_wastage" placeholder="Cow Avg Weight">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="chari_no">Chari No <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="chari_no" name="chari_no" >
                  <?php echo filled_chari($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="feeding_formula_no">Feeding Formula No</label>
                <select class="form-control" id="feeding_formula_no" name="feeding_formula_no" >
                  <?php echo filled_food_formula($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="farm_id">Firm <!-- <span class="text-red">*</span> --></label>
                <select class="form-control farm_id" id="farm_id" name="farm_id" >
                  <?php echo filled_farm_name($connect) ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control remarks" id="remarks" name="remarks"
                       placeholder=" Remarks ">
              </div>
            </div>

            <div class="row">

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="food">Food </label>
                <select class="form-control food" id="food" name="food" >
                  <?php echo filled_food_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="unit">Unit</label>
                <select  class="form-control unit" id="unit" name="unit" >
                  <?php echo filled_food_formula_unit_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="amount">Amount <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control amount" id="amount" name="amount"
                       placeholder=" Amount ">
              </div>
              <div class="form-group col-sm-12 col-md-12 col-lg-12" align="right">
                <p id="demo"></p>
                  <button type="button" name="add_to_table" id="add_to_table"
                                        class="badge badge-success btn-xs">Add To Table
                                </button>
              </div>

            </div>
            <div class="row">
              <div class="form-group col-sm-12 col-md-12 col-lg-12" align="right">

                    <div class="panel-heading">
                        <div class="panel-body">
                            <table id="stockin_data1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
<!--                                    <th>ID</th>-->
                                    <th>Food</th>
<!--                                  <th>Unit ID</th>-->
                                    <th>Unit</th>
                                    <th>Amount</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

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
  $(document).ready(function () {

    document.getElementById("action").disabled = true;

//////////////////////////////// MODAL TABLE ADD

        $('#add_to_table').click(function () {

// alert("BOLOD");

            var food = document.getElementById("food").value;
          var e = document.getElementById("food");
          var food_name = e.options[e.selectedIndex].text;
            // alert(food);
            var unit = document.getElementById("unit").value;
            // alert(unit);

            var f = document.getElementById("unit");
            var unit_name = f.options[f.selectedIndex].text;
            // alert(unit_name);

            var amount = document.getElementById("amount").value;
            // alert(amount);

            var details_id = "0";
            var master_id = "0";


            if (isNaN(amount) || amount == "") {
                // alert("QTY & Price should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>amount field can not be empty and Character</b>";
            } else if (amount < 1) {
                // alert("QTY & Price should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>amount field can not be less than One</b>";
            } else {
                //alert ()

                $('#stockin_data1').append($('<tr>')
                    // .append($('<td>').append(product_id))
                    .append($('<td   style="display:none;" >').append(food))
                  .append($('<td>').append(food_name))

                  .append($('<td  style="display:none;">').append(unit))
                  .append($('<td>').append(unit_name))

                  ////////////////// contenteditable="true" , It makes table cell editable. Use it carefully.

                  .append($('<td contenteditable="true">').append(amount))

                    .append($('<td style="display:none;">').append(details_id))
                    .append($('<td style="display:none;">').append(master_id))
                    .append($('<td> <button class="btn-remove-data badge badge-danger">Remove</button></td>'))
                )
            }

            var tablerow = document.getElementById("stockin_data1").rows.length;
    // document.getElementById("demo").innerHTML = "Found " + tablerow + " tr elements in the table.";
            if (tablerow > 1) {
                document.getElementById("action").disabled = false;
            }
            if (tablerow < 2) {
                document.getElementById("action").disabled = true;
            }

        });


//////////////////////////////////////// REMOVE BUTTON

        $("#stockin_data1").on('click', '.btn-remove-data', function () {

            // alert ('start-remove');
            $(this).parents("tr").remove();

            var tablerow = document.getElementById("stockin_data1").rows.length;
            // document.getElementById("demo").innerHTML = "Found " + tablerow + " tr elements in the table.";

            if (tablerow > 1) {
                document.getElementById("action").disabled = false;
            }
            if (tablerow < 2) {
                document.getElementById("action").disabled = true;

            }

        });

  });
</script>
<?php
if(isset($_GET['id']))
{
  ?>
<script type="text/javascript">
  $(document).ready(function () {


    var url = document.URL;
    // alert(url);
    var id = url.substring(url.lastIndexOf('=') + 1);
    // alert(id);
    var fpft_id = '';
    fpft_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // fpft_id = Math.round(fpft_id-.5);
    fpft_id = Math.round(fpft_id);
    // alert(fpft_id);



      // alert("ID = "+fpft_id);

      var btn_action = 'fetch_single';
    document.getElementById("action").disabled = false;

    document.getElementById("fpft_id").value = fpft_id;

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {fpft_id: fpft_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(fpft_id);
          // alert(data);

          var len = data.length;
          var len2 = len - 1;

          $('.fpft_id').val(fpft_id);
          // $('#rawqc_id').html("<input type='hidden' id='store_requisition_master_id' name='store_requisition_master_id' value='" + store_requisition_master_id + "'>");
          $('#select_date').val(data[len2].select_date);
          $('#time').val(data[len2].time);
          $('#chari_no').val(data[len2].chari_no);
          $('#feeding_formula_no').val(data[len2].feeding_formula_no);
          $('#total_food_amount').val(data[len2].total_food_amount);
          $('#total_wastage').val(data[len2].total_wastage);
          $('#farm_id').val(data[len2].farm_id);
          $('#remarks').val(data[len2].remarks);

          // var len = data.length;
          for (i = 0; i < len - 1; i++) {

            $('#stockin_data1').append($('<tr>')
              .append($('<td style="display:none;">').append(data[i].product))
              .append($('<td>').append(data[i].product))
              .append($('<td style="display:none;">').append(data[i].unit))
              .append($('<td>').append(data[i].unit))
              .append($('<td>').append(data[i].amount))

              .append($('<td style="display:none;">').append(data[i].details_id))
              .append($('<td style="display:none;">').append(data[i].master_id))
              .append($('<td> <button class="btn-remove-data badge badge-danger">Remove</button></td>'))
            )
          }


          $('#heading').html(" Food Place Food Tracking Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');

          $('#btn_action').val('Edit');
        }
      })


  });

</script>
<?php
}
?>
<script type="text/javascript">
  $(document).ready(function () {

////////////// Insert
    $(document).on('submit', '#fpft', function (event) {
      event.preventDefault();


      ////////// Dynamic Table Data

      var tabledata = new Array();

      $('#stockin_data1 tr').each(function (row, tr) {
        tabledata[row] = {
          "food": $(tr).find('td:eq(0)').text()
          , "food_name": $(tr).find('td:eq(1)').text()
          , "unit": $(tr).find('td:eq(2)').text()
          , "unit_name": $(tr).find('td:eq(3)').text()
          , "amount": $(tr).find('td:eq(4)').text()
          , "details_id": $(tr).find('td:eq(5)').text()
          , "master_id": $(tr).find('td:eq(6)').text()

        }
      });


      tabledata.shift();  // first row is the table header - so remove

      tabledata = JSON.stringify(tabledata); //// When sending data to a web server, the data has to be a string.  Convert a JavaScript object into a string with JSON.stringify().
      tabledata = JSON.stringify(tabledata); //// When sending data to a web server, the data has to be a string.  Convert a JavaScript object into a string with JSON.stringify().


      $.ajax({
        url: "action.php",
        method: "POST",
        data: {
          // requistion_number: requistion_number,
          fpft_id: $("input[name='fpft_id']").val(),
          select_date: $("input[name='select_date']").val(),
          time: $("input[name='time']").val(),
          total_food_amount: $("input[name='total_food_amount']").val(),
          total_wastage: $("input[name='total_wastage']").val(),
          chari_no: $("select[id='chari_no']").val(),
          feeding_formula_no: $("select[id='feeding_formula_no']").val(),

          farm_id: $("select[name='farm_id']").val(),
          remarks: $("input[name='remarks']").val(),
          btn_action: $("input[name='btn_action']").val(),
          tabledata: tabledata
        },
        success: function (data) {
          $('#fpft')[0].reset();

          var table = document.getElementById("stockin_data1");
          //or use :  var table = document.all.tableid;
          for (var i = table.rows.length - 1; i > 0; i--) {
            table.deleteRow(i);
          }
          // $('#fpft')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });


  });


</script>
