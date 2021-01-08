<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_FILES['health_checkup_pic'])) {


  if (is_array($_FILES)) {

    $src = $_FILES['health_checkup_pic']['tmp_name'];
    $targ = "images/" . $_FILES['health_checkup_pic']['name'];
    move_uploaded_file($src, $targ);

    echo 'https://gorukhamari.com/' . 'health_module/health_checkup/' . $targ;

  }

}

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    if ($_POST['dr_visiting_time'] == '') {
        $dr_visiting_time = '00:00:00';
    }else{
        $dr_visiting_time = $_POST['dr_visiting_time'];
    }

    //  if(empty(trim($_POST['cattle_id'])) || empty(trim($_POST['dr_id'])) || empty(trim($_POST['date']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "INSERT INTO  health_checkup (  user_id ,  create_date , cattle_id ,  date ,  dr_id ,  dr_advise ,  medicine_id , dr_visiting_time ,  medicine_routine_id, remarks , problem_type , problem_details , problem_area , health_checkup_pic ) 
VALUES (  :user_id ,  :create_date , :cattle_id , :date ,  :dr_id , :dr_advise , :medicine_id , :dr_visiting_time , :medicine_routine_id, :remarks , :problem_type , :problem_details , :problem_area , :health_checkup_pic )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':cattle_id' => $_POST['cattle_id'],
        ':date' => $_POST['date'],
        ':dr_id' => $_POST['dr_id'],
        ':dr_advise' => $_POST['dr_advise'],
        ':medicine_id' => $_POST['medicine_id'],
        ':dr_visiting_time' => $dr_visiting_time,
        ':medicine_routine_id' => $_POST['medicine_routine_id'],
        ':remarks' => $_POST['remarks'],
        ':problem_type' => $_POST['problem_type'],
        ':problem_details' => $_POST['problem_details'],
        ':problem_area' => $_POST['problem_area'],
        ':health_checkup_pic' => $_POST['health_checkup_pic_url']
      )
    );
        // if(!$statement->execute())
        // {
        //     print_r($statement->errorInfo());
        // }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Health Checkup Added</div>';
    }
  }
// }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM health_checkup WHERE hc_id = :hc_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':hc_id' => $_POST["hc_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['hc_id'] = $row['hc_id'];
      $output['cattle_id'] = $row['cattle_id'];
      $output['date'] = $row['date'];
      $output['dr_id'] = $row['dr_id'];
      $output['dr_advise'] = $row['dr_advise'];
      $output['medicine_id'] = $row['medicine_id'];
      $output['dr_visiting_time'] = $row['dr_visiting_time'];
      $output['medicine_routine_id'] = $row['medicine_routine_id'];
      $output['remarks'] = $row['remarks'];
      $output['problem_type'] = $row['problem_type'];
      $output['problem_details'] = $row['problem_details'];
      $output['problem_area'] = $row['problem_area'];
      $output['health_checkup_pic'] = $row['health_checkup_pic'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    if ($_POST['dr_visiting_time'] == '') {
        $dr_visiting_time = '00:00:00';
    }else{
        $dr_visiting_time = $_POST['dr_visiting_time'];
    }

    //  if(empty(trim($_POST['cattle_id'])) || empty(trim($_POST['dr_id'])) || empty(trim($_POST['date']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "UPDATE  health_checkup  SET  user_id=:user_id ,  create_date=:create_date , cattle_id=:cattle_id ,  date=:date , dr_id=:dr_id ,  dr_advise=:dr_advise , medicine_id=:medicine_id , dr_visiting_time=:dr_visiting_time , medicine_routine_id=:medicine_routine_id, remarks=:remarks , problem_type=:problem_type , problem_details=:problem_details , problem_area=:problem_area , health_checkup_pic=:health_checkup_pic WHERE hc_id = :hc_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':cattle_id' => $_POST['cattle_id'],
        ':date' => $_POST['date'],
        ':dr_id' => $_POST['dr_id'],
        ':dr_advise' => $_POST['dr_advise'],
        ':medicine_id' => $_POST['medicine_id'],
        ':dr_visiting_time' => $_POST['dr_visiting_time'],
        ':medicine_routine_id' => $_POST['medicine_routine_id'],
        ':remarks' => $_POST['remarks'],
        ':problem_type' => $_POST['problem_type'],
        ':problem_details' => $_POST['problem_details'],
        ':problem_area' => $_POST['problem_area'],
        ':health_checkup_pic' => $_POST['health_checkup_pic_url'],
        ':hc_id' => $_POST['hc_id']
      )
    );
        if(!$statement->execute())
        {
            print_r($statement->errorInfo());
        }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Health Checkup Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $hc_id = $_POST["hc_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  health_checkup  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE hc_id = :hc_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':hc_id' => $_POST['hc_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Health Checkup Deleted</div>';
    }
  }
}
?>