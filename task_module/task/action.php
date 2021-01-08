<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['task_name'])) || empty(trim($_POST['task_date'])) || empty(trim($_POST['employee_id'])) || empty(trim($_POST['deadline_date']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $query = "INSERT INTO  task (  user_id ,  create_date ,  task_name ,  task_date ,  description ,  task_type ,  employee_id, deadline_date, dealine_time) 
VALUES (  :user_id ,  :create_date ,  :task_name ,  :task_date ,  :description ,  :task_type ,  :employee_id, :deadline_date, :dealine_time)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':task_name' => $_POST['task_name'],
        ':task_date' => $_POST['task_date'],
        ':description' => $_POST['description'],
        ':task_type' => $_POST['task_type'],
        ':employee_id' => $_POST['employee_id'],
        ':deadline_date' => $_POST['deadline_date'],
        ':dealine_time' => $_POST['dealine_time']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Added</div>';
    }
  }
// }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM task WHERE task_id = :task_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':task_id' => $_POST["task_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['task_id'] = $row['task_id'];
      $output['task_name'] = $row['task_name'];
      $output['task_date'] = $row['task_date'];
      $output['description'] = $row['description'];
      $output['task_type'] = $row['task_type'];
      $output['employee_id'] = $row['employee_id'];
      $output['deadline_date'] = $row['deadline_date'];
      $output['dealine_time'] = $row['dealine_time'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['task_name'])) || empty(trim($_POST['task_date'])) || empty(trim($_POST['employee_id'])) || empty(trim($_POST['deadline_date']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "UPDATE  task  SET  user_id = :user_id , update_date = :update_date , task_name=:task_name , task_date=:task_date , description=:description , task_type=:task_type , employee_id=:employee_id , deadline_date=:deadline_date , dealine_time=:dealine_time WHERE task_id = :task_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1 , 
        ':update_date' => $create_date , 
        ':task_name' => $_POST["task_name"],
        ':task_date' => $_POST["task_date"],
        ':description' => $_POST["description"],
        ':task_type' => $_POST["task_type"],
        ':employee_id' => $_POST["employee_id"],
        ':deadline_date' => $_POST["deadline_date"],
        ':dealine_time' => $_POST["dealine_time"],
        ':task_id' => $_POST["task_id"]
        )
    );
        if(!$statement->execute())
        {
            print_r($statement->errorInfo());
        }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $task_id = $_POST["task_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  task  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE task_id = :task_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':task_id' => $_POST['task_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Deleted</div>';
    }
  }
}
?>
