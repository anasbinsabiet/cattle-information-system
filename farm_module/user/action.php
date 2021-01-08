<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['user_name'])) || empty(trim($_POST['user_email'])) || empty(trim($_POST['user_password']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  farm_user ( user_name , user_email , user_password,  full_name , farm_id , employee_id , user_id , user_created_at) 
VALUES (  :user_name , :user_email , :user_password , :full_name , :farm_id , :employee_id , :user_id , :user_created_at)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(    
        ':user_name' => $_POST['user_name'],
        ':user_email' => $_POST['user_email'],
        ':user_password' => password_hash($_POST["user_password"], PASSWORD_DEFAULT),
        ':full_name' => $_POST['full_name'],
        ':farm_id' => $_POST['farm_id'],
        ':employee_id' => $_POST['employee_id'],
        ':user_id' => 1,
        ':user_created_at' => $create_date
      )
    );
        // if(!$statement->execute())
        // {
        //     print_r($statement->errorInfo());
        // }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">User Added</div>';

    }
  }
  // }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM farm_user WHERE farm_user_id = :farm_user_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':farm_user_id' => $_POST["farm_user_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['farm_user_id'] = $row['farm_user_id'];
      $output['user_name'] = $row['user_name'];
      $output['user_email'] = $row['user_email'];
      $output['user_password'] = $row['user_password'];
      $output['full_name'] = $row['full_name'];
      $output['farm_id'] = $row['farm_id'];
      $output['employee_id'] = $row['employee_id'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['user_name'])) || empty(trim($_POST['user_email']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
      $password = $_POST['user_password'];
      if ($password != NULL) {

      $query = "UPDATE  farm_user  SET  user_name=:user_name , user_email=:user_email , user_password=:user_password , full_name=:full_name , farm_id=:farm_id , employee_id=:employee_id , user_id=:user_id , user_update=:user_update WHERE farm_user_id = :farm_user_id";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_name' => $_POST['user_name'],
          ':user_email' => $_POST['user_email'],
          ':user_password' => password_hash($_POST["user_password"], PASSWORD_DEFAULT),
          ':full_name' => $_POST['full_name'],
          ':farm_id' => $_POST['farm_id'],
          ':employee_id' => $_POST['employee_id'],
          ':user_id' => 1,
          ':user_update' => $create_date,
          ':farm_user_id' => $_POST['farm_user_id']
          )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo 'User Edited';
      }
    }else {
              $query = "UPDATE  farm_user  SET  user_name=:user_name , user_email=:user_email , full_name=:full_name , farm_id=:farm_id , employee_id=:employee_id , user_id=:user_id , user_update=:user_update WHERE farm_user_id = :farm_user_id";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_name' => $_POST['user_name'],
          ':user_email' => $_POST['user_email'],
          ':full_name' => $_POST['full_name'],
          ':farm_id' => $_POST['farm_id'],
          ':employee_id' => $_POST['employee_id'],
          ':user_id' => 1,
          ':user_update' => $create_date,
          ':farm_user_id' => $_POST['farm_user_id']
          )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">User Edited</div>';
      }
    }
  }
// }



    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $user_id = $_POST["user_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
  }
    $query = "UPDATE  farm_user  SET  user_id=:user_id , update_date=:update_date , delete_status=:delete_status WHERE farm_user_id = :farm_user_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':user_id' => $_POST['user_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">User Deleted</div>';

    }
  }
}
?>
