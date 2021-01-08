<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['storage_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  storage (  user_id ,  create_date ,  storage_name) 
VALUES (  :user_id ,  :create_date ,  :storage_name)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':storage_name' => $_POST['storage_name']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Storage Added</div>';
    }
  }
// }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM storage WHERE storage_id = :storage_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':storage_id' => $_POST["storage_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['storage_id'] = $row['storage_id'];
      $output['storage_name'] = $row['storage_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    if(empty(trim($_POST['storage_name']))) {
      echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    }else{

    $query = "UPDATE  storage  SET  user_id = :user_id , update_date = :update_date , storage_name = :storage_name WHERE storage_id = :storage_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':storage_name' => $_POST['storage_name'],
        ':storage_id' => $_POST['storage_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Storage Edited</div>';
    }
  }
}


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $storage_id = $_POST["storage_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  storage  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE storage_id = :storage_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':storage_id' => $_POST['storage_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Storage Deleted</div>';
    }
  }
}
?>
