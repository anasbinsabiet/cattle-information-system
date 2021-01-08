<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_FILES['cattle_task_pic'])) {


  if (is_array($_FILES)) {

    $src = $_FILES['cattle_task_pic']['tmp_name'];
    $targ = "images/" . $_FILES['cattle_task_pic']['name'];
    move_uploaded_file($src, $targ);

    echo $_SESSION['base_url'] . 'cattle_module/cattle_task/' . $targ;

  }

}


if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['task_date'])) || empty(trim($_POST['task_type']))|| empty(trim($_POST['assigned_person']))|| empty(trim($_POST['task_status']))|| empty(trim($_POST['task_title']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "INSERT INTO  cattle_task (  user_id ,  create_date ,  cattle_code ,  task_date ,  task_type ,  assigned_person ,  task_status ,  task_title ,  task_description ,  cattle_task_pic ) 
VALUES (  :user_id ,  :create_date ,  :cattle_code ,  :task_date ,  :task_type ,  :assigned_person ,  :task_status ,  :task_title ,  :task_description ,  :cattle_task_pic )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':cattle_code' => $_POST['cattle_code'],
        ':task_date' => $_POST['task_date'],
        ':task_type' => $_POST['task_type'],
        ':assigned_person' => $_POST['assigned_person'],
        ':task_status' => $_POST['task_status'],
        ':task_title' => $_POST['task_title'],
        ':task_description' => $_POST['task_description'],
        ':cattle_task_pic' => $_POST['cattle_task_pic_url']


      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Task Added</div>';
    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM cattle_task WHERE cattle_task_id = :cattle_task_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':cattle_task_id' => $_POST["cattle_task_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['cattle_task_id'] = $row['cattle_task_id'];
      $output['cattle_code'] = $row['cattle_code'];
      $output['task_date'] = $row['task_date'];
      $output['task_type'] = $row['task_type'];
      $output['assigned_person'] = $row['assigned_person'];
      $output['task_status'] = $row['task_status'];
      $output['task_title'] = $row['task_title'];
      $output['task_description'] = $row['task_description'];
      $output['cattle_task_pic'] = $row['cattle_task_pic'];

    }
    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['cattle_code'])) ||empty(trim($_POST['task_date'])) || empty(trim($_POST['task_type']))|| empty(trim($_POST['assigned_person']))|| empty(trim($_POST['task_status']))|| empty(trim($_POST['task_title']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  cattle_task  SET  user_id = :user_id , update_date = :update_date , cattle_code = :cattle_code , task_date = :task_date , task_type = :task_type , assigned_person = :assigned_person , task_status = :task_status , task_title = :task_title , task_description = :task_description , cattle_task_pic = :cattle_task_pic  WHERE cattle_task_id = :cattle_task_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':cattle_code' => $_POST['cattle_code'],
        ':task_date' => $_POST['task_date'], 
        ':task_type' => $_POST['task_type'], 
        ':assigned_person' => $_POST['assigned_person'], 
        ':task_status' => $_POST['task_status'], 
        ':task_title' => $_POST['task_title'], 
        ':task_description' => $_POST['task_description'],
        ':cattle_task_pic' => $_POST['cattle_task_pic_url'],
        ':cattle_task_id' => $_POST['cattle_task_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Task Edited</div>';
    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $cattle_task_id = $_POST["cattle_task_id"]; 

        $status = 0;

        if ($_POST["status"] == 0) {
            $status = 1;
        }

    $query = "UPDATE  cattle_task  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE cattle_task_id = :cattle_task_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
         
        ':cattle_task_id' => $_POST['cattle_task_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Task Deleted</div>';
    }
  }


}

?>
