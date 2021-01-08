<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['work_type_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "INSERT INTO  work_type (  user_id ,  create_date ,  work_type_name) 
VALUES (  :user_id ,  :create_date ,  :work_type_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':work_type_name' => $_POST['work_type_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Work Type Added</div>';
    }
  }
// }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM work_type WHERE work_type_id = :work_type_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':work_type_id' => $_POST["work_type_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['work_type_id'] = $row['work_type_id'];
      $output['work_type_name'] = $row['work_type_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['work_type_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "UPDATE  work_type  SET  user_id = :user_id , update_date = :update_date , work_type_name = :work_type_name WHERE work_type_id = :work_type_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':work_type_name' => $_POST['work_type_name'],
        ':work_type_id' => $_POST['work_type_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Work Type Edited</div>';
    }
  } 
  // }  


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $work_type_id = $_POST["work_type_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  work_type  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE work_type_id = :work_type_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':work_type_id' => $_POST['work_type_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Work Type Deleted</div>';
    }
  }
}
?>
