<?php
include_once "../../dashboard/index/navbar.php";

include_once "../../dashboard/index/sidebar.php";
//$id = 0;
//$id = (((($_GET['id']/1971)/2)*100)/777)-9954;
// echo $id;
?>
<div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark" id="heading" name="heading">Animal Type Add</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="<?php echo $_SESSION['base_url']; ?>">Home</a></li>
      <li class="breadcrumb-item "><a
          href="index.php">Animal Type</a></li>
      <li class="breadcrumb-item active" id="heading" name="heading">Animal Type Add</li>
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
        <form role="form" method="POST" id="animal_type" class="animal_type">
          <input type="hidden" id="animal_type_id" name="animal_type_id" value="">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="animal_type_name">Animal Name <!--<span class="text-red">*</span> --></label>
                <input type="text" class="form-control" id="animal_type_name" name="animal_type_name" onkeypress="return /[a-z]/i.test(event.key)" placeholder="Enter Animal">
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
    var animal_type_id = '';
    animal_type_id = ((((id / 1971) / 2) * 100) / 777) - 9954;
    // animal_type_id = Math.round(animal_type_id-.5);
    animal_type_id = Math.round(animal_type_id);
    // alert(animal_type_id);
    if (animal_type_id != Number.isNaN(NaN) || animal_type_id != '') {
      // alert("ID = "+animal_type_id);
      var btn_action = 'fetch_single';
      $.ajax({
        url: 'action.php',
        method: "POST",
        data: {animal_type_id: animal_type_id, btn_action: btn_action},
        dataType: "json",
        success: function (data) {
          // alert(animal_type_id);
          // alert(data);
          $('#animal_type_id').val(data.animal_type_id); 
          $('#animal_type_name').val(data.animal_type_name);

          $('#heading').html("Animal Type Edit");
          $('#action').val('Edit');
          $('#action').html('Edit');
          $('#btn_action').val('Edit');
        }
      })
    }
    // alert("LOL");
////////////// Insert
    $(document).on('submit', '#animal_type', function (event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "action.php",
        method: "POST",
        data: form_data,
        success: function (data) {
          $('#animal_type')[0].reset();
          $('#alert_action').fadeIn().html('<div class="alert">' + data + '</div>');
          // alert(data);
        }
      })
    });
  });
</script>
