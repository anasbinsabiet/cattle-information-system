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
    <h1 class="m-0 text-dark" id="heading" name="heading">Stock Out Medicine Inventory Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Stock Out Medicine Inventory</a>
      </li>
      <li class="breadcrumb-item active" id="heading" name="heading">Stock Out Medicine Inventory Add</li>
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
        <form role="form" method="POST" id="stock_out_med" class="stock_out_med">

          <input type="hidden" id="stock_out_med_id" name="stock_out_med_id" class="stock_out_med_id" >

          <div class="card-body">
            <div class="row">


              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="som_date">Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control som_date" id="som_date" name="som_date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="purpose">Purpose <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="purpose" name="purpose">
                  <option value="1">Cattle Use</option>
                  <option value="2">Sell</option>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="receiver">Receiver <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control receiver" id="receiver" name="receiver" placeholder="Enter Receiver">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="receiver_contact">Receiver Contact</label>
                <input type="text" class="form-control receiver_contact" id="receiver_contact" name="receiver_contact" placeholder="Enter Number">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="storage_location_fridge">Storage / location / fridge</label>
                <select class="form-control storage_location_fridge" id="storage_location_fridge" name="storage_location_fridge">
                  <option value="">Select</option>
                  <option value="1">Storage</option>
                  <option value="2">Location</option>
                  <option value="3">Fridge</option>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="farm_id">Firm No <!-- <span class="text-red">*</span> --></label>
                <select class="form-control farm_id" id="farm_id" name="farm_id" >
                  <?php echo filled_farm_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="total_amount">Total Amount <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control total_amount" id="total_amount" name="total_amount"
                       placeholder="Total Amount ">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="total_price">Total Price</label>
                <input type="text" class="form-control total_price" id="total_price" name="total_price"
                       placeholder="Total Price ">
              </div>
              
            </div>

            <div class="row">

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="medicine">Medicine </label>
                <select class="form-control medicine" id="medicine" name="medicine" >
                  <?php echo filled_medicine_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="unit">Unit</label>
                <select  class="form-control unit" id="unit" name="unit" >
                  <?php echo filled_medicine_unit($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="amount">Amount</label>
                <input type="text" class="form-control amount" id="amount" name="amount"
                       placeholder=" Amount ">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="price">Price</label>
                <input type="text" class="form-control price" id="price" name="price"
                       placeholder="Price">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="hc_id">Health Checking ID</label>
                <select  class="form-control hc_id" id="hc_id" name="hc_id" >
                  <?php echo filled_health_checkup_id($connect); ?>
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
                                    <th>Medicine</th>
<!--                                  <th>Unit ID</th>-->
                                    <th>Unit</th>
                                    <th>Amount</th>
                                    <th>Price</th>
                                    <th>Health Checking ID</th>
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

            var medicine = document.getElementById("medicine").value;
          var e = document.getElementById("medicine");
          var medicine_name = e.options[e.selectedIndex].text;
            // alert(medicine);
            var unit = document.getElementById("unit").value;
            // alert(unit);

            var f = document.getElementById("unit");
            var unit_name = f.options[f.selectedIndex].text;
            // alert(unit_name);

            var amount = document.getElementById("amount").value;
            var price = document.getElementById("price").value;
            // alert(price);
            var g = document.getElementById("hc_id");
            var hc_id_name = g.options[g.selectedIndex].text;

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
                    // .append($('<td>').append(medicine_id))
                    .append($('<td   style="display:none;" >').append(medicine))
                  .append($('<td>').append(medicine_name))

                  .append($('<td  style="display:none;">').append(unit))
                  .append($('<td>').append(unit_name))

                  ////////////////// contenteditable="true" , It makes table cell editable. Use it carefully.

                  .append($('<td contenteditable="true">').append(amount))
                  .append($('<td contenteditable="true">').append(price))

                  .append($('<td  style="display:none;">').append(hc_id))
                  .append($('<td>').append(hc_id_name))

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
    var stock_out_med_id = '';
    stock_out_med_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // stock_out_med_id = Math.round(stock_out_med_id-.5);
    stock_out_med_id = Math.round(stock_out_med_id);
    // alert(stock_out_med_id);



      // alert("ID = "+stock_out_med_id);

      var btn_action = 'fetch_single';
    document.getElementById("action").disabled = false;

    document.getElementById("stock_out_med_id").value = stock_out_med_id;

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {stock_out_med_id: stock_out_med_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(stock_out_med_id);
          // alert(data);

          var len = data.length;
          var len2 = len - 1;

          $('.stock_out_med_id').val(stock_out_med_id);
          // $('#rawqc_id').html("<input type='hidden' id='store_requisition_master_id' name='store_requisition_master_id' value='" + store_requisition_master_id + "'>");
          $('#som_date').val(data[len2].som_date);
          $('#purpose').val(data[len2].purpose);
          $('#receiver').val(data[len2].receiver);
          $('#receiver_contact').val(data[len2].receiver_contact);
          $('#storage_location_fridge').val(data[len2].storage_location_fridge);
          $('#farm_id').val(data[len2].farm_id);
          $('#total_amount').val(data[len2].total_amount);
          $('#total_price').val(data[len2].total_price);

          // var len = data.length;
          for (i = 0; i < len - 1; i++) {

            $('#stockin_data1').append($('<tr>')
              .append($('<td style="display:none;">').append(data[i].medicine))
              .append($('<td>').append(data[i].medicine))
              .append($('<td style="display:none;">').append(data[i].unit))
              .append($('<td>').append(data[i].unit))
              .append($('<td>').append(data[i].amount))
              .append($('<td>').append(data[i].price))
              .append($('<td style="display:none;">').append(data[i].hc_id))
              .append($('<td>').append(data[i].hc_id))

              .append($('<td style="display:none;">').append(data[i].details_id))
              .append($('<td style="display:none;">').append(data[i].master_id))
              .append($('<td> <button class="btn-remove-data badge badge-danger">Remove</button></td>'))
            )
          }


          $('#heading').html(" Stock Out Medicine Inventory Edit");
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
    $(document).on('submit', '#stock_out_med', function (event) {
      event.preventDefault();


      ////////// Dynamic Table Data

      var tabledata = new Array();

      $('#stockin_data1 tr').each(function (row, tr) {
        tabledata[row] = {
          "medicine": $(tr).find('td:eq(0)').text()
          , "medicine_name": $(tr).find('td:eq(1)').text()
          , "unit": $(tr).find('td:eq(2)').text()
          , "unit_name": $(tr).find('td:eq(3)').text()
          , "amount": $(tr).find('td:eq(4)').text()
          , "price": $(tr).find('td:eq(4)').text()
          , "hc_id": $(tr).find('td:eq(2)').text()
          , "hc_id_name": $(tr).find('td:eq(3)').text()
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
          stock_out_med_id: $("input[name='stock_out_med_id']").val(),
          som_date: $("input[name='som_date']").val(),
          purpose: $("select[id='purpose']").val(),
          receiver: $("input[id='receiver']").val(),
          receiver_contact: $("input[id='receiver_contact']").val(),
          storage_location_fridge: $("select[name='storage_location_fridge']").val(),
          farm_id: $("select[name='farm_id']").val(),
          total_amount: $("input[name='total_amount']").val(),
          total_price: $("input[name='total_price']").val(),
          btn_action: $("input[name='btn_action']").val(),
          tabledata: tabledata
        },
        success: function (data) {
          $('#stock_out_med')[0].reset();

          var table = document.getElementById("stockin_data1");
          //or use :  var table = document.all.tableid;
          for (var i = table.rows.length - 1; i > 0; i--) {
            table.deleteRow(i);
          }
          // $('#stock_out_med')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });


  });


</script>
