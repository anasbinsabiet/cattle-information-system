<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['problem_area_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  problem_area (  user_id ,  create_date ,  problem_area_name) 
VALUES (  :user_id ,  :create_date ,  :problem_area_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':problem_area_name' => $_POST['problem_area_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Problem Type Added</div>';
    }
  }
// }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM problem_area WHERE problem_area_id = :problem_area_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':problem_area_id' => $_POST["problem_area_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['problem_area_id'] = $row['problem_area_id'];
      $output['problem_area_name'] = $row['problem_area_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['problem_area_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  problem_area  SET  user_id = :user_id , update_date = :update_date , problem_area_name = :problem_area_name WHERE problem_area_id = :problem_area_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':problem_area_name' => $_POST['problem_area_name'],
        ':problem_area_id' => $_POST['problem_area_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Problem Type Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $problem_area_id = $_POST["problem_area_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  problem_area  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE problem_area_id = :problem_area_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':problem_area_id' => $_POST['problem_area_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Problem Type Deleted</div>';
    }
  }
}
?>
