<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    //  if(empty(trim($_POST['select_date'])) || empty(trim($_POST['chari_no'])) || empty(trim($_POST['total_food_amount'])) || empty(trim($_POST['farm_id']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 
    $query = "INSERT INTO  fpft (   user_id ,  create_date  ,  select_date , time ,  chari_no , feeding_formula_no ,  total_food_amount , total_wastage ,  farm_id ,  remarks ) 
                VALUES ( :user_id ,  :create_date  ,  :select_date , :time ,  :chari_no , :feeding_formula_no ,  :total_food_amount , :total_wastage ,  :farm_id ,  :remarks )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':select_date' => $_POST['select_date'],
        ':time' => $_POST['time'],
        ':chari_no' => $_POST['chari_no'],
        ':feeding_formula_no' => $_POST['feeding_formula_no'],
        ':total_food_amount' => $_POST['total_food_amount'],
        ':total_wastage' => $_POST['total_wastage'],
        ':farm_id' => $_POST['farm_id'],
        ':remarks' => $_POST['remarks']
      )
    );
    $result_master = $statement->fetchAll();
    if (isset($result_master)) {
      echo '<div class="alert alert-success">Inventory Info Added</div>';
      
    }


$statement = $connect->query("SELECT LAST_INSERT_ID()");
    $fpft_id = $statement->fetchColumn();


/////


    if (isset($fpft_id) && $fpft_id > 0) {
        
        $json1 = json_decode($_POST['tabledata']);

        $queries = json_decode($json1);

        //Example foreach
        foreach ($queries as $query) {

            $sub_query = "
                  INSERT INTO fpftcl (fpft_id, user_id, create_date,  product, unit, amount) 
                  VALUES ( :fpft_id, :user_id, :create_date, :product, :unit, :amount)
                  ";
            $statement1 = $connect->prepare($sub_query);
            $statement1->execute(
                array(

                    ':fpft_id' => $fpft_id,
//                    ':user_id' => $_SESSION['user_id'],
                    ':user_id' => 1,
                    ':create_date' => $create_date,
                    ':product' => $query->food,
                    ':unit' => $query->unit,
                    ':amount' => $query->amount

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
    SELECT * FROM fpft WHERE fpft_id = :fpft_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':fpft_id' => $_POST["fpft_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['fpft_id'] = $row['fpft_id'];

      $output['select_date'] = $row['select_date'];
      $output['time'] = $row['time'];
      $output['chari_no'] = $row['chari_no'];
      $output['feeding_formula_no'] = $row['feeding_formula_no'];
      $output['total_food_amount'] = $row['total_food_amount'];
      $output['total_wastage'] = $row['total_wastage'];
      $output['farm_id'] = $row['farm_id'];
      $output['remarks'] = $row['remarks'];
    }


    $sub_query = "
		SELECT * FROM fpftcl
		WHERE fpft_id = '" . $_POST["fpft_id"] . "'
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
      $array_user [$i]["amount"] = $row['amount'];


      $array_user[$i]["details_id"] = $row['fpftcl_id'];
      $array_user[$i]["master_id"] = $row['fpft_id'];
      $i++;


    }

    $array_user[$i] = $output;

    $output = json_encode($array_user);

    echo $output;



//    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    // if(empty(trim($_POST['select_date'])) || empty(trim($_POST['chari_no'])) || empty(trim($_POST['total_food_amount'])) || empty(trim($_POST['farm_id']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $fpft_id = $_POST['fpft_id'];
    $delete_query = $connect->prepare("DELETE FROM fpft WHERE fpft_id = '$fpft_id' ");
    $delete_query->execute();
    if(!$delete_query->execute())
    {
      print_r($delete_query->errorInfo());
    }
    else
    {
      // echo "Master Deleted -- ";
    }



    $delete_query_details = $connect->prepare("DELETE FROM fpftcl WHERE fpft_id = '$fpft_id' ");
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

    $query = "INSERT INTO  fpft (  fpft_id, user_id ,  create_date  ,  select_date , time ,  chari_no , feeding_formula_no ,  total_food_amount , total_wastage ,  farm_id ,  remarks ) 
                VALUES ( :fpft_id, :user_id ,  :create_date  ,  :select_date , :time ,  :chari_no , :feeding_formula_no ,  :total_food_amount , :total_wastage ,  :farm_id ,  :remarks )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':fpft_id' => $fpft_id,
//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':select_date' => $_POST['select_date'],
        ':time' => $_POST['time'],
        ':chari_no' => $_POST['chari_no'],
        ':feeding_formula_no' => $_POST['feeding_formula_no'],
        ':total_food_amount' => $_POST['total_food_amount'],
        ':total_wastage' => $_POST['total_wastage'],
        ':farm_id' => $_POST['farm_id'],
        ':remarks' => $_POST['remarks']
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
                  INSERT INTO fpftcl (fpft_id, user_id, create_date,  product, unit, amount) 
                  VALUES ( :fpft_id, :user_id, :create_date, :product, :unit, :amount)
                  ";
        $statement1 = $connect->prepare($sub_query);
        $statement1->execute(
          array(

            ':fpft_id' => $fpft_id,
//                    ':user_id' => $_SESSION['user_id'],
            ':user_id' => 1,
            ':create_date' => $create_date,
            ':product' => $query->food,
            ':unit' => $query->unit,
            ':amount' => $query->amount

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

    $fpft_id = $_POST["fpft_id"];

    $status = 0;

    if ($_POST["status"] == 0) {
      $status = 1;
    }

    $query = "UPDATE  fpft  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE fpft_id = :fpft_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,

        ':fpft_id' => $_POST['fpft_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Stock In Food Inventory Deleted</div>';
    }
  }

}

?>
