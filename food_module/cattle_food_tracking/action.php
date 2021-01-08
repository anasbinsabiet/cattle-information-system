<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['cattle_code'])) || empty(trim($_POST['chari_no']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  cattle_feed_tracking (  user_id ,  create_date ,  cattle_code ,  date ,  chari_no ,  feeding_formula_number , remarks, avg_amount_of_food) 
VALUES (  :user_id ,  :create_date ,  :cattle_code ,  :date ,  :chari_no ,  :feeding_formula_number ,  :remarks, :avg_amount_of_food)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':cattle_code' => $_POST['cattle_code'],
        ':date' => $_POST['date'],
        ':chari_no' => $_POST['chari_no'],
        ':feeding_formula_number' => $_POST['feeding_formula_number'],
        ':remarks' => $_POST['remarks'],
        ':avg_amount_of_food' => $_POST['avg_amount_of_food']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Food Tracking Added</div>';
    }
  }
  // }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM cattle_feed_tracking WHERE cft_id = :cft_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':cft_id' => $_POST["cft_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['cft_id'] = $row['cft_id'];
      $output['cattle_code'] = $row['cattle_code'];
      $output['date'] = $row['date'];
      $output['chari_no'] = $row['chari_no'];
      $output['feeding_formula_number'] = $row['feeding_formula_number'];
      $output['remarks'] = $row['remarks'];
      $output['avg_amount_of_food'] = $row['avg_amount_of_food'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['cattle_code'])) || empty(trim($_POST['chari_no']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "UPDATE  cattle_feed_tracking  SET  user_id = :user_id , update_date = :update_date , cattle_code = :cattle_code , date = :date , chari_no = :chari_no , feeding_formula_number = :feeding_formula_number , remarks = :remarks , avg_amount_of_food=:avg_amount_of_food WHERE cft_id = :cft_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':cattle_code' => $_POST['cattle_code'],
        ':date' => $_POST['date'], 
        ':chari_no' => $_POST['chari_no'], 
        ':feeding_formula_number' => $_POST['feeding_formula_number'], 
        ':remarks' => $_POST['remarks'], 
        ':avg_amount_of_food' => $_POST['avg_amount_of_food'],
        ':cft_id' => $_POST['cft_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Food Tracking Edited</div>';
    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $cft_id = $_POST["cft_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  cattle_feed_tracking  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE cft_id = :cft_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':cft_id' => $_POST['cft_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Food Tracking Deleted</div>';
    }
  }
}
?>
