</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer text-sm fixed">
  <strong>Copyright &copy; 2020-<?php echo date('Y'); ?> <a href="http://zaimahtech.com" target="_blank">Zaimah Technologies Limited</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0 (BETA)
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../plugins/raphael/raphael.min.js"></script>
<script src="../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../../dist/js/pages/dashboard2.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
  //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    });
</script>


<script type="text/javascript">
  $(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});
</script>
</body>
</html>
