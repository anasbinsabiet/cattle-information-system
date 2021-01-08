<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['task_status_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "INSERT INTO  task_status (  user_id ,  create_date ,  task_status_name) 
VALUES (  :user_id ,  :create_date ,  :task_status_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':task_status_name' => $_POST['task_status_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Status Added</div>';
    }
  }
// }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM task_status WHERE task_status_id = :task_status_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':task_status_id' => $_POST["task_status_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['task_status_id'] = $row['task_status_id'];
      $output['task_status_name'] = $row['task_status_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['task_status_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "UPDATE  task_status  SET  user_id = :user_id , update_date = :update_date , task_status_name = :task_status_name WHERE task_status_id = :task_status_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':task_status_name' => $_POST['task_status_name'],
        ':task_status_id' => $_POST['task_status_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Status Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $task_status_id = $_POST["task_status_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  task_status  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE task_status_id = :task_status_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':task_status_id' => $_POST['task_status_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Status Deleted</div>';
    }
  }
}
?>
