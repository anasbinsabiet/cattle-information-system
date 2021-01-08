<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";
if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    //  if(empty(trim($_POST['dr_name'])) || empty(trim($_POST['phone_no_1']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  doctor_profile (  user_id ,  create_date ,  dr_name ,  address ,  chamber_address ,  phone_no_1 ,  phone_no_2, email, social_media, dr_helping_hand , dr_helping_hand_contact , chamber_timing_start , chamber_timing_end , day_off , visiting_charge_in_chamber , visiting_charge_in_farm) 
VALUES (  :user_id ,  :create_date ,  :dr_name ,  :address ,  :chamber_address ,  :phone_no_1 ,  :phone_no_2, :email, :social_media, :dr_helping_hand , :dr_helping_hand_contact , :chamber_timing_start , :chamber_timing_end , :day_off , :visiting_charge_in_chamber , :visiting_charge_in_farm)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':dr_name' => $_POST['dr_name'],
        ':address' => $_POST['address'],
        ':chamber_address' => $_POST['chamber_address'],
        ':phone_no_1' => $_POST['phone_no_1'],
        ':phone_no_2' => $_POST['phone_no_2'],
        ':email' => $_POST['email'],
        ':social_media' => $_POST['social_media'],
        ':dr_helping_hand' => $_POST['dr_helping_hand'],
        ':dr_helping_hand_contact' => $_POST['dr_helping_hand_contact'],
        ':chamber_timing_start' => $_POST['chamber_timing_start'],
        ':chamber_timing_end' => $_POST['chamber_timing_end'],
        ':day_off' => $_POST['day_off'],
        ':visiting_charge_in_chamber' => $_POST['visiting_charge_in_chamber'],
        ':visiting_charge_in_farm' => $_POST['visiting_charge_in_farm']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Doctor Profile Added</div>';
    }
  }
// }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM doctor_profile WHERE dp_id = :dp_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':dp_id' => $_POST["dp_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['dp_id'] = $row['dp_id'];
      $output['dr_name'] = $row['dr_name'];
      $output['address'] = $row['address'];
      $output['chamber_address'] = $row['chamber_address'];
      $output['phone_no_1'] = $row['phone_no_1'];
      $output['phone_no_2'] = $row['phone_no_2'];
      $output['email'] = $row['email'];
      $output['social_media'] = $row['social_media'];
      $output['dr_helping_hand'] = $row['dr_helping_hand'];
      $output['dr_helping_hand_contact'] = $row['dr_helping_hand_contact'];
      $output['chamber_timing_start'] = $row['chamber_timing_start'];
      $output['chamber_timing_end'] = $row['chamber_timing_end'];
      $output['day_off'] = $row['day_off'];
      $output['visiting_charge_in_chamber'] = $row['visiting_charge_in_chamber'];
      $output['visiting_charge_in_farm'] = $row['visiting_charge_in_farm'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['dr_name'])) || empty(trim($_POST['phone_no_1']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "UPDATE  doctor_profile  SET  user_id = :user_id , update_date = :update_date , dr_name=:dr_name , address=:address , chamber_address=:chamber_address , phone_no_1=:phone_no_1 , phone_no_2=:phone_no_2 , email=:email , social_media=:social_media , dr_helping_hand=:dr_helping_hand , dr_helping_hand_contact=:dr_helping_hand_contact , chamber_timing_start=:chamber_timing_start , chamber_timing_end=:chamber_timing_end , day_off=:day_off , visiting_charge_in_chamber=:visiting_charge_in_chamber , visiting_charge_in_farm=:visiting_charge_in_farm WHERE dp_id = :dp_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1 , 
        ':update_date' => $create_date , 
        ':dr_name' => $_POST["dr_name"],
        ':address' => $_POST["address"],
        ':chamber_address' => $_POST["chamber_address"],
        ':phone_no_1' => $_POST["phone_no_1"],
        ':phone_no_2' => $_POST["phone_no_2"],
        ':email' => $_POST["email"],
        ':social_media' => $_POST["social_media"],
        ':dr_helping_hand' => $_POST["dr_helping_hand"],
        ':dr_helping_hand_contact' => $_POST["dr_helping_hand_contact"],
        ':chamber_timing_start' => $_POST["chamber_timing_start"],
        ':chamber_timing_end' => $_POST["chamber_timing_end"],
        ':day_off' => $_POST["day_off"],
        ':visiting_charge_in_chamber' => $_POST["visiting_charge_in_chamber"],
        ':visiting_charge_in_farm' => $_POST["visiting_charge_in_farm"],
        ':dp_id' => $_POST["dp_id"]
        )
    );
        if(!$statement->execute())
        {
            print_r($statement->errorInfo());
        }
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Doctor Profile Added</div>';
    }
  }
// }


    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $dp_id = $_POST["dp_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  doctor_profile  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE dp_id = :dp_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':dp_id' => $_POST['dp_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Doctor Profile Deleted</div>';
    }
  }
}
?>
