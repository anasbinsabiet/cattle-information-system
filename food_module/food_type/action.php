<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['food_type_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  food_type (  user_id ,  create_date ,  food_type_name) 
VALUES (  :user_id ,  :create_date ,  :food_type_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':food_type_name' => $_POST['food_type_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Food Type Added</div>';

    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM food_type WHERE food_type_id = :food_type_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':food_type_id' => $_POST["food_type_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['food_type_id'] = $row['food_type_id'];
      $output['food_type_name'] = $row['food_type_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['food_type_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  food_type  SET  user_id = :user_id , update_date = :update_date , food_type_name = :food_type_name WHERE food_type_id = :food_type_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':food_type_name' => $_POST['food_type_name'],
        ':food_type_id' => $_POST['food_type_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Food Type Edited</div>';
    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $food_type_id = $_POST["food_type_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  food_type  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE food_type_id = :food_type_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':food_type_id' => $_POST['food_type_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Food Type Deleted</div>';
    }
  }
}
?>
