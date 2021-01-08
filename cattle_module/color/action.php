<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['color_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Field cannot be empty</div>';
      
    // }else{
      $query = "INSERT INTO  color (  user_id ,  create_date ,  color_name) VALUES (  :user_id ,  :create_date ,  :color_name)";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':create_date' => $create_date,
          ':color_name' => $_POST['color_name']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo 'Color Added';
      }
    }
  // }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM color WHERE color_id = :color_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':color_id' => $_POST["color_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['color_id'] = $row['color_id'];
      $output['color_name'] = $row['color_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    // if(empty(trim($_POST['color_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (*) Field cannot be empty</div>';
    // }else{
      $query = "UPDATE  color  SET  user_id = :user_id , update_date = :update_date , color_name = :color_name WHERE color_id = :color_id";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':update_date' => $create_date,
          ':color_name' => $_POST['color_name'],
          ':color_id' => $_POST['color_id']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Color Edited</div>';
      }
    }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $color_id = $_POST["color_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  color  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE color_id = :color_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':color_id' => $_POST['color_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Color Deleted</div>';

    }
  }
}
?>
