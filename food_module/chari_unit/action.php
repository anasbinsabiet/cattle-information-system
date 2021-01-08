<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");


    // if(empty(trim($_POST['chari_unit_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  chari_unit (  user_id ,  create_date ,  chari_unit_name) 
VALUES (  :user_id ,  :create_date ,  :chari_unit_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':chari_unit_name' => $_POST['chari_unit_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Chari Unit Added</div>';
    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM chari_unit WHERE chari_unit_id = :chari_unit_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':chari_unit_id' => $_POST["chari_unit_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['chari_unit_id'] = $row['chari_unit_id'];
      $output['chari_unit_name'] = $row['chari_unit_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['chari_unit_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  chari_unit  SET  user_id = :user_id , update_date = :update_date , chari_unit_name = :chari_unit_name WHERE chari_unit_id = :chari_unit_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':chari_unit_name' => $_POST['chari_unit_name'],
        ':chari_unit_id' => $_POST['chari_unit_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Chari Unit Edited</div>';
    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $chari_unit_id = $_POST["chari_unit_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  chari_unit  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE chari_unit_id = :chari_unit_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':chari_unit_id' => $_POST['chari_unit_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Chari Unit Deleted</div>';

    }
  }
}
?>
