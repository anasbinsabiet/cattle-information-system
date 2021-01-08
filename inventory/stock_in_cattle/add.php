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
    <h1 class="m-0 text-dark" id="heading" name="heading">Stock In Cattle Inventory Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Stock In Cattle Inventory</a>
      </li>
      <li class="breadcrumb-item active" id="heading" name="heading">Stock In Cattle Inventory Add</li>
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

          <input type="hidden" id="stock_in_cattle_id" name="stock_in_cattle_id" class="stock_in_cattle_id" >

          <div class="card-body">
            <div class="row">


              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="sic_date">Date <!-- <span class="text-red">*</span> --></label>
                <input type="date" class="form-control sic_date" id="sic_date" name="sic_date" value="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="supplier">Supplier <!-- <span class="text-red">*</span> --></label>
                <select class="form-control supplier" id="supplier" name="supplier">
                  <?php echo filled_supplier_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="farm_id">Firm No <!-- <span class="text-red">*</span> --></label>
                <select class="form-control" id="farm_id" name="farm_id" >
                  <?php echo filled_farm_name($connect); ?>
                </select>
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks"
                       placeholder="Total Amount ">
              </div>
              
            </div>

            <div class="row">

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="cattle">Cattle</label>
                <select class="form-control cattle" id="cattle" name="cattle" >
                  <?php echo filled_cattle_code($connect) ?>
                </select>
              </div>


              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="price">Price</label>
                <input type="text" class="form-control price" id="price" name="price"
                       placeholder="price">
              </div>

              <div class="form-group col-sm-6 col-md-4 col-lg-4" id="">
                <label for="buy_birth">Buy / Birth</label>
                <select  class="form-control" id="buy_birth" name="buy_birth">
                  <option value="">Select</option>
                  <option value="1">Buy</option>
                  <option value="2">Birth</option>
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
                                    <th>Buy / Birth</th>
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

            var buy_birth = document.getElementById("buy_birth").value;
            var i = document.getElementById("buy_birth");
            var buy_birth_name = i.options[i.selectedIndex].text;

            var details_id = "0";
            var master_id = "0";


            if (isNaN(price) || price == "") {
                // alert("QTY & price should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>price field can not be empty and Character</b>";
            } else if (price < 1) {
                // alert("QTY & price should be Number and Not Empty");
                document.getElementById("demo").innerHTML = "<b style='color:red;'>price field can not be less than One</b>";
            } else {
                //alert ()

                $('#stockin_data1').append($('<tr>')
                    // .append($('<td>').append(cattle_id))
                    .append($('<td   style="display:none;" >').append(cattle))
                  .append($('<td>').append(cattle_name))

                  
                  .append($('<td contenteditable="true">').append(price))

                  .append($('<td  style="display:none;">').append(buy_birth))
                  .append($('<td>').append(buy_birth_name))

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
    var stock_in_cattle_id = '';
    stock_in_cattle_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // stock_in_cattle_id = Math.round(stock_in_cattle_id-.5);
    stock_in_cattle_id = Math.round(stock_in_cattle_id);
    // alert(stock_in_cattle_id);



      // alert("ID = "+stock_in_cattle_id);

      var btn_action = 'fetch_single';
    document.getElementById("action").disabled = false;

    document.getElementById("stock_in_cattle_id").value = stock_in_cattle_id;

      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {stock_in_cattle_id: stock_in_cattle_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(stock_in_cattle_id);
          // alert(data);

          var len = data.length;
          var len2 = len - 1;

          $('.stock_in_cattle_id').val(stock_in_cattle_id);
          // $('#rawqc_id').html("<input type='hidden' id='store_requisition_master_id' name='store_requisition_master_id' value='" + store_requisition_master_id + "'>");
          $('#sic_date').val(data[len2].sic_date);
          $('#supplier').val(data[len2].supplier);
          $('#farm_id').val(data[len2].farm_id);
          $('#remarks').val(data[len2].remarks);

          // var len = data.length;
          for (i = 0; i < len - 1; i++) {

            $('#stockin_data1').append($('<tr>')
              .append($('<td style="display:none;">').append(data[i].cattle))
              .append($('<td>').append(data[i].cattle))
              .append($('<td>').append(data[i].price))
              .append($('<td style="display:none;">').append(data[i].buy_birth))
              .append($('<td>').append(data[i].buy_birth))

              .append($('<td style="display:none;">').append(data[i].details_id))
              .append($('<td style="display:none;">').append(data[i].master_id))
              .append($('<td> <button class="btn-remove-data badge badge-danger">Remove</button></td>'))
            )
          }


          $('#heading').html(" Stock In Cattle Inventory Edit");
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
          , "buy_birth": $(tr).find('td:eq(3)').text()
          , "buy_birth_name": $(tr).find('td:eq(4)').text()
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
          stock_in_cattle_id: $("input[name='stock_in_cattle_id']").val(),
          sic_date: $("input[name='sic_date']").val(),
          supplier: $("select[name='supplier']").val(),
          farm_id: $("select[name='farm_id']").val(),
          remarks: $("input[name='remarks']").val(),
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
