<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['medicine_unit_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  medicine_unit (  user_id ,  create_date ,  medicine_unit_name) 
VALUES (  :user_id ,  :create_date ,  :medicine_unit_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':medicine_unit_name' => $_POST['medicine_unit_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Type Added</div>';
    }
  }
// }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM medicine_unit WHERE medicine_unit_id = :medicine_unit_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':medicine_unit_id' => $_POST["medicine_unit_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['medicine_unit_id'] = $row['medicine_unit_id'];
      $output['medicine_unit_name'] = $row['medicine_unit_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['medicine_unit_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  medicine_unit  SET  user_id = :user_id , update_date = :update_date , medicine_unit_name = :medicine_unit_name WHERE medicine_unit_id = :medicine_unit_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':medicine_unit_name' => $_POST['medicine_unit_name'],
        ':medicine_unit_id' => $_POST['medicine_unit_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Type Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $medicine_unit_id = $_POST["medicine_unit_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  medicine_unit  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE medicine_unit_id = :medicine_unit_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':medicine_unit_id' => $_POST['medicine_unit_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Type Deleted</div>';
    }
  }
}
?>
