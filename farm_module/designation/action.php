<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['designation_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
      $query = "INSERT INTO  designation (  user_id ,  create_date ,  designation_name) VALUES (  :user_id ,  :create_date ,  :designation_name)";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':create_date' => $create_date,
          ':designation_name' => $_POST['designation_name']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Designation Added</div>';
      }
    }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM designation WHERE designation_id = :designation_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':designation_id' => $_POST["designation_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['designation_id'] = $row['designation_id'];
      $output['designation_name'] = $row['designation_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['designation_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
      $query = "UPDATE  designation  SET  user_id = :user_id , update_date = :update_date , designation_name = :designation_name WHERE designation_id = :designation_id";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':update_date' => $create_date,
          ':designation_name' => $_POST['designation_name'],
          ':designation_id' => $_POST['designation_id']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Designation Edited</div>';
      }
    }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $designation_id = $_POST["designation_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  designation  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE designation_id = :designation_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':designation_id' => $_POST['designation_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Designation Deleted</div>';

    }
  }
}
?>
