<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['fp_name'])) || empty(trim($_POST['start_date'])) || empty(trim($_POST['manager'])) || empty(trim($_POST['contact_no'])) || empty(trim($_POST['address']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  farm_profile (  user_id ,  create_date ,  fp_name ,  start_date ,  total_cow ,  total_chari ,  total_storage, total_required_employee, manager, contact_no, address, remarks) 
VALUES (  :user_id ,  :create_date ,  :fp_name ,  :start_date ,  :total_cow ,  :total_chari ,  :total_storage, :total_required_employee, :manager, :contact_no, :address, :remarks)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':fp_name' => $_POST['fp_name'],
        ':start_date' => $_POST['start_date'],
        ':total_cow' => $_POST['total_cow'],
        ':total_chari' => $_POST['total_chari'],
        ':total_storage' => $_POST['total_storage'],
        ':total_required_employee' => $_POST['total_required_employee'],
        ':manager' => $_POST['manager'],
        ':contact_no' => $_POST['contact_no'],
        ':address' => $_POST['address'],
        ':remarks' => $_POST['remarks'],
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Farm Profile Added</div>';
    }
  }
  // }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM farm_profile WHERE farm_profile_id = :farm_profile_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':farm_profile_id' => $_POST["farm_profile_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['farm_profile_id'] = $row['farm_profile_id'];
      $output['fp_name'] = $row['fp_name'];
      $output['start_date'] = $row['start_date'];
      $output['total_cow'] = $row['total_cow'];
      $output['total_chari'] = $row['total_chari'];
      $output['total_storage'] = $row['total_storage'];
      $output['total_required_employee'] = $row['total_required_employee'];
      $output['manager'] = $row['manager'];
      $output['contact_no'] = $row['contact_no'];
      $output['address'] = $row['address'];
      $output['remarks'] = $row['remarks'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['fp_name'])) || empty(trim($_POST['start_date'])) || empty(trim($_POST['manager'])) || empty(trim($_POST['contact_no'])) || empty(trim($_POST['address']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "UPDATE  farm_profile  SET  user_id = :user_id , update_date = :update_date , fp_name=:fp_name , start_date=:start_date , total_cow=:total_cow , total_chari=:total_chari , total_storage=:total_storage , total_required_employee=:total_required_employee , manager=:manager , contact_no=:contact_no, address=:address, remarks=:remarks WHERE farm_profile_id = :farm_profile_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1 , 
        ':update_date' => $create_date , 
        ':fp_name' => $_POST["fp_name"],
        ':start_date' => $_POST["start_date"],
        ':total_cow' => $_POST["total_cow"],
        ':total_chari' => $_POST["total_chari"],
        ':total_storage' => $_POST["total_storage"],
        ':total_required_employee' => $_POST["total_required_employee"],
        ':manager' => $_POST["manager"],
        ':contact_no' => $_POST["contact_no"],
        ':address' => $_POST["address"],
        ':remarks' => $_POST["remarks"],
        ':farm_profile_id' => $_POST["farm_profile_id"]
        )
    );
        if(!$statement->execute())
        {
            print_r($statement->errorInfo());
        }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Farm Profile Edited</div>';
    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $farm_profile_id = $_POST["farm_profile_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  farm_profile  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE farm_profile_id = :farm_profile_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':farm_profile_id' => $_POST['farm_profile_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Farm Profile Deleted</div>';

    }
  }
}
?>
