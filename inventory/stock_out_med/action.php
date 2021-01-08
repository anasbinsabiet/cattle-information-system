<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['som_date'])) || empty(trim($_POST['purpose'])) || empty(trim($_POST['receiver'])) || empty(trim($_POST['farm_id']))|| empty(trim($_POST['total_amount']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  stock_out_med (   user_id ,  create_date  ,  som_date ,  purpose , receiver, receiver_contact ,  storage_location_fridge ,  farm_id ,  total_amount , total_price  ) 
                VALUES ( :user_id ,  :create_date  ,  :som_date ,  :purpose , :receiver , :receiver_contact ,  :storage_location_fridge ,  :farm_id ,  :total_amount, :total_price )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':som_date' => $_POST['som_date'],
        ':purpose' => $_POST['purpose'],
        ':receiver' => $_POST['receiver'],
        ':receiver_contact' => $_POST['receiver_contact'],
        ':storage_location_fridge' => $_POST['storage_location_fridge'],
        ':farm_id' => $_POST['farm_id'],
        ':total_amount' => $_POST['total_amount'],
        ':total_price' => $_POST['total_price']
      )
    );
           //     if(!$statement->execute())
           // {
           //   print_r($statement->errorInfo());
           // }
    $result_master = $statement->fetchAll();
    if (isset($result_master)) {
      echo '<div class="alert alert-success">Inventory Info Added</div>';      
    }


$statement = $connect->query("SELECT LAST_INSERT_ID()");
    $stock_out_med_id = $statement->fetchColumn();


/////


    if (isset($stock_out_med_id) && $stock_out_med_id > 0) {
        
        $json1 = json_decode($_POST['tabledata']);

        $queries = json_decode($json1);

        //Example foreach
        foreach ($queries as $query) {

            $sub_query = "
                  INSERT INTO stock_out_med_details (stock_out_med_id, user_id, create_date,  medicine, unit, amount, price, hc_id) 
                  VALUES ( :stock_out_med_id, :user_id, :create_date, :medicine, :unit, :amount, :price, :hc_id)
                  ";
            $statement1 = $connect->prepare($sub_query);
            $statement1->execute(
                array(

                    ':stock_out_med_id' => $stock_out_med_id,
//                    ':user_id' => $_SESSION['user_id'],
                    ':user_id' => 1,
                    ':create_date' => $create_date,
                    ':medicine' => $query->medicine,
                    ':unit' => $query->unit,
                    ':amount' => $query->amount,
                    ':price' => $query->price,
                    ':hc_id' => $query->hc_id

                )
            );

           // if(!$statement1->execute())
           // {
           //   print_r($statement1->errorInfo());
           // }


        }

        $result_details = $statement1->fetchAll();

        if (isset($result_details)) {
          echo '<div class="alert alert-success"> Inventory Table Added</div>';   
        }
      }

    }


  // }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM stock_out_med WHERE stock_out_med_id = :stock_out_med_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':stock_out_med_id' => $_POST["stock_out_med_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['stock_out_med_id'] = $row['stock_out_med_id'];

      $output['som_date'] = $row['som_date'];
      $output['purpose'] = $row['purpose'];
      $output['receiver'] = $row['receiver'];
      $output['receiver_contact'] = $row['receiver_contact'];
      $output['storage_location_fridge'] = $row['storage_location_fridge'];
      $output['farm_id'] = $row['farm_id'];
      $output['total_amount'] = $row['total_amount'];
      $output['total_price'] = $row['total_price'];
    }


    $sub_query = "
		SELECT * FROM stock_out_med_details 
		WHERE stock_out_med_id = '" . $_POST["stock_out_med_id"] . "'
		";
    $statement = $connect->prepare($sub_query);
    $statement->execute();
    $sub_result = $statement->fetchAll();

    $array_user = array();
    $i = 0;

    foreach ($sub_result as $row) {
      $array_user [$i]["medicine"] = $row['medicine'];
//      $array_user [$i]["medicine"] = get_medicine_name($connect, $row['medicine']);
      $array_user [$i]["unit"] = $row['unit'];
      $array_user [$i]["amount"] = $row['amount'];
      $array_user [$i]["price"] = $row['price'];
      $array_user [$i]["hc_id"] = $row['hc_id'];


      $array_user[$i]["details_id"] = $row['stock_out_med_details_id'];
      $array_user[$i]["master_id"] = $row['stock_out_med_id'];
      $i++;


    }

    $array_user[$i] = $output;

    $output = json_encode($array_user);

    echo $output;



