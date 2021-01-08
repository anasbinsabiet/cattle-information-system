<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");


    // if(empty(trim($_POST['sofi_date'])) || empty(trim($_POST['sell_cattle_use'])) || empty(trim($_POST['reciver']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  stock_out_fi (   user_id ,  create_date  ,  sofi_date ,  sell_cattle_use ,  reciver, receiver_contact ,  silage_or_warehouse ,  discount ,  vat, tax ,delivery_charge,payment_status,amount_paid,previous_due_amount,previous_last_due_date  ) 
                VALUES ( :user_id ,  :create_date  ,  :sofi_date ,  :sell_cattle_use ,  :reciver , :receiver_contact,  :silage_or_warehouse ,  :discount ,  :vat , :tax, :delivery_charge,:payment_status,:amount_paid,:previous_due_amount,:previous_last_due_date )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':sofi_date' => $_POST['sofi_date'],
        ':sell_cattle_use' => $_POST['sell_cattle_use'],
        ':reciver' => $_POST['reciver'],
        ':receiver_contact' => $_POST['receiver_contact'],
        ':silage_or_warehouse' => $_POST['silage_or_warehouse'],
        ':discount' => $_POST['discount'],
        ':vat' => $_POST['vat'],
        ':tax' => $_POST['tax'],
        ':delivery_charge' => $_POST['delivery_charge'],
        ':payment_status' => $_POST['payment_status'],
        ':amount_paid' => $_POST['amount_paid'],
        ':previous_due_amount' => $_POST['previous_due_amount'],
        ':previous_last_due_date' => $_POST['previous_last_due_date']



      )
    );
    $result_master = $statement->fetchAll();
    if (isset($result_master)) {
      echo '<div class="alert alert-success">Inventory Info Added</div>';

      
    }


$statement = $connect->query("SELECT LAST_INSERT_ID()");
    $stock_out_fi_id = $statement->fetchColumn();


/////


    if (isset($stock_out_fi_id) && $stock_out_fi_id > 0) {
        
        $json1 = json_decode($_POST['tabledata']);

        $queries = json_decode($json1);

        //Example foreach
        foreach ($queries as $query) {

            $sub_query = "
                  INSERT INTO stock_out_fi_details (stock_out_fi_id, user_id, create_date,  product, unit, quantity, price) 
                  VALUES ( :stock_out_fi_id, :user_id, :create_date, :product, :unit, :quantity, :price)
                  ";
            $statement1 = $connect->prepare($sub_query);
            $statement1->execute(
                array(

                    ':stock_out_fi_id' => $stock_out_fi_id,
//                    ':user_id' => $_SESSION['user_id'],
                    ':user_id' => 1,
                    ':create_date' => $create_date,
                    ':product' => $query->food,
                    ':unit' => $query->unit,
                    ':quantity' => $query->quantity,
                    ':price' => $query->price
                )
            );

//            if(!$statement1->execute())
//            {
//              print_r($statement1->errorInfo());
//            }


        }

        $result_details = $statement1->fetchAll();

        if (isset($result_details)) {
            echo '<div class="alert alert-success">Inventory Table Added</div>';
        }


    }

  }
