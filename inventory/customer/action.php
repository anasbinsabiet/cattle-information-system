<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['customer_name'])) || empty(trim($_POST['customer_number']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
      $query = "INSERT INTO  customer (  user_id ,  create_date ,  customer_name , customer_number , customer_address , customer_email) VALUES (  :user_id ,  :create_date ,  :customer_name, :customer_number , :customer_address , :customer_email)";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':create_date' => $create_date,
          ':customer_name' => $_POST['customer_name'],
          ':customer_number' => $_POST['customer_number'],
          ':customer_address' => $_POST['customer_address'],
          ':customer_email' => $_POST['customer_email']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Customer Added</div>';
      }
    }
  // }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM customer WHERE customer_id = :customer_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':customer_id' => $_POST["customer_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['customer_id'] = $row['customer_id'];
      $output['customer_name'] = $row['customer_name'];
      $output['customer_number'] = $row['customer_number'];
      $output['customer_address'] = $row['customer_address'];
      $output['customer_email'] = $row['customer_email'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    // if(empty(trim($_POST['customer_name'])) || empty(trim($_POST['customer_number']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
      $query = "UPDATE  customer  SET  user_id = :user_id , update_date = :update_date , customer_name = :customer_name , customer_number=:customer_number , customer_address=:customer_address , customer_email=:customer_email WHERE customer_id = :customer_id";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':update_date' => $create_date,
          ':customer_name' => $_POST['customer_name'],
          ':customer_number' => $_POST['customer_number'],
          ':customer_address' => $_POST['customer_address'],
          ':customer_email' => $_POST['customer_email'],
          ':customer_id' => $_POST['customer_id']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Customer Edited</div>';
      }
    }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $customer_id = $_POST["customer_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  customer  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE customer_id = :customer_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':customer_id' => $_POST['customer_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Customer Deleted</div>';
    }
  }
}
?>
