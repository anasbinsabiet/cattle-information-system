<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $query = "INSERT INTO  health_tracking (  user_id ,  create_date ,  cattle_id ,  date ,  problem_type ,  problem_details ,  problem_area, medication_type, medication_details, medication_routine_id, dr_id, dr_visiting_time, health_checkup_id, remarks) 
VALUES (  :user_id ,  :create_date ,  :cattle_id ,  :date ,  :problem_type ,  :problem_details ,  :problem_area, :medication_type, :medication_details, :medication_routine_id, :dr_id, :dr_visiting_time, :health_checkup_id, :remarks)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':cattle_id' => $_POST['cattle_id'],
        ':date' => $_POST['date'],
        ':problem_type' => $_POST['problem_type'],
        ':problem_details' => $_POST['problem_details'],
        ':problem_area' => $_POST['problem_area'],
        ':medication_type' => $_POST['medication_type'],
        ':medication_details' => $_POST['medication_details'],
        ':medication_routine_id' => $_POST['medication_routine_id'],
        ':dr_id' => $_POST['dr_id'],
        ':dr_visiting_time' => $_POST['dr_visiting_time'],
        ':health_checkup_id' => $_POST['health_checkup_id'],
        ':remarks' => $_POST['remarks'],
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo 'health_tracking Added';
    }
  }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM health_tracking WHERE ht_id = :ht_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':ht_id' => $_POST["ht_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['ht_id'] = $row['ht_id'];
      $output['cattle_id'] = $row['cattle_id'];
      $output['date'] = $row['date'];
      $output['problem_type'] = $row['problem_type'];
      $output['problem_details'] = $row['problem_details'];
      $output['problem_area'] = $row['problem_area'];
      $output['medication_type'] = $row['medication_type'];
      $output['medication_details'] = $row['medication_details'];
      $output['medication_routine_id'] = $row['medication_routine_id'];
      $output['dr_id'] = $row['dr_id'];
      $output['dr_visiting_time'] = $row['dr_visiting_time'];
      $output['health_checkup_id'] = $row['health_checkup_id'];
      $output['remarks'] = $row['remarks'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $query = "UPDATE  health_tracking  SET  user_id = :user_id , update_date = :update_date , cattle_id=:cattle_id , date=:date , problem_type=:problem_type , problem_details=:problem_details , problem_area=:problem_area , medication_type=:medication_type , medication_details=:medication_details , medication_routine_id=:medication_routine_id, dr_id=:dr_id, dr_visiting_time=:dr_visiting_time, health_checkup_id=:health_checkup_id, remarks=:remarks WHERE ht_id = :ht_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':cattle_id' => $_POST['cattle_id'],
        ':date' => $_POST['date'],
        ':problem_type' => $_POST['problem_type'],
        ':problem_details' => $_POST['problem_details'],
        ':problem_area' => $_POST['problem_area'],
        ':medication_type' => $_POST['medication_type'],
        ':medication_details' => $_POST['medication_details'],
        ':medication_routine_id' => $_POST['medication_routine_id'],
        ':dr_id' => $_POST['dr_id'],
        ':dr_visiting_time' => $_POST['dr_visiting_time'],
        ':health_checkup_id' => $_POST['health_checkup_id'],
        ':remarks' => $_POST['remarks'],
        ':ht_id' => $_POST["ht_id"]
        )
    );
        // if(!$statement->execute())
        // {
        //     print_r($statement->errorInfo());
        // }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo 'health_tracking Edited';
    }
  }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $ht_id = $_POST["ht_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  health_tracking  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE ht_id = :ht_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':ht_id' => $_POST['ht_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo 'health_tracking Deleted';
    }
  }
}
?>
