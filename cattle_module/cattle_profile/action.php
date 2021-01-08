<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_FILES['cattle_profile_pic'])) {


  if (is_array($_FILES)) {

    $src = $_FILES['cattle_profile_pic']['tmp_name'];
    $targ = "images/" . $_FILES['cattle_profile_pic']['name'];
    move_uploaded_file($src, $targ);

    echo $_SESSION['base_url'] . 'cattle_module/cattle_profile/' . $targ;

  }

}


if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

   // if(empty(trim($_POST['weight'])) || empty(trim($_POST['teeth'])) || empty(trim($_POST['age'])) || empty(isset($_FILES['cattle_profile_pic']))) {
   //    echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
   //  }else{ 
    $query = "INSERT INTO  cattle_profile ( user_id ,  create_date ,  cattle_code ,  ear_tag ,  ear_tag_color ,  electronic_ear_tag ,  other_tag ,  brand ,  animal_type ,  conception_type ,  birth_date ,  birth_weight ,  weaning_date ,  weaning_weight ,  castrated ,  castrated_date ,  gender ,  height ,  width ,  length , weight ,  cattle_kin ,  teeth ,  color ,  special_sign ,  horn ,  farm ,  remarks ,  status ,  age ,  problem_type ,  problem_details ,  problem_area ,  mother_id ,  father_id ,  buy_or_birth ,  buy_price ,  buy_date ,  cattle_profile_pic ) 
