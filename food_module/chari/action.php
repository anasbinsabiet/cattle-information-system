<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['chari_name'])) || empty(trim($_POST['size'])) || empty(trim($_POST['unit'])) || empty(trim($_POST['farm_id']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
      
    // }else{ 
    $query = "INSERT INTO  chari (  user_id ,  create_date ,  chari_code ,  chari_name ,  size ,  unit ,  farm_id) 
VALUES (  :user_id ,  :create_date ,  :chari_code ,  :chari_name ,  :size ,  :unit ,  :farm_id)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':chari_code' => $_POST['chari_code'],
        ':chari_name' => $_POST['chari_name'],
        ':size' => $_POST['size'],
        ':unit' => $_POST['unit'],
        ':farm_id' => $_POST['farm_id']
      )
    );
    $chari_id =  $connect->lastInsertId();
    $chari_code = date("Ym")."-".$chari_id;
    echo "Chari Inserted";
    $chari_query = $connect->prepare("UPDATE chari SET chari_code = '$chari_code' WHERE chari_id = '$chari_id' ");
    $chari_query->execute();
    
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Chari Added</div>';

    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM chari WHERE chari_id = :chari_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':chari_id' => $_POST["chari_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['chari_id'] = $row['chari_id'];
      $output['chari_code'] = $row['chari_code'];
      $output['chari_name'] = $row['chari_name'];
      $output['size'] = $row['size'];
      $output['unit'] = $row['unit'];
      $output['farm_id'] = $row['farm_id'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['chari_name'])) || empty(trim($_POST['size'])) || empty(trim($_POST['unit'])) || empty(trim($_POST['farm_id']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  chari  SET  user_id = :user_id , update_date = :update_date , chari_code = :chari_code , chari_name = :chari_name , size = :size , unit = :unit , farm_id = :farm_id  WHERE chari_id = :chari_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':chari_code' => $_POST['chari_code'],
        ':chari_name' => $_POST['chari_name'], 
        ':size' => $_POST['size'], 
        ':unit' => $_POST['unit'], 
        ':farm_id' => $_POST['farm_id'], 
        ':chari_id' => $_POST['chari_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Chari Edited</div>';
    }
    }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $chari_id = $_POST["chari_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  chari  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE chari_id = :chari_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':chari_id' => $_POST['chari_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Chari Deleted</div>';
    }
  }
}
?>
