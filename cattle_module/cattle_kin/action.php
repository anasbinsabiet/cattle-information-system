<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['cattle_kin_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
      $query = "INSERT INTO  cattle_kin (  user_id ,  create_date ,  cattle_kin_name) VALUES (  :user_id ,  :create_date ,  :cattle_kin_name)";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':create_date' => $create_date,
          ':cattle_kin_name' => $_POST['cattle_kin_name']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Cattle Kin Added</div>';
      }
    }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM cattle_kin WHERE cattle_kin_id = :cattle_kin_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':cattle_kin_id' => $_POST["cattle_kin_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['cattle_kin_id'] = $row['cattle_kin_id'];
      $output['cattle_kin_name'] = $row['cattle_kin_name'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['cattle_kin_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
      $query = "UPDATE  cattle_kin  SET  user_id = :user_id , update_date = :update_date , cattle_kin_name = :cattle_kin_name WHERE cattle_kin_id = :cattle_kin_id";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':update_date' => $create_date,
          ':cattle_kin_name' => $_POST['cattle_kin_name'],
          ':cattle_kin_id' => $_POST['cattle_kin_id']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Cattle Kin Edited</div>';
      }
    }

  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $cattle_kin_id = $_POST["cattle_kin_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  cattle_kin  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE cattle_kin_id = :cattle_kin_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':cattle_kin_id' => $_POST['cattle_kin_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
        echo '<div class="alert alert-success">Cattle Kin Deleted</div>';

    }
  }
}
?>
