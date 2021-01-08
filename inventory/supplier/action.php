<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['supplier_name'])) || empty(trim($_POST['supplier_number']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
      $query = "INSERT INTO  supplier (  user_id ,  create_date ,  supplier_name , supplier_number , supplier_address , supplier_email) VALUES (  :user_id ,  :create_date ,  :supplier_name, :supplier_number , :supplier_address , :supplier_email)";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':create_date' => $create_date,
          ':supplier_name' => $_POST['supplier_name'],
          ':supplier_number' => $_POST['supplier_number'],
          ':supplier_address' => $_POST['supplier_address'],
          ':supplier_email' => $_POST['supplier_email']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Supplier Added</div>';
      }
    }
  // }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM supplier WHERE supplier_id = :supplier_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':supplier_id' => $_POST["supplier_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['supplier_id'] = $row['supplier_id'];
      $output['supplier_name'] = $row['supplier_name'];
      $output['supplier_number'] = $row['supplier_number'];
      $output['supplier_address'] = $row['supplier_address'];
      $output['supplier_email'] = $row['supplier_email'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    // $create_date = date("Y-m-d H:i:s");
    // if(empty(trim($_POST['supplier_name'])) || empty(trim($_POST['supplier_number']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
      $query = "UPDATE  supplier  SET  user_id = :user_id , update_date = :update_date , supplier_name = :supplier_name , supplier_number=:supplier_number , supplier_address=:supplier_address , supplier_email=:supplier_email WHERE supplier_id = :supplier_id";
      $statement = $connect->prepare($query);
      $statement->execute(
        array(
          ':user_id' => 1,
          ':update_date' => $create_date,
          ':supplier_name' => $_POST['supplier_name'],
          ':supplier_number' => $_POST['supplier_number'],
          ':supplier_address' => $_POST['supplier_address'],
          ':supplier_email' => $_POST['supplier_email'],
          ':supplier_id' => $_POST['supplier_id']
        )
      );
      $result = $statement->fetchAll();
      if (isset($result)) {
        echo '<div class="alert alert-success">Supplier Edited</div>';
      }
    }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $supplier_id = $_POST["supplier_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  supplier  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE supplier_id = :supplier_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':supplier_id' => $_POST['supplier_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Supplier Deleted</div>';
    }
  }
}
?>
