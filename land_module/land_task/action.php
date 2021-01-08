<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");


 // if(empty(trim($_POST['lt_name'])) || empty(trim($_POST['lt_code'])) || empty(trim($_POST['lt_date'])) || empty(trim($_POST['work_type']))) {
 //      echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
 //    }else{ 

    $query = "INSERT INTO  land_task (  user_id ,  create_date ,  lt_name ,  lt_code ,  lt_date ,  work_type ,  labour_amount, task_description, assigned_person) 
VALUES (  :user_id ,  :create_date ,  :lt_name ,  :lt_code ,  :lt_date ,  :work_type ,  :labour_amount, :task_description, :assigned_person)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':lt_name' => $_POST['lt_name'],
        ':lt_code' => $_POST['lt_code'],
        ':lt_date' => $_POST['lt_date'],
        ':work_type' => $_POST['work_type'],
        ':labour_amount' => $_POST['labour_amount'],
        ':task_description' => $_POST['task_description'],
        ':assigned_person' => $_POST['assigned_person']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land task Added</div>';
    }
  }
// }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM land_task WHERE lt_id = :lt_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':lt_id' => $_POST["lt_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['lt_id'] = $row['lt_id'];
      $output['lt_name'] = $row['lt_name'];
      $output['lt_code'] = $row['lt_code'];
      $output['lt_date'] = $row['lt_date'];
      $output['work_type'] = $row['work_type'];
      $output['labour_amount'] = $row['labour_amount'];
      $output['task_description'] = $row['task_description'];
      $output['assigned_person'] = $row['assigned_person'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['lt_name'])) || empty(trim($_POST['lt_code'])) || empty(trim($_POST['lt_date'])) || empty(trim($_POST['work_type']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $query = "UPDATE  land_task  SET  user_id = :user_id , update_date = :update_date , lt_name = :lt_name , lt_code = :lt_code , lt_date = :lt_date , work_type = :work_type , labour_amount = :labour_amount , task_description=:task_description, assigned_person=:assigned_person WHERE lt_id = :lt_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':lt_name' => $_POST['lt_name'],
        ':lt_code' => $_POST['lt_code'], 
        ':lt_date' => $_POST['lt_date'], 
        ':work_type' => $_POST['work_type'], 
        ':labour_amount' => $_POST['labour_amount'], 
        ':task_description' => $_POST['task_description'],
        ':assigned_person' => $_POST['assigned_person'],
        ':lt_id' => $_POST['lt_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land task Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $lt_id = $_POST["lt_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  land_task  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE lt_id = :lt_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':lt_id' => $_POST['lt_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land task Deleted</div>';
    }
  }
}
?>