//    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    // if(empty(trim($_POST['som_date'])) || empty(trim($_POST['purpose'])) || empty(trim($_POST['receiver'])) || empty(trim($_POST['farm_id']))|| empty(trim($_POST['total_amount']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $stock_out_med_id = $_POST['stock_out_med_id'];
    $delete_query = $connect->prepare("DELETE FROM stock_out_med WHERE stock_out_med_id = '$stock_out_med_id' ");
    $delete_query->execute();
    if(!$delete_query->execute())
    {
      print_r($delete_query->errorInfo());
    }
    else
    {
      // echo '<div class="alert alert-success"> Master Deleted</div>';

    }



    $delete_query_details = $connect->prepare("DELETE FROM stock_out_med_details WHERE stock_out_med_id = '$stock_out_med_id' ");
    $delete_query_details->execute();

    if(!$delete_query_details->execute())
    {
      print_r($delete_query_details->errorInfo());
    }
    else
    {
      // echo '<div class="alert alert-success"> Details Deleted</div>';
    }



    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $query = "INSERT INTO  stock_out_med (  stock_out_med_id, user_id ,  create_date  ,  som_date ,  purpose , receiver , receiver_contact ,  storage_location_fridge ,  farm_id ,  total_amount, total_price ) 
                VALUES ( :stock_out_med_id, :user_id ,  :create_date  ,  :som_date ,  :purpose , :receiver , :receiver_contact ,  :storage_location_fridge ,  :farm_id ,  :total_amount, :total_price )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':stock_out_med_id' => $stock_out_med_id,
//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':som_date' => $_POST['som_date'],
        ':purpose' => $_POST['purpose'],
        ':receiver' => $_POST['receiver'],
        ':receiver_contact' => $_POST['receiver_contact'],
        ':storage_location_fridge' => $_POST['storage_location_fridge'],
        ':farm_id' => $_POST['farm_id'],
        ':total_amount' => $_POST['total_amount'],
        ':total_price' => $_POST['total_price']
      )
    );
    $result_master = $statement->fetchAll();
    if (isset($result_master)) {
      echo '<div class="alert alert-success"> Inventory Info Edited</div>';

    }



      $json1 = json_decode($_POST['tabledata']);

      $queries = json_decode($json1);

      //Example foreach
      foreach ($queries as $query) {

        $sub_query = "
                  INSERT INTO stock_out_med_details (stock_out_med_id, user_id, create_date,  medicine, unit, amount, price, hc_id) 
                  VALUES ( :stock_out_med_id, :user_id, :create_date, :medicine, :unit, :amount, :price, :hc_id)
                  ";
        $statement1 = $connect->prepare($sub_query);
        $statement1->execute(
          array(

            ':stock_out_med_id' => $stock_out_med_id,
//                    ':user_id' => $_SESSION['user_id'],
            ':user_id' => 1,
            ':create_date' => $create_date,
            ':medicine' => $query->medicine,
            ':unit' => $query->unit,
            ':amount' => $query->amount,
            ':price' => $query->price,
            ':hc_id' => $query->hc_id

          )
        );

//            if(!$statement1->execute())
//            {
//              print_r($statement1->errorInfo());
//            }


      }

      $result_details = $statement1->fetchAll();

      if (isset($result_details)) {
        echo '<div class="alert alert-success"> Inventory Table Edited</div>';
      }

    }

  // }


  if ($_POST['btn_action'] == 'delete') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $stock_out_med_id = $_POST["stock_out_med_id"];

    $status = 0;

    if ($_POST["status"] == 0) {
      $status = 1;
    }

    $query = "UPDATE  stock_out_med  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE stock_out_med_id = :stock_out_med_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,

        ':stock_out_med_id' => $_POST['stock_out_med_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success"> Stock In medicine Inventory Deleted</div>';
    }
  }
}

?>
