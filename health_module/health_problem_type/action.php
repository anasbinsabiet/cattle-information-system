<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['problem_type_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  problem_type (  user_id ,  create_date ,  problem_type_name) 
VALUES (  :user_id ,  :create_date ,  :problem_type_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':problem_type_name' => $_POST['problem_type_name']
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
    SELECT * FROM problem_type WHERE problem_type_id = :problem_type_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':problem_type_id' => $_POST["problem_type_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['problem_type_id'] = $row['problem_type_id'];
      $output['problem_type_name'] = $row['problem_type_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['problem_type_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "UPDATE  problem_type  SET  user_id = :user_id , update_date = :update_date , problem_type_name = :problem_type_name WHERE problem_type_id = :problem_type_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':problem_type_name' => $_POST['problem_type_name'],
        ':problem_type_id' => $_POST['problem_type_id']
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
    $problem_type_id = $_POST["problem_type_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  problem_type  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE problem_type_id = :problem_type_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':problem_type_id' => $_POST['problem_type_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Problem Type Deleted</div>';
    }
  }
}
?>
