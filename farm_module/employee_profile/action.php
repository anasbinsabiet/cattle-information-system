<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_FILES['employee_profile_pic'])) {


  if (is_array($_FILES)) {

    $src = $_FILES['employee_profile_pic']['tmp_name'];
    $targ = "images/" . $_FILES['employee_profile_pic']['name'];
    move_uploaded_file($src, $targ);

    echo $_SESSION['base_url'] . '/farm_module/employee_profile/' . $targ;

  }

}


if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['emp_name'])) || empty(trim($_POST['designation'])) || empty(trim($_POST['phone'])) || empty(trim($_POST['dob'])) || empty(trim($_POST['gender'])) || empty(trim($_POST['farm_id']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  employee_profile (  user_id ,  create_date ,  emp_name ,   designation ,  phone ,  social_media ,  email ,  address ,  contact_person ,  contact_person_details ,  dob ,  gender , farm_id ,  employee_profile_pic_url ) 
VALUES (  :user_id ,  :create_date ,  :emp_name ,  :designation ,  :phone ,  :social_media ,  :email ,  :address ,  :contact_person ,  :contact_person_details ,  :dob  ,  :gender , :farm_id ,  :employee_profile_pic_url )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':emp_name' => $_POST['emp_name'],
        ':designation' => $_POST['designation'], 
        ':phone' => $_POST['phone'], 
        ':social_media' => $_POST['social_media'], 
        ':email' => $_POST['email'], 
        ':address' => $_POST['address'], 
        ':contact_person' => $_POST['contact_person'], 
        ':contact_person_details' => $_POST['contact_person_details'], 
        ':dob' => $_POST['dob'],
        ':gender' => $_POST['gender'],
        ':farm_id' => $_POST['farm_id'],
        ':employee_profile_pic_url' => $_POST['employee_profile_pic_url']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Employee Profile Deleted</div>';
    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM employee_profile WHERE employee_profile_id = :employee_profile_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':employee_profile_id' => $_POST["employee_profile_id"]
      )
    );

    $result = $statement->fetchAll();

    foreach ($result as $row) {

      $output['employee_profile_id'] = $row['employee_profile_id'];
      $output['emp_name'] = $row['emp_name'];
      $output['designation'] = $row['designation'];
      $output['phone'] = $row['phone'];
      $output['social_media'] = $row['social_media'];
      $output['email'] = $row['email'];
      $output['address'] = $row['address'];
      $output['contact_person'] = $row['contact_person'];
      $output['contact_person_details'] = $row['contact_person_details'];
      $output['dob'] = $row['dob'];
      $output['gender'] = $row['gender'];
      $output['farm_id'] = $row['farm_id'];
      $output['employee_profile_pic_url'] = $row['employee_profile_pic_url'];

    }

    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['emp_name'])) || empty(trim($_POST['designation'])) || empty(trim($_POST['phone'])) || empty(trim($_POST['dob'])) || empty(trim($_POST['gender'])) || empty(trim($_POST['farm_id']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{
    $query = "UPDATE  employee_profile  SET  user_id = :user_id , update_date = :update_date, emp_name = :emp_name ,  designation = :designation , phone = :phone , social_media = :social_media , email = :email , address = :address , contact_person = :contact_person , contact_person_details = :contact_person_details , dob = :dob ,  gender = :gender , farm_id = :farm_id , employee_profile_pic_url = :employee_profile_pic_url  WHERE employee_profile_id = :employee_profile_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':emp_name' => $_POST['emp_name'],
        ':designation' => $_POST['designation'],
        ':phone' => $_POST['phone'],
        ':social_media' => $_POST['social_media'],
        ':email' => $_POST['email'],
        ':address' => $_POST['address'],
        ':contact_person' => $_POST['contact_person'],
        ':contact_person_details' => $_POST['contact_person_details'],
        ':dob' => $_POST['dob'],
        ':gender' => $_POST['gender'],
        ':farm_id' => $_POST['farm_id'],
        ':employee_profile_pic_url' => $_POST['employee_profile_pic_url'],
        ':employee_profile_id' => $_POST['employee_profile_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Employee Profile Edited</div>';
    }
  }
  // }


    if ($_POST['btn_action'] == 'delete') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $employee_profile_id = $_POST["employee_profile_id"]; 

        $status = 0;

        if ($_POST["status"] == 0) {
            $status = 1;
        }

    $query = "UPDATE  employee_profile  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE employee_profile_id = :employee_profile_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
         
        ':employee_profile_id' => $_POST['employee_profile_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Employee Profile Deleted</div>';
    }
  }


}

?>