// }


  if ($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM stock_out_fi WHERE stock_out_fi_id = :stock_out_fi_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':stock_out_fi_id' => $_POST["stock_out_fi_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['stock_out_fi_id'] = $row['stock_out_fi_id'];

      $output['sofi_date'] = $row['sofi_date'];
      $output['sell_cattle_use'] = $row['sell_cattle_use'];
      $output['reciver'] = $row['reciver'];
      $output['receiver_contact'] = $row['receiver_contact'];
      $output['silage_or_warehouse'] = $row['silage_or_warehouse'];
      $output['discount'] = $row['discount'];
      $output['vat'] = $row['vat'];
      $output['tax'] = $row['tax'];
      $output['delivery_charge'] = $row['delivery_charge'];
      $output['payment_status'] = $row['payment_status'];
      $output['amount_paid'] = $row['amount_paid'];
      $output['previous_due_amount'] = $row['previous_due_amount'];
      $output['previous_last_due_date'] = $row['previous_last_due_date'];


    }


    $sub_query = "
		SELECT * FROM stock_out_fi_details 
		WHERE stock_out_fi_id = '" . $_POST["stock_out_fi_id"] . "'
		";
    $statement = $connect->prepare($sub_query);
    $statement->execute();
    $sub_result = $statement->fetchAll();

    $array_user = array();
    $i = 0;

    foreach ($sub_result as $row) {
      $array_user [$i]["product"] = $row['product'];
//      $array_user [$i]["product"] = get_product_name($connect, $row['product']);
      $array_user [$i]["unit"] = $row['unit'];
      $array_user [$i]["quantity"] = $row['quantity'];
      $array_user [$i]["price"] = $row['price'];

      $array_user[$i]["details_id"] = $row['stock_out_fi_details_id'];
      $array_user[$i]["master_id"] = $row['stock_out_fi_id'];
      $i++;


    }

    $array_user[$i] = $output;

    $output = json_encode($array_user);

    echo $output;



//    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    // if(empty(trim($_POST['sofi_date'])) || empty(trim($_POST['sell_cattle_use'])) || empty(trim($_POST['reciver']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $stock_out_fi_id = $_POST['stock_out_fi_id'];
    $delete_query = $connect->prepare("DELETE FROM stock_out_fi WHERE stock_out_fi_id = '$stock_out_fi_id' ");
    $delete_query->execute();
    if(!$delete_query->execute())
    {
      print_r($delete_query->errorInfo());
    }
    else
    {
      // echo "Master Deleted -- ";
    }



    $delete_query_details = $connect->prepare("DELETE FROM stock_out_fi_details WHERE stock_out_fi_id = '$stock_out_fi_id' ");
    $delete_query_details->execute();

    if(!$delete_query_details->execute())
    {
      print_r($delete_query_details->errorInfo());
    }
    else
    {
      // echo "Details Deleted -- ";
    }



    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $query = "INSERT INTO  stock_out_fi (  stock_out_fi_id, user_id ,  create_date  ,  sofi_date ,  sell_cattle_use ,  reciver, receiver_contact ,  silage_or_warehouse ,  discount ,  vat , tax ,delivery_charge,payment_status,amount_paid,previous_due_amount,previous_last_due_date ) 
                VALUES ( :stock_out_fi_id, :user_id ,  :create_date  ,  :sofi_date ,  :sell_cattle_use ,  :reciver , :receiver_contact,  :silage_or_warehouse ,  :discount ,  :vat , :tax , :delivery_charge,:payment_status,:amount_paid,:previous_due_amount,:previous_last_due_date )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':stock_out_fi_id' => $stock_out_fi_id,
//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':sofi_date' => $_POST['sofi_date'],
        ':sell_cattle_use' => $_POST['sell_cattle_use'],
        ':reciver' => $_POST['reciver'],
        ':receiver_contact' => $_POST['receiver_contact'],
        ':silage_or_warehouse' => $_POST['silage_or_warehouse'],
        ':discount' => $_POST['discount'],
        ':vat' => $_POST['vat'],
        ':tax' => $_POST['tax'],
        ':delivery_charge' => $_POST['delivery_charge'],
        ':payment_status' => $_POST['payment_status'],
        ':amount_paid' => $_POST['amount_paid'],
        ':previous_due_amount' => $_POST['previous_due_amount'],
        ':previous_last_due_date' => $_POST['previous_last_due_date']
      )
    );
        // if(!$statement->execute())
        // {
        //     print_r($statement->errorInfo());
        // }
    $result_master = $statement->fetchAll();
    if (isset($result_master)) {
      echo '<div class="alert alert-success">Inventory Info Edited</div>';

    }



      $json1 = json_decode($_POST['tabledata']);

      $queries = json_decode($json1);

      //Example foreach
      foreach ($queries as $query) {

        $sub_query = "
                  INSERT INTO stock_out_fi_details (stock_out_fi_id, user_id, create_date,  product, unit, quantity, price) 
                  VALUES ( :stock_out_fi_id, :user_id, :create_date, :product, :unit, :quantity, :price)
                  ";
        $statement1 = $connect->prepare($sub_query);
        $statement1->execute(
          array(

            ':stock_out_fi_id' => $stock_out_fi_id,
//                    ':user_id' => $_SESSION['user_id'],
            ':user_id' => 1,
            ':create_date' => $create_date,
            ':product' => $query->food,
            ':unit' => $query->unit,
            ':quantity' => $query->quantity,
            ':price' => $query->price
          )
        );

//            if(!$statement1->execute())
//            {
//              print_r($statement1->errorInfo());
//            }


      }

      $result_details = $statement1->fetchAll();

      if (isset($result_details)) {
        echo '<div class="alert alert-success">Inventory Table Edited</div>';
      }

    }

  // }


  if ($_POST['btn_action'] == 'delete') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    $stock_out_fi_id = $_POST["stock_out_fi_id"];

    $status = 0;

    if ($_POST["status"] == 0) {
      $status = 1;
    }

    $query = "UPDATE  stock_out_fi  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE stock_out_fi_id = :stock_out_fi_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,

        ':stock_out_fi_id' => $_POST['stock_out_fi_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Stock In Food Inventory Deleted</div>';
    }
  }

}

?>
