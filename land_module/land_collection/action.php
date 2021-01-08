<?php
$connect = "";
include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");


 // if(empty(trim($_POST['collection_code'])) || empty(trim($_POST['collection_date'])) || empty(trim($_POST['land_code']))) {
 //      echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
 //    }else{ 
    $query = "INSERT INTO  land_collection (  user_id ,  create_date , collection_code ,  collection_date ,  amount ,  land_code ,  agro_products ,  remarks) 
VALUES (  :user_id ,  :create_date , :collection_code ,  :collection_date ,  :amount ,  :land_code ,  :agro_products ,  :remarks)";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':collection_code' => $_POST['collection_code'],
        ':collection_date' => $_POST['collection_date'],
        ':amount' => $_POST['amount'],
        ':land_code' => $_POST['land_code'],
        ':agro_products' => $_POST['agro_products'],
        ':remarks' => $_POST['remarks']
      )
    );
    $collection_id =  $connect->lastInsertId();
    $collection_code = date("Ym")."-".$collection_id;
    echo "Code Inserted";
    $code_query = $connect->prepare("UPDATE land_collection SET collection_code = '$collection_code' WHERE collection_id = '$collection_id' ");
    $code_query->execute();

    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Collection Added</div>';
    }
  }
// }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM land_collection WHERE collection_id = :collection_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':collection_id' => $_POST["collection_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['collection_id'] = $row['collection_id'];
      $output['collection_code'] = $row['collection_code'];
      $output['collection_date'] = $row['collection_date'];
      $output['amount'] = $row['amount'];
      $output['land_code'] = $row['land_code'];
      $output['agro_products'] = $row['agro_products'];
      $output['remarks'] = $row['remarks'];
    }
    echo json_encode($output);
  }

  if ($_POST['btn_action'] == 'Edit') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['collection_code'])) || empty(trim($_POST['collection_date'])) || empty(trim($_POST['land_code']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{

    $query = "UPDATE  land_collection  SET  user_id = :user_id , update_date = :update_date , collection_code = :collection_code, collection_date = :collection_date , amount = :amount , land_code = :land_code , agro_products = :agro_products , remarks = :remarks  WHERE collection_id = :collection_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':collection_code' => $_POST['collection_code'],
        ':collection_date' => $_POST['collection_date'],
        ':amount' => $_POST['amount'], 
        ':land_code' => $_POST['land_code'], 
        ':agro_products' => $_POST['agro_products'], 
        ':remarks' => $_POST['remarks'], 
        ':collection_id' => $_POST['collection_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Collection Edited</div>';
    }
  }
// }

    if ($_POST['btn_action'] == 'delete') {
    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");
    $collection_id = $_POST["collection_id"]; 
        $status = 0;
        if ($_POST["status"] == 0) {
            $status = 1;
        }
    $query = "UPDATE  land_collection  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE collection_id = :collection_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,
        ':collection_id' => $_POST['collection_id']
      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Land Collection Deleted</div>';
    }
    }
  }
}
?>
