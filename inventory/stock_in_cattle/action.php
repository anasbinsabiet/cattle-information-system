<?php
$connect = "";

include "../../dashboard/info_store/info_address.php";

if (isset($_POST['btn_action'])) {
  if ($_POST['btn_action'] == 'Add') {

    date_default_timezone_set("Asia/Dhaka");
    $create_date = date("Y-m-d H:i:s");

    // if(empty(trim($_POST['sic_date'])) || empty(trim($_POST['supplier'])) || empty(trim($_POST['farm_id']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $query = "INSERT INTO  stock_in_cattle (   user_id ,  create_date  ,  sic_date ,  supplier ,  farm_id ,  remarks  ) 
                VALUES ( :user_id ,  :create_date  ,  :sic_date ,  :supplier ,  :farm_id ,  :remarks )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':sic_date' => $_POST['sic_date'],
        ':supplier' => $_POST['supplier'],
        ':farm_id' => $_POST['farm_id'],
        ':remarks' => $_POST['remarks']
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
    $stock_in_cattle_id = $statement->fetchColumn();


/////


    if (isset($stock_in_cattle_id) && $stock_in_cattle_id > 0) {
        
        $json1 = json_decode($_POST['tabledata']);

        $queries = json_decode($json1);

        //Example foreach
        foreach ($queries as $query) {

            $sub_query = "
                  INSERT INTO stock_in_cattle_details (stock_in_cattle_id, user_id, create_date,  cattle, price, buy_birth) 
                  VALUES ( :stock_in_cattle_id, :user_id, :create_date, :cattle, :price, :buy_birth)
                  ";
            $statement1 = $connect->prepare($sub_query);
            $statement1->execute(
                array(

                    ':stock_in_cattle_id' => $stock_in_cattle_id,
//                    ':user_id' => $_SESSION['user_id'],
                    ':user_id' => 1,
                    ':create_date' => $create_date,
                    ':cattle' => $query->cattle,
                    
                    ':price' => $query->price,
                    ':buy_birth' => $query->buy_birth

                )
            );

           // if(!$statement1->execute())
           // {
           //   print_r($statement1->errorInfo());
           // }


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
    SELECT * FROM stock_in_cattle WHERE stock_in_cattle_id = :stock_in_cattle_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':stock_in_cattle_id' => $_POST["stock_in_cattle_id"]
      )
    );
    $result = $statement->fetchAll();
    foreach ($result as $row) {
      $output['stock_in_cattle_id'] = $row['stock_in_cattle_id'];

      $output['sic_date'] = $row['sic_date'];
      $output['supplier'] = $row['supplier'];
      $output['farm_id'] = $row['farm_id'];
      $output['remarks'] = $row['remarks'];
    }


    $sub_query = "
		SELECT * FROM stock_in_cattle_details 
		WHERE stock_in_cattle_id = '" . $_POST["stock_in_cattle_id"] . "'
		";
    $statement = $connect->prepare($sub_query);
    $statement->execute();
    $sub_result = $statement->fetchAll();

    $array_user = array();
    $i = 0;

    foreach ($sub_result as $row) {
      $array_user [$i]["cattle"] = $row['cattle'];
//      $array_user [$i]["cattle"] = get_cattle_name($connect, $row['cattle']);
     
      $array_user [$i]["price"] = $row['price'];
      $array_user [$i]["buy_birth"] = $row['buy_birth'];


      $array_user[$i]["details_id"] = $row['stock_in_cattle_details_id'];
      $array_user[$i]["master_id"] = $row['stock_in_cattle_id'];
      $i++;


    }

    $array_user[$i] = $output;

    $output = json_encode($array_user);

    echo $output;



//    echo json_encode($output);
  }


  if ($_POST['btn_action'] == 'Edit') {

    // if(empty(trim($_POST['sic_date'])) || empty(trim($_POST['supplier'])) || empty(trim($_POST['farm_id']))) {
    //   echo '<div class="alert alert-warning">Error !!!!!! - (<!-- <span class="text-red">*</span> -->) Required field cannot be empty</div>';
    // }else{ 

    $stock_in_cattle_id = $_POST['stock_in_cattle_id'];
    $delete_query = $connect->prepare("DELETE FROM stock_in_cattle WHERE stock_in_cattle_id = '$stock_in_cattle_id' ");
    $delete_query->execute();
    if(!$delete_query->execute())
    {
      print_r($delete_query->errorInfo());
    }
    else
    {
      // echo "Master Deleted -- ";
    }



    $delete_query_details = $connect->prepare("DELETE FROM stock_in_cattle_details WHERE stock_in_cattle_id = '$stock_in_cattle_id' ");
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

    $query = "INSERT INTO  stock_in_cattle (  stock_in_cattle_id, user_id ,  create_date  ,  sic_date , supplier ,  farm_id ,  remarks ) 
                VALUES ( :stock_in_cattle_id, :user_id ,  :create_date  ,  :sic_date ,  :supplier ,  :farm_id ,  :remarks )";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
        ':stock_in_cattle_id' => $stock_in_cattle_id,
//        ':user_id' => $_SESSION['user_id'],

        ':user_id' => 1,
        ':create_date' => $create_date,
        ':sic_date' => $_POST['sic_date'],
        ':supplier' => $_POST['supplier'],
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
                  INSERT INTO stock_in_cattle_details (stock_in_cattle_id, user_id, create_date,  cattle, price, buy_birth) 
                  VALUES ( :stock_in_cattle_id, :user_id, :create_date, :cattle, :price, :buy_birth)
                  ";
        $statement1 = $connect->prepare($sub_query);
        $statement1->execute(
          array(

            ':stock_in_cattle_id' => $stock_in_cattle_id,
//                    ':user_id' => $_SESSION['user_id'],
            ':user_id' => 1,
            ':create_date' => $create_date,
            ':cattle' => $query->cattle,
            
            ':price' => $query->price,
            ':buy_birth' => $query->buy_birth

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

    $stock_in_cattle_id = $_POST["stock_in_cattle_id"];

    $status = 0;

    if ($_POST["status"] == 0) {
      $status = 1;
    }

    $query = "UPDATE  stock_in_cattle  SET  user_id = :user_id , update_date = :update_date ,  delete_status = :delete_status  WHERE stock_in_cattle_id = :stock_in_cattle_id";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(

//        ':user_id' => $_SESSION['user_id'],
        ':user_id' => 1,
        ':update_date' => $create_date,
        ':delete_status' => $status,

        ':stock_in_cattle_id' => $_POST['stock_in_cattle_id']

      )
    );
    $result = $statement->fetchAll();
    if (isset($result)) {
      echo '<div class="alert alert-success">Stock In cattle Inventory Deleted</div>';
    }
  }
}

?>
