<?php
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
include_once "../../dashboard/info_store/function.php";
?>
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
  <div class="container-fluid">

    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-11">
            <h3 class="card-title">Cattle Profile List</h3>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">

  <div id="divToPrint" style="font-size: 11px;">
    <button class="print-link avoid-this btn btn-info mb-3">Print</button>
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
      <h4> Cattle Profile Report - CIMS </h4>   
      </div>
      <div class="col-sm-1 invoice-col"></div>
    </div>
    

    <table class="table myTable" width="100%">
        <thead style="text-align: left;">
          <tr><th colspan='10'><img src="../../dist/img/cheader.png" width="100%"></th></tr>
        </thead>
        <tbody>
          <tr>
            <td style="width:5%; border-top: 1px solid #ddd; border-left: 1px solid #ddd;  border-right: 1px solid #ddd;">S/L</th>
            <td style="width:15%; border-top: 1px solid #ddd; border-right: 1px solid #ddd;">Cattle Code</th>
            <td style="width:15%; border-top: 1px solid #ddd; border-right: 1px solid #ddd;">Animal Type</th>
            <td style="width:15%; border-top: 1px solid #ddd; border-right: 1px solid #ddd;">Cattle Kin</th>
            <td style="width:15%; border-top: 1px solid #ddd; border-right: 1px solid #ddd;">Color</th>
            <td style="width:15%; border-top: 1px solid #ddd; border-right: 1px solid #ddd;"> Special Sign</th>
            <td style="width:15%; border-top: 1px solid #ddd; border-right: 1px solid #ddd;"> Buy Date</th>
          </tr>
          <?php
          $query = $connect->prepare("SELECT * FROM `cattle_profile` WHERE delete_status = 0");

          $query->execute();

          $result = $query->fetchAll();
          $count = 1;
          foreach ($result as $row) {
          // for ($i=0; $i < 90; $i++) { 

          ?>
          <tr>
          <td class="text-center"  style="border-left: 1px solid #ddd;  border-right: 1px solid #ddd;"><?php echo $count++; ?></td>
            <td><?php echo $row['cattle_code']; ?></td>
            <td><?php echo get_animal_type($connect, $row['animal_type']); ?></td>
            <td><?php echo get_cattle_kin($connect, $row['cattle_kin']); ?></td>
            <td><?php echo get_color_name($connect, $row['color']); ?></td>
            <td><?php echo $row['special_sign']; ?></td>
            <td><?php if(!empty($row['buy_date'])){ echo date("d-F-Y", strtotime($row['buy_date'])); } ?></td>
          </tr>
          <?php
          }
          ?>
        </tbody>
        <!-- <tfoot> <tr> <td id="spacer" style="height:125px; visibility: hidden;"> </td> </tr> </tfoot> -->
    </table>
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