VALUES ( :user_id , :create_date , :cattle_code , :ear_tag , :ear_tag_color , :electronic_ear_tag , :other_tag , :brand , :animal_type , :conception_type , :birth_date , :birth_weight , :weaning_date , :weaning_weight , :castrated , :castrated_date , :gender , :height , :width , :length , :weight , :cattle_kin , :teeth , :color , :special_sign , :horn , :farm , :remarks , :status , :age , :problem_type , :problem_details , :problem_area , :mother_id , :father_id , :buy_or_birth , :buy_price , :buy_date , :cattle_profile_pic)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':cattle_code' => $_POST['cattle_code'],
        ':ear_tag' => $_POST['ear_tag'],
        ':ear_tag_color' => $_POST['ear_tag_color'],
        ':electronic_ear_tag' => $_POST['electronic_ear_tag'],
        ':other_tag' => $_POST['other_tag'],
        ':brand' => $_POST['brand'],
        ':animal_type' => $_POST['animal_type'],
        ':conception_type' => $_POST['conception_type'],
        ':birth_date' => $_POST['birth_date'],
        ':birth_weight' => $_POST['birth_weight'],
        ':weaning_date' => $_POST['weaning_date'],
        ':weaning_weight' => $_POST['weaning_weight'],
        ':castrated' => $_POST['castrated'],
        ':castrated_date' => $_POST['castrated_date'],
        ':gender' => $_POST['gender'],
        ':height' => $_POST['height'],
        ':width' => $_POST['width'],
        ':length' => $_POST['length'],
        ':weight' => $_POST['weight'],
        ':cattle_kin' => $_POST['cattle_kin'],
        ':teeth' => $_POST['teeth'],
        ':color' => $_POST['color'],
        ':special_sign' => $_POST['special_sign'],
        ':horn' => $_POST['horn'],
        ':farm' => $_POST['farm'],
        ':remarks' => $_POST['remarks'],
        ':status' => $_POST['status'],
        ':age' => $_POST['age'],
        ':problem_type' => $_POST['problem_type'],
        ':problem_details' => $_POST['problem_details'],
        ':problem_area' => implode(', ', $_POST['problem_area']),
        ':mother_id' => $_POST['mother_id'],
        ':father_id' => $_POST['father_id'],
        ':buy_or_birth' => $_POST['buy_or_birth'],
        ':buy_price' => $_POST['buy_price'],
        ':buy_date' => $_POST['buy_date'],
        ':cattle_profile_pic' => $_POST['cattle_profile_pic_url']
      )
    );
    $cattle_profile_id =  $connect->lastInsertId();
        $cattle_code = date("Ym")."-".$cattle_profile_id;
        // echo "Cattle Profile Inserted";
        $cattle_query = $connect->prepare("UPDATE cattle_profile SET cattle_code = '$cattle_code' WHERE cattle_profile_id = '$cattle_profile_id' ");
        $cattle_query->execute();
        
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Profile Added</div>';
    }
  }
  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM cattle_profile WHERE cattle_profile_id = :cattle_profile_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':cattle_profile_id' => $_POST["cattle_profile_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['cattle_profile_id'] = $row['cattle_profile_id'];

      $output['cattle_code'] = $row['cattle_code'];
      $output['ear_tag'] = $row['ear_tag'];
      $output['ear_tag_color'] = $row['ear_tag_color'];
      $output['electronic_ear_tag'] = $row['electronic_ear_tag'];
      $output['other_tag'] = $row['other_tag'];
      $output['brand'] = $row['brand'];
      $output['animal_type'] = $row['animal_type'];
      $output['conception_type'] = $row['conception_type'];
      $output['birth_date'] = $row['birth_date'];
      $output['birth_weight'] = $row['birth_weight'];
      $output['weaning_date'] = $row['weaning_date'];
      $output['weaning_weight'] = $row['weaning_weight'];
      $output['castrated'] = $row['castrated'];
      $output['castrated_date'] = $row['castrated_date'];
      $output['gender'] = $row['gender'];
      $output['height'] = $row['height'];
      $output['width'] = $row['width'];
      $output['length'] = $row['length'];
      $output['weight'] = $row['weight'];
      $output['cattle_kin'] = $row['cattle_kin'];
      $output['teeth'] = $row['teeth'];
      $output['color'] = $row['color'];
      $output['special_sign'] = $row['special_sign'];
      $output['horn'] = $row['horn'];
      $output['farm'] = $row['farm'];
      $output['remarks'] = $row['remarks'];
      $output['status'] = $row['status'];
      $output['age'] = $row['age'];
      $output['problem_type'] = $row['problem_type'];
      $output['problem_details'] = $row['problem_details'];
      $output['problem_area'] = $row['problem_area'];
      $output['mother_id'] = $row['mother_id'];
      $output['father_id'] = $row['father_id'];
      $output['buy_or_birth'] = $row['buy_or_birth'];
      $output['buy_price'] = $row['buy_price'];
      $output['buy_date'] = $row['buy_date'];
      $output['cattle_profile_pic'] = $row['cattle_profile_pic'];

    }
    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['weight'])) || empty(trim($_POST['teeth'])) || empty(trim($_POST['age']))) { 
    $query = "UPDATE `cattle_profile` SET `user_id`= :user_id ,`update_date`= :update_date ,`cattle_code`= :cattle_code ,`ear_tag`= :ear_tag ,`ear_tag_color`= :ear_tag_color ,`electronic_ear_tag`= :electronic_ear_tag ,`other_tag`= :other_tag ,`brand`= :brand ,`animal_type`= :animal_type ,`conception_type`= :conception_type ,`birth_date`= :birth_date ,`birth_weight`= :birth_weight ,`weaning_date`= :weaning_date ,`weaning_weight`= :weaning_weight ,`castrated`= :castrated ,`castrated_date`= :castrated_date ,`gender`= :gender ,`height`= :height ,`width`= :width ,`length`= :length ,`weight`= :weight  ,`cattle_kin`= :cattle_kin ,`teeth`= :teeth ,`color`= :color ,`special_sign`= :special_sign ,`horn`= :horn ,`farm`= :farm ,`remarks`= :remarks ,`status`= :status ,`age`= :age ,`problem_type`= :problem_type ,`problem_details`= :problem_details ,`problem_area`= :problem_area ,`mother_id`= :mother_id ,`father_id`= :father_id ,`buy_or_birth`= :buy_or_birth ,`buy_price`= :buy_price ,`buy_date`= :buy_date ,`cattle_profile_pic`= :cattle_profile_pic  WHERE cattle_profile_id = :cattle_profile_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':cattle_code' => $_POST['cattle_code'],
        ':ear_tag' => $_POST['ear_tag'],
        ':ear_tag_color' => $_POST['ear_tag_color'],
        ':electronic_ear_tag' => $_POST['electronic_ear_tag'],
        ':other_tag' => $_POST['other_tag'],
        ':brand' => $_POST['brand'],
        ':animal_type' => $_POST['animal_type'],
        ':conception_type' => $_POST['conception_type'],
        ':birth_date' => $_POST['birth_date'],
        ':birth_weight' => $_POST['birth_weight'],
        ':weaning_date' => $_POST['weaning_date'],
        ':weaning_weight' => $_POST['weaning_weight'],
        ':castrated' => $_POST['castrated'],
        ':castrated_date' => $_POST['castrated_date'],
        ':gender' => $_POST['gender'],
        ':height' => $_POST['height'],
        ':width' => $_POST['width'],
        ':length' => $_POST['length'],
        ':weight' => $_POST['weight'],
        ':cattle_kin' => $_POST['cattle_kin'],
        ':teeth' => $_POST['teeth'],
        ':color' => $_POST['color'],
        ':special_sign' => $_POST['special_sign'],
        ':horn' => $_POST['horn'],
        ':farm' => $_POST['farm'],
        ':remarks' => $_POST['remarks'],
        ':status' => $_POST['status'],
        ':age' => $_POST['age'],
        ':problem_type' => $_POST['problem_type'],
        ':problem_details' => $_POST['problem_details'],
        // ':problem_area' => $_POST['problem_area'],
        ':problem_area' => implode(', ', $_POST['problem_area']),
        ':mother_id' => $_POST['mother_id'],
        ':father_id' => $_POST['father_id'],
        ':buy_or_birth' => $_POST['buy_or_birth'],
        ':buy_price' => $_POST['buy_price'],
        ':buy_date' => $_POST['buy_date'],
        ':cattle_profile_pic' => $_POST['cattle_profile_pic_url'],
        ':cattle_profile_id' => $_POST['cattle_profile_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Profile Edited</div>';
    }
  }
  // }





 if ($_POST['btn_action'] == 'delete') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $cattle_profile_id = $_POST["cattle_profile_id"]; 

        $status = 0;

        if ($_POST["status"] == 0) {
            $status = 1;
        }

    $query = "UPDATE  cattle_profile  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE cattle_profile_id = :cattle_profile_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
         
        ':cattle_profile_id' => $_POST['cattle_profile_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Cattle Profile Deleted</div>';
    }
  }

}

?>
