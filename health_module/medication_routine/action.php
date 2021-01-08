<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    //  if(empty(trim($_POST['cattle_id'])) || empty(trim($_POST['medicine_name'])) || empty(trim($_POST['dr_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  medication_routine (  user_id ,  create_date ,  cattle_id ,  medicine_name ,  dr_name ,  problem_type ,  problem_area, duration_date_from, duration_date_to, how_many_time, remarks) 
VALUES (  :user_id ,  :create_date ,  :cattle_id ,  :medicine_name ,  :dr_name ,  :problem_type ,  :problem_area, :duration_date_from, :duration_date_to, :how_many_time, :remarks)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':cattle_id' => $_POST['cattle_id'],
        ':medicine_name' => $_POST['medicine_name'],
        ':dr_name' => $_POST['dr_name'],
        ':problem_type' => $_POST['problem_type'],
        ':problem_area' => $_POST['problem_area'],
        ':duration_date_from' => $_POST['duration_date_from'],
        ':duration_date_to' => $_POST['duration_date_to'],
        ':how_many_time' => $_POST['how_many_time'],
        ':remarks' => $_POST['remarks']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Medication Routine Added</div>';
    }
  }
// }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM medication_routine WHERE mr_id = :mr_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':mr_id' => $_POST["mr_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['mr_id'] = $row['mr_id'];
      $output['cattle_id'] = $row['cattle_id'];
      $output['medicine_name'] = $row['medicine_name'];
      $output['dr_name'] = $row['dr_name'];
      $output['problem_type'] = $row['problem_type'];
      $output['problem_area'] = $row['problem_area'];
      $output['duration_date_from'] = $row['duration_date_from'];
      $output['duration_date_to'] = $row['duration_date_to'];
      $output['how_many_time'] = $row['how_many_time'];
      $output['remarks'] = $row['remarks'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['cattle_id'])) || empty(trim($_POST['medicine_name'])) || empty(trim($_POST['dr_name']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "UPDATE  medication_routine  SET  user_id = :user_id , update_date = :update_date , cattle_id=:cattle_id , medicine_name=:medicine_name , dr_name=:dr_name , problem_type=:problem_type , problem_area=:problem_area , duration_date_from=:duration_date_from , duration_date_to=:duration_date_to , how_many_time=:how_many_time, remarks=:remarks WHERE mr_id = :mr_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1 , 
        ':update_date' => $create_date , 
        ':cattle_id' => $_POST["cattle_id"],
        ':medicine_name' => $_POST["medicine_name"],
        ':dr_name' => $_POST["dr_name"],
        ':problem_type' => $_POST["problem_type"],
        ':problem_area' => $_POST["problem_area"],
        ':duration_date_from' => $_POST["duration_date_from"],
        ':duration_date_to' => $_POST["duration_date_to"],
        ':how_many_time' => $_POST["how_many_time"],
        ':remarks' => $_POST["remarks"],
        ':mr_id' => $_POST["mr_id"]
        )
    );
        if(!$statement->execute())
        {
            print_r($statement->errorInfo());
        }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Medication Routine Edited</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $mr_id = $_POST["mr_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  medication_routine  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE mr_id = :mr_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':mr_id' => $_POST['mr_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Medication Routine Deleted</div>';
    }
  }
}
?>
