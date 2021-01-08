<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['food_formula_unit_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  food_formula_unit (  user_id ,  create_date ,  food_formula_unit_name) 
VALUES (  :user_id ,  :create_date ,  :food_formula_unit_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':food_formula_unit_name' => $_POST['food_formula_unit_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Food Formula Unit Added</div>';
    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM food_formula_unit WHERE food_formula_unit_id = :food_formula_unit_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':food_formula_unit_id' => $_POST["food_formula_unit_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['food_formula_unit_id'] = $row['food_formula_unit_id'];
      $output['food_formula_unit_name'] = $row['food_formula_unit_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['food_formula_unit_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  food_formula_unit  SET  user_id = :user_id , update_date = :update_date , food_formula_unit_name = :food_formula_unit_name WHERE food_formula_unit_id = :food_formula_unit_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':food_formula_unit_name' => $_POST['food_formula_unit_name'],
        ':food_formula_unit_id' => $_POST['food_formula_unit_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Food Formula Unit Edited</div>';
    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $food_formula_unit_id = $_POST["food_formula_unit_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  food_formula_unit  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE food_formula_unit_id = :food_formula_unit_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':food_formula_unit_id' => $_POST['food_formula_unit_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo 'Food Formula Unit ';
      echo '<div class="alert alert-success">Food Formula Unit Deleted</div>';
      
    }
  }
}
?>
