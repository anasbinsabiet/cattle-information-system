<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_FILES['land_profile_pic'])) {


  if (is_array($_FILES)) {

    $src = $_FILES['land_profile_pic']['tmp_name'];
    $targ = "images/" . $_FILES['land_profile_pic']['name'];
    move_uploaded_file($src, $targ);

    echo $_SESSION['base_url'] . 'land_module/land_profile/' . $targ;

  }

}


if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");


 // if(empty(trim($_POST['land_type'])) || empty(trim($_POST['land_location']))) {
 //      echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
 //    }else{ 

    $query = "INSERT INTO  land_profile ( user_id ,  create_date ,  land_code, land_type, land_location, land_size, land_ownership_date, date_of_purchase, ownership_renew_date, remarks, land_value, cs_no, rs_no, bs_no, land_profile_pic ) 
VALUES ( :user_id , :create_date , :land_code, :land_type, :land_location, :land_size, :land_ownership_date, :date_of_purchase, :ownership_renew_date, :remarks, :land_value, :cs_no, :rs_no, :bs_no, :land_profile_pic)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':land_code' => $_POST["land_code"],
        ':land_type' => $_POST["land_type"],
        ':land_location' => $_POST["land_location"],
        ':land_size' => $_POST["land_size"],
        ':land_ownership_date' => date('Y-m-d', strtotime($_POST['land_ownership_date'])),
        ':date_of_purchase' => date('Y-m-d', strtotime($_POST['date_of_purchase'])),
        ':ownership_renew_date' => date('Y-m-d', strtotime($_POST['ownership_renew_date'])),
        ':remarks' => $_POST["remarks"],
        ':land_value' => $_POST["land_value"],
        ':cs_no' => $_POST["cs_no"],
        ':rs_no' => $_POST["rs_no"],
        ':bs_no' => $_POST["bs_no"],
        ':land_profile_pic' => $_POST['land_profile_pic_url']
      )
    );
        // if(!$statement->execute())
        // {
        //     print_r($statement->errorInfo());
        // }
    $land_id =  $connect->lastInsertId();
        $land_code = date("Ym")."-".$land_id;
        echo "Land Profile Inserted";
        $bill_query = $connect->prepare("UPDATE land_profile SET land_code = '$land_code' WHERE land_id = '$land_id' ");
        $bill_query->execute();
        
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Profile Added</div>';
    }
  }
// }

  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM land_profile WHERE land_id = :land_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':land_id' => $_POST["land_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['land_id'] = $row['land_id'];
      $output['land_code'] = $row['land_code'];
      $output['land_type'] = $row['land_type'];
      $output['land_location'] = $row['land_location'];
      $output['land_size'] = $row['land_size'];
      $output['land_ownership_date'] = $row['land_ownership_date'];
      $output['date_of_purchase'] = $row['date_of_purchase'];
      $output['ownership_renew_date'] = $row['ownership_renew_date'];
      $output['remarks'] = $row['remarks'];
      $output['land_value'] = $row['land_value'];
      $output['cs_no'] = $row['cs_no'];
      $output['rs_no'] = $row['rs_no'];
      $output['bs_no'] = $row['bs_no'];
      $output['land_profile_pic'] = $row['land_profile_pic'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['land_type'])) || empty(trim($_POST['land_location']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $query = "UPDATE `land_profile` SET `user_id`= :user_id ,`update_date`= :update_date ,`land_code`= :land_code ,`land_type`= :land_type ,`land_location`= :land_location ,`land_size`= :land_size ,`land_ownership_date`= :land_ownership_date ,`date_of_purchase`= :date_of_purchase ,`ownership_renew_date`= :ownership_renew_date ,`remarks`= :remarks ,`land_value`= :land_value ,`cs_no`= :cs_no ,`rs_no`= :rs_no ,`bs_no`= :bs_no, `land_profile_pic`= :land_profile_pic  WHERE land_id = :land_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':land_code' => $_POST['land_code'],
        ':land_type' => $_POST['land_type'],
        ':land_location' => $_POST['land_location'],
        ':land_size' => $_POST['land_size'],
        ':land_ownership_date' => $_POST['land_ownership_date'],
        ':date_of_purchase' => $_POST['date_of_purchase'],
        ':ownership_renew_date' => $_POST['ownership_renew_date'],
        ':remarks' => $_POST['remarks'],
        ':land_value' => $_POST['land_value'],
        ':cs_no' => $_POST['cs_no'],
        ':rs_no' => $_POST['rs_no'],
        ':bs_no' => $_POST['bs_no'],
        ':land_profile_pic' => $_POST['land_profile_pic_url'],
        ':land_id' => $_POST['land_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Profile Edited</div>';
    }
  }
// }

 if ($_POST['btn_action'] == 'delete') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $land_id = $_POST["land_id"]; 

        $status = 0;

        if ($_POST["status"] == 0) {
            $status = 1;
        }

    $query = "UPDATE  land_profile  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE land_id = :land_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
         
        ':land_id' => $_POST['land_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Profile Deleted</div>';
    }
  }
}
?>
