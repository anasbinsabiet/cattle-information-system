<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_FILES['task_complete_pic'])) {


  if (is_array($_FILES)) {

    $src = $_FILES['task_complete_pic']['tmp_name'];
    $targ = "images/" . $_FILES['task_complete_pic']['name'];
    move_uploaded_file($src, $targ);

    echo $_SESSION['base_url'] . 'task_module/task_complete/' . $targ;

  }

}
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

     if(empty(trim($_POST['task_id'])) || empty(trim($_POST['task_status']))) {
      echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    }else{

    $query = "INSERT INTO  task_complete (  user_id ,  create_date ,  task_id ,  task_status ,  remarks ,  task_complete_pic) 
VALUES (  :user_id ,  :create_date ,  :task_id ,  :task_status ,  :remarks , :task_complete_pic)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':task_id' => $_POST['task_id'],
        ':task_status' => $_POST['task_status'],
        ':remarks' => $_POST['remarks'],
        ':task_complete_pic' => $_POST['task_complete_pic_url']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Complete Added</div>';
    }
  }
}
  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM task_complete WHERE task_complete_id = :task_complete_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':task_complete_id' => $_POST["task_complete_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['task_complete_id'] = $row['task_complete_id'];
      $output['task_id'] = $row['task_id'];
      $output['task_status'] = $row['task_status'];
      $output['remarks'] = $row['remarks'];
      $output['task_complete_pic'] = $row['task_complete_pic'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    if(empty(trim($_POST['task_id'])) || empty(trim($_POST['task_status']))) {
      echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    }else{

    $query = "UPDATE  task_complete  SET  user_id = :user_id , update_date = :update_date , task_id=:task_id , task_status=:task_status , remarks=:remarks , task_complete_pic=:task_complete_pic WHERE task_complete_id = :task_complete_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1 , 
        ':update_date' => $create_date , 
        ':task_id' => $_POST["task_id"],
        ':task_status' => $_POST["task_status"],
        ':remarks' => $_POST["remarks"],
        ':task_complete_pic' => $_POST['task_complete_pic_url'],
        ':task_complete_id' => $_POST["task_complete_id"]
        )
    );
        if(!$statement->execute())
        {
            print_r($statement->errorInfo());
        }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Complete Edited</div>';
    }
  }
}


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $task_complete_id = $_POST["task_complete_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  task_complete  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE task_complete_id = :task_complete_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':task_complete_id' => $_POST['task_complete_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Complete Edited</div>';
    }
  }
////////////////////            verify status
  if ($_POST['btn_action'] == 'verify') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $task_complete_id = $_POST["task_complete_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  task_complete  SET  user_id = :user_id , update_date = :update_date ,  verify = :verify  WHERE task_complete_id = :task_complete_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':verify' => $status,
        ':task_complete_id' => $_POST['task_complete_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Task Verified</div>';
    }
  }
}
?>
