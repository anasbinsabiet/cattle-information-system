<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_FILES['land_costing_pic'])) {

  if (is_array($_FILES)) {

    $src = $_FILES['land_costing_pic']['tmp_name'];
    $targ = "images/" . $_FILES['land_costing_pic']['name'];
    move_uploaded_file($src, $targ);

    echo $_SESSION['base_url'] . 'land_module/land_costing/' . $targ;

  }

}

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");


 // if(empty(trim($_POST['land_code'])) || empty(trim($_POST['costing_type'])) || empty(trim($_POST['cost_amount']))) {
 //      echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
 //    }else{ 

    $query = "INSERT INTO  land_costing (  user_id ,  create_date ,  land_code ,  costing_type ,  cost_amount ,  remarks,  land_costing_pic ) 
VALUES (  :user_id ,  :create_date ,  :land_code ,  :costing_type ,  :cost_amount ,  :remarks ,  :land_costing_pic )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':land_code' => $_POST['land_code'],
        ':costing_type' => $_POST['costing_type'],
        ':cost_amount' => $_POST['cost_amount'],
        ':remarks' => $_POST['remarks'],
        ':land_costing_pic' => $_POST['land_costing_pic_url']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Costing Added</div>';
    }
  }
// }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM land_costing WHERE lc_id = :lc_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':lc_id' => $_POST["lc_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['lc_id'] = $row['lc_id'];
      $output['land_code'] = $row['land_code'];
      $output['costing_type'] = $row['costing_type'];
      $output['cost_amount'] = $row['cost_amount'];
      $output['remarks'] = $row['remarks'];
      $output['land_costing_pic'] = $row['land_costing_pic'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['land_code'])) || empty(trim($_POST['costing_type'])) || empty(trim($_POST['cost_amount']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "UPDATE  land_costing  SET  user_id = :user_id , update_date = :update_date , land_code = :land_code , costing_type = :costing_type , cost_amount = :cost_amount , remarks = :remarks, land_costing_pic=:land_costing_pic  WHERE lc_id = :lc_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':land_code' => $_POST['land_code'],
        ':costing_type' => $_POST['costing_type'], 
        ':cost_amount' => $_POST['cost_amount'], 
        ':remarks' => $_POST['remarks'], 
        ':land_costing_pic' => $_POST['land_costing_pic_url'],
        ':lc_id' => $_POST['lc_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Costing Edited</div>';
    }
  }
// }
    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $lc_id = $_POST["lc_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  land_costing  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE lc_id = :lc_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':lc_id' => $_POST['lc_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Costing Deleted</div>';
    }
  }
}
?>
