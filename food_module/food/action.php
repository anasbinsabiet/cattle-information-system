<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_FILES['food_pic'])) {


  if (is_array($_FILES)) {

    $src = $_FILES['food_pic']['tmp_name'];
    $targ = "images/" . $_FILES['food_pic']['name'];
    move_uploaded_file($src, $targ);

    echo $_SESSION['base_url'] . 'food_module/food/' . $targ;

  }

}

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['food_name'])) || empty(trim($_POST['unit'])) || empty(trim($_POST['unit_price']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  food (  user_id ,  create_date ,  food_name ,  food_type ,  food_desc , unit , unit_price , food_pic) 
VALUES (  :user_id ,  :create_date ,  :food_name ,  :food_type ,  :food_desc , :unit , :unit_price ,  :food_pic)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':food_name' => $_POST['food_name'],
        ':food_type' => $_POST['food_type'],
        ':food_desc' => $_POST['food_desc'],
        ':unit' => $_POST['unit'],
        ':unit_price' => $_POST['unit_price'],
        ':food_pic' => $_POST['food_pic_url']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Food Added</div>';

    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM food WHERE food_id = :food_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':food_id' => $_POST["food_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['food_id'] = $row['food_id'];
      $output['food_name'] = $row['food_name'];
      $output['food_type'] = $row['food_type'];
      $output['food_desc'] = $row['food_desc'];
      $output['unit'] = $row['unit'];
      $output['unit_price'] = $row['unit_price'];
      $output['food_pic'] = $row['food_pic'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['food_name'])) || empty(trim($_POST['unit'])) || empty(trim($_POST['unit_price']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "UPDATE  food  SET  user_id = :user_id , update_date = :update_date , food_name = :food_name , food_type = :food_type , food_desc = :food_desc , unit = :unit, unit_price = :unit_price , food_pic=:food_pic  WHERE food_id = :food_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':food_name' => $_POST['food_name'],
        ':food_type' => $_POST['food_type'], 
        ':food_desc' => $_POST['food_desc'],
        ':unit' => $_POST['unit'],
        ':unit_price' => $_POST['unit_price'],
        ':food_pic' => $_POST['food_pic_url'],
        ':food_id' => $_POST['food_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Food Edited</div>';

    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $food_id = $_POST["food_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  food  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE food_id = :food_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':food_id' => $_POST['food_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Food Deleted</div>';

    }
  }
}
?>
