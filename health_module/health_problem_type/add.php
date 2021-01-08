<?php
include_once "../../dashboard/index/navbar.php";
include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Problem Type Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Problem Type</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Problem Type Add</li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="alert" role="alert" id="alert_action" style="display: none;"></div>
        <form role="form" method="POST" id="problem_type" class="problem_type">
          <input type="hidden" id="problem_type_id" name="problem_type_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="problem_type_name">Problem Type Name <!-- <span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="problem_type_name" name="problem_type_name" placeholder="Enter Problem Type Name">
              </div>
            </div>
          </div>
          <div class="card-footer">
            <input type="hidden" name="btn_action" id="btn_action" name="btn_action" value="Add"/>
            <button type="submit" id="action" name="action" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div><!--/. container-fluid -->
</section>
<?php include_once "../../dashboard/index/footer.php"; ?>

<script type="text/javascript">
  $(document).ready(function () {
    var url = document.URL;
    var id = url.substring(url.lastIndexOf('=') + 1);
    // alert(id);
    var problem_type_id = '';
    problem_type_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // problem_type_id = Math.round(problem_type_id-.5);
    problem_type_id = Math.round(problem_type_id);
    // alert(problem_type_id);
    if (problem_type_id != Number.isNaN(NaN) || problem_type_id != '') {
      // alert("ID = "+problem_type_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {problem_type_id: problem_type_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(problem_type_id);
          // alert(data);
          $('#problem_type_id').val(data.problem_type_id); 
          $('#problem_type_name').val(data.problem_type_name); 
          $('#problem_type_type').val(data.problem_type_type);

          $('#heading').html("Problem Type Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#problem_type', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#problem_type')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
