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
    <h1 class="m-0 text-dark" id="heading" name="heading">Stock Out Food Inventory Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Stock Out Food Inventory</a>
      </li>
      <li class="breadcrumb-item active" id="heading" name="heading">Stock Out Food Inventory Add</li>
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
        <!--        <div class="card-header">-->
        <!--          <h3 class="card-title">Quick Example</h3>-->
        <!--        </div>-->
        <!-- /.card-header -->
        <!-- form start -->
        <div class="alert" role="alert" id="alert_action" style="display: none;"></div>
        <form role="form" method="POST" id="stock_out_fi" class="stock_out_fi">

          <input type="hidden" id="stock_out_fi_id" name="stock_out_fi_id" class="stock_out_fi_id" >

          <div class="card-body">
            <div class="row">


              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="sofi_date">Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control sofi_date" id="sofi_date" name="sofi_date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="sell_cattle_use">Sell / Cattle Use <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="sell_cattle_use" name="sell_cattle_use" >
                  <option value="">Select Your Choice</option>
                  <option value="1">Sell</option>
                  <option value="2">Cattle Use</option>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="reciver">Reciver <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control reciver" id="reciver" name="reciver" placeholder="Enter Reciver">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="receiver_contact">Receiver Contact</label>
                <input type="number" class="form-control receiver_contact" id="receiver_contact" name="receiver_contact" placeholder="Enter Number">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="silage_or_warehouse">Silage / Warehouse</label>
                <select class="form-control silage_or_warehouse" id="silage_or_warehouse" name="silage_or_warehouse" >
                  <option value="">Select</option>
                  <option value="1">Silage</option>
                  <option value="2">Warehouse</option>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="discount1">
                <label for="discount">Discount</label>
                <input type="text" class="form-control" id="discount" name="discount"
                       placeholder="Discount">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="vat1">
                <label for="vat">Vat</label>
                <input type="text" class="form-control vat" id="vat" name="vat"
                       placeholder="Vat">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="tax1">
                <label for="tax">Tax</label>
                <input type="text" class="form-control tax" id="tax" name="tax"
                       placeholder="Tax">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="delivery_charge1">
                <label for="delivery_charge">Delivery Charge</label>
                <input type="text" class="form-control delivery_charge" id="delivery_charge" name="delivery_charge"
                       placeholder="Delivery Charge">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="payment_status1">
                <label for="payment_status">Payment Status</label>
                <select class="form-control payment_status" id="payment_status" name="payment_status" >
                  <?php echo filled_payment_status($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="amount_paid1">
                <label for="amount_paid">Amount Paid</label>
                <input type="text" class="form-control amount_paid" id="amount_paid" name="amount_paid"
                       placeholder="Amount Paid">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="previous_due_amount1">
                <label for="previous_due_amount">Previous Due Amount</label>
                <input type="text" class="form-control previous_due_amount" id="previous_due_amount" name="previous_due_amount"
                       placeholder="Previous Due Amount">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="previous_last_due_date1">
                <label for="previous_last_due_date">Previous Last Due date</label>
                <input type="date" class="form-control previous_last_due_date" id="previous_last_due_date" name="previous_last_due_date"
                       placeholder="Previous Due Amount">
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
                <select  class="form-control" id="unit" name="unit" >
                  <?php echo filled_food_formula_unit_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control quantity" id="quantity" name="quantity"
                       placeholder="Quantity">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price"
                       placeholder="Price">
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
                                    <th>Quantity</th>
                                    <th>Price</th>
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

    $('#sell_cattle_use').change(function () {
      if ($('#sell_cattle_use').val() == '1') {
        $('#discount1').attr('style', "visibility:visible");
        $('#vat1').attr('style', "visibility:visible");
        $('#tax1').attr('style', "visibility:visible");
        $('#delivery_charge1').attr('style', "visibility:visible");
        $('#payment_status1').attr('style', "visibility:visible");
        $('#amount_paid1').attr('style', "visibility:visible");
        $('#previous_due_amount1').attr('style', "visibility:visible");
        $('#previous_last_due_date1').attr('style', "visibility:visible");
      } else {
        $('#discount1').attr('style', "visibility:hidden");
        $('#vat1').attr('style', "visibility:hidden");
        $('#tax1').attr('style', "visibility:hidden");
        $('#delivery_charge1').attr('style', "visibility:hidden");
        $('#payment_status1').attr('style', "visibility:hidden");
        $('#amount_paid1').attr('style', "visibility:hidden");
        $('#previous_due_amount1').attr('style', "visibility:hidden");
        $('#previous_last_due_date1').attr('style', "visibility:hidden");

      }
    });

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

            var quantity = document.getElementById("quantity").value;
            var price = document.getElementById("price").value;

            var details_id = "0";
            var master_id = "0";


            if (isNaN(price) || price == "") {
                // alert("QTY & Price should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>price field can not be empty and Character</b>";
            } else if (price < 1) {
                // alert("QTY & Price should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>price field can not be less than One</b>";
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
                  .append($('<td contenteditable="true">').append(price))

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
    var stock_out_fi_id = '';
    stock_out_fi_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // stock_out_fi_id = Math.round(stock_out_fi_id-.5);
    stock_out_fi_id = Math.round(stock_out_fi_id);
    // alert(stock_out_fi_id);



      // alert("ID = "+stock_out_fi_id);

      var btn_action = 'fetch_single';
    document.getElementById("action").disabled = false;

    document.getElementById("stock_out_fi_id").value = stock_out_fi_id;

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {stock_out_fi_id: stock_out_fi_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(stock_out_fi_id);
          // alert(data);

          var len = data.length;
          var len2 = len - 1;

          $('.stock_out_fi_id').val(stock_out_fi_id);
          // $('#rawqc_id').html("<input type='hidden' id='store_requisition_master_id' name='store_requisition_master_id' value='" + store_requisition_master_id + "'>");
          $('#sofi_date').val(data[len2].sofi_date);
          $('#sell_cattle_use').val(data[len2].sell_cattle_use);
          $('#reciver').val(data[len2].reciver);
          $('#receiver_contact').val(data[len2].receiver_contact);
          $('#silage_or_warehouse').val(data[len2].silage_or_warehouse);
          $('#discount').val(data[len2].discount);
          $('#vat').val(data[len2].vat);
          $('#tax').val(data[len2].tax);
          $('#delivery_charge').val(data[len2].delivery_charge);
          $('#payment_status').val(data[len2].payment_status);
          $('#amount_paid').val(data[len2].amount_paid);
          $('#previous_due_amount').val(data[len2].previous_due_amount);
          $('#previous_last_due_date').val(data[len2].previous_last_due_date);


          // var len = data.length;
          for (i = 0; i < len - 1; i++) {

            $('#stockin_data1').append($('<tr>')
              .append($('<td style="display:none;">').append(data[i].product))
              .append($('<td>').append(data[i].product))
              .append($('<td style="display:none;">').append(data[i].unit))
              .append($('<td>').append(data[i].unit))
              .append($('<td>').append(data[i].quantity))
              .append($('<td>').append(data[i].price))

              .append($('<td style="display:none;">').append(data[i].details_id))
              .append($('<td style="display:none;">').append(data[i].master_id))
              .append($('<td> <button class="btn-remove-data badge badge-danger">Remove</button></td>'))
            )
          }


          $('#heading').html(" Stock Out Food Inventory Edit");
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
    $(document).on('submit', '#stock_out_fi', function (event) {
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
          , "price": $(tr).find('td:eq(4)').text()
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
          stock_out_fi_id: $("input[name='stock_out_fi_id']").val(),
          sofi_date: $("input[name='sofi_date']").val(),
          reciver: $("input[name='reciver']").val(),
          receiver_contact: $("input[name='receiver_contact']").val(),
          sell_cattle_use: $("select[id='sell_cattle_use']").val(),

          silage_or_warehouse: $("select[name='silage_or_warehouse']").val(),
          vat: $("input[name='vat']").val(),
          tax: $("input[name='tax']").val(),
          delivery_charge: $("input[name='delivery_charge']").val(),
          payment_status: $("select[name='payment_status']").val(),
          amount_paid: $("input[name='amount_paid']").val(),
          previous_due_amount: $("input[name='previous_due_amount']").val(),
          previous_last_due_date: $("input[name='previous_last_due_date']").val(),
          discount: $("input[name='discount']").val(),
          btn_action: $("input[name='btn_action']").val(),
          tabledata: tabledata
        },
        success: function (data) {
          $('#stock_out_fi')[0].reset();

          var table = document.getElementById("stockin_data1");
          //or use :  var table = document.all.tableid;
          for (var i = table.rows.length - 1; i > 0; i--) {
            table.deleteRow(i);
          }
          // $('#stock_out_fi')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });


  });


</script>
