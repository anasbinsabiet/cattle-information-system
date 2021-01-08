<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_FILES['growth_tracking_pic'])) {


  if (is_array($_FILES)) {

    $src = $_FILES['growth_tracking_pic']['tmp_name'];
    $targ = "images/" . $_FILES['growth_tracking_pic']['name'];
    move_uploaded_file($src, $targ);

    echo $_SESSION['base_url'] . 'cattle_module/growth_tracking/' . $targ;

  }

}


if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['select_date'])) || empty(trim($_POST['cattle_code']))|| empty(trim($_POST['weight']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  growth_tracking (  user_id ,  create_date ,  cattle_code ,   select_date ,  weight ,  height ,  width ,  length ,  teeth ,  age ,  remarks  ,  growth_tracking_pic_url ) 
VALUES (  :user_id ,  :create_date ,  :cattle_code ,  :select_date ,  :weight ,  :height ,  :width ,  :length ,  :teeth ,  :age ,  :remarks  ,  :growth_tracking_pic_url )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':cattle_code' => $_POST['cattle_code'],
        ':select_date' => $_POST['select_date'], 
        ':weight' => $_POST['weight'], 
        ':height' => $_POST['height'], 
        ':width' => $_POST['width'], 
        ':length' => $_POST['length'], 
        ':teeth' => $_POST['teeth'], 
        ':age' => $_POST['age'], 
        ':remarks' => $_POST['remarks'],
        ':growth_tracking_pic_url' => $_POST['growth_tracking_pic_url']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Growth Tracking Added</div>';
    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM growth_tracking WHERE growth_tracking_id = :growth_tracking_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':growth_tracking_id' => $_POST["growth_tracking_id"]
      )
    );

    $result = $statement->fetchAll();

    foreach ($result as $row) {

      $output['growth_tracking_id'] = $row['growth_tracking_id'];
      $output['cattle_code'] = $row['cattle_code'];
      $output['select_date'] = $row['select_date'];
      $output['weight'] = $row['weight'];
      $output['height'] = $row['height'];
      $output['width'] = $row['width'];
      $output['length'] = $row['length'];
      $output['teeth'] = $row['teeth'];
      $output['age'] = $row['age'];
      $output['remarks'] = $row['remarks'];
      $output['growth_tracking_pic_url'] = $row['growth_tracking_pic_url'];

    }

    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['select_date'])) || empty(trim($_POST['cattle_code']))|| empty(trim($_POST['weight']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  growth_tracking  SET  user_id = :user_id , update_date = :update_date, cattle_code = :cattle_code ,  select_date = :select_date , weight = :weight , height = :height , width = :width , length = :length , teeth = :teeth , age = :age , remarks = :remarks , growth_tracking_pic_url = :growth_tracking_pic_url  WHERE growth_tracking_id = :growth_tracking_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':cattle_code' => $_POST['cattle_code'],
        ':select_date' => $_POST['select_date'],
        ':weight' => $_POST['weight'],
        ':height' => $_POST['height'],
        ':width' => $_POST['width'],
        ':length' => $_POST['length'],
        ':teeth' => $_POST['teeth'],
        ':age' => $_POST['age'],
        ':remarks' => $_POST['remarks'],
        ':growth_tracking_pic_url' => $_POST['growth_tracking_pic_url'],
        ':growth_tracking_id' => $_POST['growth_tracking_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Growth Tracking Edited</div>';
    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $growth_tracking_id = $_POST["growth_tracking_id"]; 

        $status = 0;

        if ($_POST["status"] == 0) {
            $status = 1;
        }

    $query = "UPDATE  growth_tracking  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE growth_tracking_id = :growth_tracking_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
         
        ':growth_tracking_id' => $_POST['growth_tracking_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Growth Tracking Deleted</div>';
    }
  }


}

?>
