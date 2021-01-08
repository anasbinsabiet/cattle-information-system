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
    <h1 class="m-0 text-dark" id="heading" name="heading">Food Formula Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Food Formula</a>
      </li>
      <li class="breadcrumb-item active" id="heading" name="heading">Food Formula Add</li>
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

        <form role="form" method="POST" id="food_formula" class="food_formula">

          <input type="hidden" id="food_formula_id" name="food_formula_id" class="food_formula_id" >

          <div class="card-body">
            <div class="row">

              <div class="form-group col-sm-6 col-md-4 col-lg-4">
                <label for="formula_code">Formula Code</label>
                <input type="text" class="form-control" id="formula_code" name="formula_code" placeholder="Formula Code will be set after submission" readonly="">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="select_date">Date</label>
                <input type="date" class="form-control select_date" id="select_date" name="select_date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="number">Total Cost <!-- <span class="text-red">*</span> --></label>
                <input type="text-dark" class="form-control total_cost" id="total_cost" name="total_cost" placeholder="Enter Amount">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="total_qty">Total Quantity <!-- <span class="text-red">*</span> --></label>
                <input type="number" class="form-control" id="total_qty" name="total_qty"
                       placeholder="Total Quantity">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control remarks" id="remarks" name="remarks"
                       placeholder=" Remarks ">
              </div>
            </div>

            <div class="row">

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="food">Food </label>
                <select class="form-control food" id="food" name="food" >
                  <?php echo filled_food_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="unit">Unit</label>
                <select  class="form-control unit" id="unit" name="unit" >
                  <?php echo filled_food_formula_unit_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control quantity" id="quantity" name="quantity"
                       placeholder="Enter Quantity ">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="unit_cost">Unit Cost</label>
                <input type="number" class="form-control unit_cost" id="unit_cost" name="unit_cost"
                       placeholder="Unit Cost">
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
                                    <th>Food</th>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

              </div>
              
            </div>

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

    $('#source').change(function () {
      if ($('#source').val() == 'Land') {
        $('#land_collection').attr('style', "visibility:visible");
        // $('#buy_dates').attr('style', "visibility:visible");
      } else {
        $('#land_collection').attr('style', "visibility:hidden");
        // $('#buy_dates').attr('style', "visibility:hidden");

      }
    });



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

            var quantity = document.getElementById("quantity").value;
            var unit_cost = document.getElementById("unit_cost").value;
            // alert(quantity);

            var details_id = "0";
            var master_id = "0";


            if (isNaN(quantity) || quantity == "") {
                // alert("QTY & Price should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>quantity field can not be empty and Character</b>";
            } else if (quantity < 1) {
                // alert("QTY & Price should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>quantity field can not be less than One</b>";
            } else {
                //alert ()

                $('#stockin_data1').append($('<tr>')
                    // .append($('<td>').append(product_id))
                    .append($('<td   style="display:none;" >').append(food))
                  .append($('<td>').append(food_name))

                  .append($('<td  style="display:none;">').append(unit))
                  .append($('<td>').append(unit_name))

                  ////////////////// contenteditable="true" , It makes table cell editable. Use it carefully.

                  .append($('<td contenteditable="true">').append(quantity))
                  .append($('<td contenteditable="true">').append(unit_cost))

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
    var food_formula_id = '';
    food_formula_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // food_formula_id = Math.round(food_formula_id-.5);
    food_formula_id = Math.round(food_formula_id);
    // alert(food_formula_id);



      // alert("ID = "+food_formula_id);

      var btn_action = 'fetch_single';
    document.getElementById("action").disabled = false;

    document.getElementById("food_formula_id").value = food_formula_id;

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {food_formula_id: food_formula_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(food_formula_id);
          // alert(data);

          var len = data.length;
          var len2 = len - 1;

          $('.food_formula_id').val(food_formula_id);
          // $('#rawqc_id').html("<input type='hidden' id='store_requisition_master_id' name='store_requisition_master_id' value='" + store_requisition_master_id + "'>");
          $('#select_date').val(data[len2].select_date);
          $('#formula_code').val(data[len2].formula_code);
          $('#total_cost').val(data[len2].total_cost);
          $('#total_qty').val(data[len2].total_qty);
          $('#remarks').val(data[len2].remarks);


          // var len = data.length;
          for (i = 0; i < len - 1; i++) {

            $('#stockin_data1').append($('<tr>')
              .append($('<td style="display:none;">').append(data[i].product))
              .append($('<td>').append(data[i].product))
              .append($('<td style="display:none;">').append(data[i].unit))
              .append($('<td>').append(data[i].unit))
              .append($('<td>').append(data[i].quantity))
              .append($('<td>').append(data[i].unit_cost))

              .append($('<td style="display:none;">').append(data[i].details_id))
              .append($('<td style="display:none;">').append(data[i].master_id))
              .append($('<td> <button class="btn-remove-data badge badge-danger">Remove</button></td>'))
            )
          }


          $('#heading').html(" Food Formula Edit");
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
    $(document).on('submit', '#food_formula', function (event) {
      event.preventDefault();


      ////////// Dynamic Table Data

      var tabledata = new Array();

      $('#stockin_data1 tr').each(function (row, tr) {
        tabledata[row] = {
          "food": $(tr).find('td:eq(0)').text()
          , "food_name": $(tr).find('td:eq(1)').text()
          , "unit": $(tr).find('td:eq(2)').text()
          , "unit_name": $(tr).find('td:eq(3)').text()
          , "quantity": $(tr).find('td:eq(4)').text()
          , "unit_cost": $(tr).find('td:eq(4)').text()
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
          food_formula_id: $("input[name='food_formula_id']").val(),
          select_date: $("input[name='select_date']").val(),
          formula_code: $("input[id='formula_code']").val(),
          total_cost: $("input[name='total_cost']").val(),
          remarks: $("input[name='remarks']").val(),
          total_qty: $("input[name='total_qty']").val(),
          btn_action: $("input[name='btn_action']").val(),
          tabledata: tabledata
        },
        success: function (data) {
          $('#food_formula')[0].reset();

          var table = document.getElementById("stockin_data1");
          //or use :  var table = document.all.tableid;
          for (var i = table.rows.length - 1; i > 0; i--) {
            table.deleteRow(i);
          }
          // $('#food_formula')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });


  });


</script>
