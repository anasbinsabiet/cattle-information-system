<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['land_type_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "INSERT INTO  land_type (  user_id ,  create_date ,  land_type_name) 
VALUES (  :user_id ,  :create_date ,  :land_type_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':land_type_name' => $_POST['land_type_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Type Added</div>';
    }
  }
// }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM land_type WHERE land_type_id = :land_type_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':land_type_id' => $_POST["land_type_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['land_type_id'] = $row['land_type_id'];
      $output['land_type_name'] = $row['land_type_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['land_type_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "UPDATE  land_type  SET  user_id = :user_id , update_date = :update_date , land_type_name = :land_type_name WHERE land_type_id = :land_type_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':land_type_name' => $_POST['land_type_name'],
        ':land_type_id' => $_POST['land_type_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Type Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $land_type_id = $_POST["land_type_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  land_type  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE land_type_id = :land_type_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':land_type_id' => $_POST['land_type_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Type Deleted</div>';

    }
  }
}
?>