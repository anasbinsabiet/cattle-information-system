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
    <h1 class="m-0 text-dark" id="heading" name="heading">Stock Out Cattle Inventory Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Stock Out Cattle Inventory</a>
      </li>
      <li class="breadcrumb-item active" id="heading" name="heading">Stock Out Cattle Inventory Add</li>
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

        <form role="form" method="POST" id="stock_in_cattle" class="stock_in_cattle">

          <input type="hidden" id="stock_out_cattle_id" name="stock_out_cattle_id" class="stock_out_cattle_id" >

          <div class="card-body">
            <div class="row">


              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="soc_date">Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control soc_date" id="soc_date" name="soc_date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="receiver">Receiver <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control receiver" id="receiver" name="receiver" placeholder="receiver">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="receiver_contact">Receiver Contact</label>
                <input type="text" class="form-control receiver_contact" id="receiver_contact" name="receiver_contact" placeholder="receiver_contact">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="customer">Customer</label>
                <select class="form-control" id="customer" name="customer">
                  <?php echo filled_customer_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="farm_id">Firm No <!-- <span class="text-red">*</span> --></label>
                <select class="form-control farm_id" id="farm_id" name="farm_id" >
                  <?php echo filled_farm_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="location">Location</label>
                <select class="form-control" id="location" name="location">
                  <?php echo filled_location_name($connect) ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="discount">Discount</label>
                <input type="text" class="form-control" id="discount" name="discount"
                       placeholder="Enter Discount">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="payment_status">Payment Status</label>
                <select class="form-control" id="payment_status" name="payment_status" >
                  <?php echo filled_payment_status($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="delivery_charge">Delivery Charge</label>
                <input type="text" class="form-control" id="delivery_charge" name="delivery_charge"
                       placeholder="Enter Amount">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="vat">VAT</label>
                <input type="text" class="form-control" id="vat" name="vat"
                       placeholder="Enter Amount">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="tax">TAX</label>
                <input type="text" class="form-control" id="tax" name="tax"
                       placeholder="Enter Amount">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="amount_paid">Amount Paid</label>
                <input type="text" class="form-control" id="amount_paid" name="amount_paid"
                       placeholder="Enter Amount">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="previous_due">Previous Due</label>
                <input type="text" class="form-control" id="previous_due" name="previous_due"
                       placeholder="Enter Amount">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="previous_last_due_date">Previous Last Due Date</label>
                <input type="date" class="form-control" id="previous_last_due_date" name="previous_last_due_date"
                       placeholder="Enter Date">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="total_price">Total Price</label>
                <input type="number" class="form-control" id="total_price" name="total_price"
                       placeholder="Enter Amount">
              </div>
              
            </div>

            <div class="row">

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="cattle">Cattle</label>
                <select class="form-control cattle" id="cattle" name="cattle" >
                  <?php echo filled_cattle_code($connect) ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="price">Price</label>
                <input type="text" class="form-control price" id="price" name="price"
                       placeholder=" price ">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="weight">Weight</label>
                <input type="text" class="form-control weight" id="weight" name="weight"
                       placeholder="weight">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="purpose">Purpose</label>
                <input type="text" class="form-control purpose" id="purpose" name="purpose"
                       placeholder="purpose">
              </div>

              <div class="form-group col-sm-6 col-md-3 col-lg-3" id="">
                <label for="loss_gain">Loss / Gain</label>
                <select  class="form-control" id="loss_gain" name="loss_gain">
                  <option value="">Select</option>
                  <option value="1">Loss</option>
                  <option value="2">Gain</option>
                </select>
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
                                    <th>Cattle</th>
<!--                                  <th>cattle_kin ID</th>-->
                                    
                                    <th>Price</th>
                                    <th>Weight</th>
                                    <th>Purpose</th>
                                    <th>Loss / Gain</th>
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

//////////////////////////////// MODAL TABLE ADD

        $('#add_to_table').click(function () {

// alert("BOLOD");

            var cattle = document.getElementById("cattle").value;
          var e = document.getElementById("cattle");
          var cattle_name = e.options[e.selectedIndex].text;
            // alert(cattle);
            


            var price = document.getElementById("price").value;
            var weight = document.getElementById("weight").value;
            var purpose = document.getElementById("purpose").value;

            var loss_gain = document.getElementById("loss_gain").value;
            var i = document.getElementById("loss_gain");
            var loss_gain_name = i.options[i.selectedIndex].text;

            var details_id = "0";
            var master_id = "0";


            if (isNaN(weight) || weight == "") {
                // alert("QTY & weight should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>weight field can not be empty and Character</b>";
            } else if (weight < 1) {
                // alert("QTY & weight should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>weight field can not be less than One</b>";
            } else {
                //alert ()

                $('#stockin_data1').append($('<tr>')
                    // .append($('<td>').append(cattle_id))
                    .append($('<td   style="display:none;" >').append(cattle))
                  .append($('<td>').append(cattle_name))

                

                  ////////////////// contenteditable="true" , It makes table cell editable. Use it carefully.

                  .append($('<td contenteditable="true">').append(price))
                  .append($('<td contenteditable="true">').append(weight))
                  .append($('<td contenteditable="true">').append(purpose))

                  .append($('<td  style="display:none;">').append(loss_gain))
                  .append($('<td>').append(loss_gain_name))

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
    var stock_out_cattle_id = '';
    stock_out_cattle_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // stock_out_cattle_id = Math.round(stock_out_cattle_id-.5);
    stock_out_cattle_id = Math.round(stock_out_cattle_id);
    // alert(stock_out_cattle_id);



      // alert("ID = "+stock_out_cattle_id);

      var btn_action = 'fetch_single';
    document.getElementById("action").disabled = false;

    document.getElementById("stock_out_cattle_id").value = stock_out_cattle_id;

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {stock_out_cattle_id: stock_out_cattle_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(stock_out_cattle_id);
          // alert(data);

          var len = data.length;
          var len2 = len - 1;

          $('.stock_out_cattle_id').val(stock_out_cattle_id);
          // $('#rawqc_id').html("<input type='hidden' id='store_requisition_master_id' name='store_requisition_master_id' value='" + store_requisition_master_id + "'>");
          $('#soc_date').val(data[len2].soc_date);
          $('#receiver').val(data[len2].receiver);
          $('#receiver_contact').val(data[len2].receiver_contact);
          $('#customer').val(data[len2].customer);
          $('#farm_id').val(data[len2].farm_id);
          $('#location').val(data[len2].location);
          $('#discount').val(data[len2].discount);
          $('#payment_status').val(data[len2].payment_status);
          $('#delivery_charge').val(data[len2].delivery_charge);
          $('#vat').val(data[len2].vat);
          $('#tax').val(data[len2].tax);
          $('#amount_paid').val(data[len2].amount_paid);
          $('#previous_due').val(data[len2].previous_due);
          $('#previous_last_due_date').val(data[len2].previous_last_due_date);
          $('#total_price').val(data[len2].total_price);

          // var len = data.length;
          for (i = 0; i < len - 1; i++) {

            $('#stockin_data1').append($('<tr>')
              .append($('<td style="display:none;">').append(data[i].cattle))
              .append($('<td>').append(data[i].cattle))
              
              .append($('<td>').append(data[i].price))
              .append($('<td>').append(data[i].weight))
              .append($('<td>').append(data[i].purpose))
              .append($('<td style="display:none;">').append(data[i].loss_gain))
              .append($('<td>').append(data[i].loss_gain))

              .append($('<td style="display:none;">').append(data[i].details_id))
              .append($('<td style="display:none;">').append(data[i].master_id))
              .append($('<td> <button class="btn-remove-data badge badge-danger">Remove</button></td>'))
            )
          }


          $('#heading').html("Stock Out Cattle Inventory Edit");
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
    $(document).on('submit', '#stock_in_cattle', function (event) {
      event.preventDefault();


      ////////// Dynamic Table Data

      var tabledata = new Array();

      $('#stockin_data1 tr').each(function (row, tr) {
        tabledata[row] = {
          "cattle": $(tr).find('td:eq(0)').text()
          , "cattle_name": $(tr).find('td:eq(1)').text()
          , "price": $(tr).find('td:eq(2)').text()
          , "weight": $(tr).find('td:eq(3)').text()
          , "purpose": $(tr).find('td:eq(4)').text()
          , "loss_gain": $(tr).find('td:eq(5)').text()
          , "loss_gain_name": $(tr).find('td:eq(6)').text()
          , "details_id": $(tr).find('td:eq(7)').text()
          , "master_id": $(tr).find('td:eq(8)').text()
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
          stock_out_cattle_id: $("input[name='stock_out_cattle_id']").val(),
          soc_date: $("input[name='soc_date']").val(),
          receiver: $("input[name='receiver']").val(),
          receiver_contact: $("input[name='receiver_contact']").val(),
          customer: $("select[name='customer']").val(),
          farm_id: $("select[name='farm_id']").val(),
          location: $("select[name='location']").val(),
          discount: $("input[name='discount']").val(),
          payment_status: $("select[name='payment_status']").val(),
          delivery_charge: $("input[name='delivery_charge']").val(),
          vat: $("input[name='vat']").val(),
          tax: $("input[name='tax']").val(),
          amount_paid: $("input[name='amount_paid']").val(),
          previous_due: $("input[name='previous_due']").val(),
          previous_last_due_date: $("input[name='previous_last_due_date']").val(),
          total_price: $("input[name='total_price']").val(),
          btn_action: $("input[name='btn_action']").val(),
          tabledata: tabledata
        },
        success: function (data) {
          $('#stock_in_cattle')[0].reset();

          var table = document.getElementById("stockin_data1");
          //or use :  var table = document.all.tableid;
          for (var i = table.rows.length - 1; i > 0; i--) {
            table.deleteRow(i);
          }
          // $('#stock_in_cattle')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });


  });


</script>
