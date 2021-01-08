<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    //  if(empty(trim($_POST['med_name'])) || empty(trim($_POST['med_unit'])) || empty(trim($_POST['unit_price']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  medicine (  user_id ,  create_date ,  med_name ,  med_gen_name ,  med_purpose ,  med_unit , unit_price) 
VALUES (  :user_id ,  :create_date ,  :med_name ,  :med_gen_name ,  :med_purpose ,  :med_unit, :unit_price)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':med_name' => $_POST['med_name'],
        ':med_gen_name' => $_POST['med_gen_name'],
        ':med_purpose' => $_POST['med_purpose'],
        ':med_unit' => $_POST['med_unit'],
        ':unit_price' => $_POST['unit_price']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Medicine Added</div>';
    }
  }
// }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM medicine WHERE med_id = :med_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':med_id' => $_POST["med_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['med_id'] = $row['med_id'];
      $output['med_name'] = $row['med_name'];
      $output['med_gen_name'] = $row['med_gen_name'];
      $output['med_purpose'] = $row['med_purpose'];
      $output['med_unit'] = $row['med_unit'];
      $output['unit_price'] = $row['unit_price'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['med_name'])) || empty(trim($_POST['med_unit'])) || empty(trim($_POST['unit_price']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  medicine  SET  user_id = :user_id , update_date = :update_date , med_name=:med_name , med_gen_name=:med_gen_name , med_purpose=:med_purpose , med_unit=:med_unit , unit_price=:unit_price WHERE med_id = :med_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1 , 
        ':update_date' => $create_date , 
        ':med_name' => $_POST["med_name"],
        ':med_gen_name' => $_POST["med_gen_name"],
        ':med_purpose' => $_POST["med_purpose"],
        ':med_unit' => $_POST["med_unit"],
        ':unit_price' => $_POST["unit_price"],
        ':med_id' => $_POST["med_id"]
        )
    );
        if(!$statement->execute())
        {
            print_r($statement->errorInfo());
        }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Medicine Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $med_id = $_POST["med_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  medicine  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE med_id = :med_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':med_id' => $_POST['med_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Medicine Deleted</div>';
    }
  }
}
?>
