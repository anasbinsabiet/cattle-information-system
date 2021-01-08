<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['total_cost'])) || empty(trim($_POST['total_qty']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  food_formula (   user_id ,  create_date  ,  select_date ,  formula_code ,  total_cost ,  remarks ,  total_qty  ) 
                VALUES ( :user_id ,  :create_date  ,  :select_date ,  :formula_code ,  :total_cost ,  :remarks ,  :total_qty )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':select_date' => $_POST['select_date'],
        ':formula_code' => $_POST['formula_code'],
        ':total_cost' => $_POST['total_cost'],
        ':remarks' => $_POST['remarks'],
        ':total_qty' => $_POST['total_qty']
      )
    );

    $food_formula_id =  $connect->lastInsertId();
    $formula_code = date("Ym")."-".$food_formula_id;
    echo "Code Inserted";
    $code_query = $connect->prepare("UPDATE food_formula SET formula_code = '$formula_code' WHERE food_formula_id = '$food_formula_id' ");
    $code_query->execute();

    $result_master = $statement->fetchAll();
    if (isset($result_master)) {
      echo '<div class="alert alert-success">Inventory Info Added</div>';
      
    }


$statement = $connect->query("SELECT LAST_INSERT_ID()");
    $food_formula_id = $statement->fetchColumn();


/////


    if (isset($food_formula_id) && $food_formula_id > 0) {
        
        $json1 = json_decode($_POST['tabledata']);

        $queries = json_decode($json1);

        //Example foreach
        foreach ($queries as $query) {

            $sub_query = "
                  INSERT INTO food_formula_details (food_formula_id, user_id, create_date,  product, unit, quantity, unit_cost) 
                  VALUES ( :food_formula_id, :user_id, :create_date, :product, :unit, :quantity, :unit_cost)
                  ";
            $statement1 = $connect->prepare($sub_query);
            $statement1->execute(
                array(

                    ':food_formula_id' => $food_formula_id,
//                    ':user_id' => $_SESSION['user_id'],
                    ':user_id' => 1,
                    ':create_date' => $create_date,
                    ':product' => $query->food,
                    ':unit' => $query->unit,
                    ':quantity' => $query->quantity,
                    ':unit_cost' => $query->unit_cost

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
    SELECT * FROM food_formula WHERE food_formula_id = :food_formula_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':food_formula_id' => $_POST["food_formula_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['food_formula_id'] = $row['food_formula_id'];

      $output['select_date'] = $row['select_date'];
      $output['formula_code'] = $row['formula_code'];
      $output['total_cost'] = $row['total_cost'];
      $output['remarks'] = $row['remarks'];
      $output['total_qty'] = $row['total_qty'];
    }


    $sub_query = "
		SELECT * FROM food_formula_details 
		WHERE food_formula_id = '" . $_POST["food_formula_id"] . "'
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
      $array_user [$i]["unit_cost"] = $row['unit_cost'];

      $array_user[$i]["details_id"] = $row['food_formula_details_id'];
      $array_user[$i]["master_id"] = $row['food_formula_id'];
      $i++;


    }

    $array_user[$i] = $output;

    $output = json_encode($array_user);

    echo $output;



//    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    // if(empty(trim($_POST['total_cost'])) || empty(trim($_POST['total_qty']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $food_formula_id = $_POST['food_formula_id'];
    $delete_query = $connect->prepare("DELETE FROM food_formula WHERE food_formula_id = '$food_formula_id' ");
    $delete_query->execute();
    if(!$delete_query->execute())
    {
      print_r($delete_query->errorInfo());
    }
    else
    {
      // echo "Master Deleted -- ";
    }



    $delete_query_details = $connect->prepare("DELETE FROM food_formula_details WHERE food_formula_id = '$food_formula_id' ");
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

    $query = "INSERT INTO  food_formula (  food_formula_id, user_id ,  create_date  ,  select_date ,  formula_code ,  total_cost ,  remarks ,  total_qty ) 
                VALUES ( :food_formula_id, :user_id ,  :create_date  ,  :select_date ,  :formula_code ,  :total_cost ,  :remarks ,  :total_qty )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':food_formula_id' => $food_formula_id,
//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':create_date' => $create_date,
        ':select_date' => $_POST['select_date'],
        ':formula_code' => $_POST['formula_code'],
        ':total_cost' => $_POST['total_cost'],
        ':remarks' => $_POST['remarks'],
        ':total_qty' => $_POST['total_qty']
      )
    );
    $result_master = $statement->fetchAll();
    if (isset($result_master)) {
      echo '<div class="alert alert-success">Inventory Info Edited</div>';


    }



      $json1 = json_decode($_POST['tabledata']);

      $queries = json_decode($json1);

      //Example foreach
      foreach ($queries as $query) {

        $sub_query = "
                  INSERT INTO food_formula_details (food_formula_id, user_id, create_date,  product, unit, quantity, unit_cost) 
                  VALUES ( :food_formula_id, :user_id, :create_date, :product, :unit, :quantity, :unit_cost)
                  ";
        $statement1 = $connect->prepare($sub_query);
        $statement1->execute(
          array(

            ':food_formula_id' => $food_formula_id,
//                    ':user_id' => $_SESSION['user_id'],
            ':user_id' => 1,
            ':create_date' => $create_date,
            ':product' => $query->food,
            ':unit' => $query->unit,
            ':quantity' => $query->quantity,
            ':unit_cost' => $query->unit_cost

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

    $food_formula_id = $_POST["food_formula_id"];

    $status = 0;

    if ($_POST["status"] == 0) {
      $status = 1;
    }

    $query = "UPDATE  food_formula  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE food_formula_id = :food_formula_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,

        ':food_formula_id' => $_POST['food_formula_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
        echo '<div class="alert alert-success">Food Formula Deleted</div>';

    }
  }

}

?>
