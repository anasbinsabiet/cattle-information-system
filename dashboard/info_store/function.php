<?php 
function filled_farm_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM farm_profile WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['farm_profile_id'] . '" >' . $row['fp_name'] . '</option>';
    }
    return $output;
}

function filled_storage_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM storage WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['storage_id'] . '" >' . $row['storage_name'] . '</option>';
    }
    return $output;
}

function filled_supplier_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM supplier WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['supplier_id'] . '" >' . $row['supplier_name'] . '</option>';
    }
    return $output;
}

function filled_location_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM location WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['location_id'] . '" >' . $row['location_name'] . '</option>';
    }
    return $output;
}

function filled_customer_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM customer WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['customer_id'] . '" >' . $row['customer_name'] . '</option>';
    }
    return $output;
}

function filled_color_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM color WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['color_id'] . '" >' . $row['color_name'] . '</option>';
    }
    return $output;
}

function filled_animal_type_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM animal_type WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['animal_type_id'] . '" >' . $row['animal_type_name'] . '</option>';
    }
    return $output;
}

function filled_cattle_kin($connect)
{
    $statement = $connect->prepare("SELECT * FROM cattle_kin WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['cattle_kin_id'] . '" >' . $row['cattle_kin_name'] . '</option>';
    }
    return $output;
}

function filled_chari_unit($connect)
{
    $statement = $connect->prepare("SELECT * FROM chari_unit WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['chari_unit_id'] . '" >' . $row['chari_unit_name'] . '</option>';
    }
    return $output;
}

function filled_chari($connect)
{
    $statement = $connect->prepare("SELECT * FROM chari WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['chari_id'] . '" >' . $row['chari_code'] . '</option>';
    }
    return $output;
}

function filled_cattle_code($connect)
{
    $statement = $connect->prepare("SELECT * FROM cattle_profile WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['cattle_profile_id'] . '" >' . $row['cattle_code'] . '</option>';
    }
    return $output;
}

function filled_medicine_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM medicine WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['med_id'] . '" >' . $row['med_name'] . '</option>';
    }
    return $output;
}

function filled_food_type_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM food_type WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['food_type_id'] . '" >' . $row['food_type_name'] . '</option>';
    }
    return $output;
}

function filled_dr_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM doctor_profile WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['dp_id'] . '" >' . $row['dr_name'] . '</option>';
    }
    return $output;
}

function filled_problem_type($connect)
{
    $statement = $connect->prepare("SELECT * FROM problem_type WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['problem_type_id'] . '" >' . $row['problem_type_name'] . '</option>';
    }
    return $output;
}

function filled_medication_routine($connect)
{
    $statement = $connect->prepare("SELECT * FROM medication_routine WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value='0'>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['mr_id'] . '" >' . $row['mr_id'] . '</option>';
    }
    return $output;
}

function filled_problem_area($connect)
{
    $statement = $connect->prepare("SELECT * FROM problem_area WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=0> </option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['problem_area_id'] . '" >' . $row['problem_area_name'] . '</option>';
    }
    return $output;
}

function filled_cattle_status($connect)
{
    $statement = $connect->prepare("SELECT * FROM cattle_status WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['cattle_status_id'] . '" >' . $row['cattle_status_name'] . '</option>';
    }
    return $output;
}

function filled_food_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM food WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['food_id'] . '" >' . $row['food_name'] . '</option>';
    }
    return $output;
}

function filled_medicine_unit($connect)
{
    $statement = $connect->prepare("SELECT * FROM medicine_unit WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['medicine_unit_id'] . '" >' . $row['medicine_unit_name'] . '</option>';
    }
    return $output;
}

function filled_work_type($connect)
{
    $statement = $connect->prepare("SELECT * FROM work_type WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['work_type_id'] . '" >' . $row['work_type_name'] . '</option>';
    }
    return $output;
}

function filled_task_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM task WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['task_id'] . '" >' . $row['task_name'] . '</option>';
    }
    return $output;
}

function filled_task_type_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM task_type WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['task_type_id'] . '" >' . $row['task_type_name'] . '</option>';
    }
    return $output;
}

function filled_land_costing_type($connect)
{
    $statement = $connect->prepare("SELECT * FROM costing_type WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['costing_type_id'] . '" >' . $row['costing_type_name'] . '</option>';
    }
    return $output;
}

function filled_task_status_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM task_status WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['task_status_id'] . '" >' . $row['task_status_name'] . '</option>';
    }
    return $output;
}

function filled_employee_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM employee_profile WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['employee_profile_id'] . '" >' . $row['emp_name'] . '</option>';
    }
    return $output;
}

function filled_payment_status($connect)
{
    $statement = $connect->prepare("SELECT * FROM payment_status WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['payment_status_id'] . '" >' . $row['payment_status_name'] . '</option>';
    }
    return $output;
}

function filled_health_checkup_id($connect)
{
    $statement = $connect->prepare("SELECT * FROM health_checkup WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['hc_id'] . '" >' . $row['hc_id'] . '</option>';
    }
    return $output;
}

function filled_land_code($connect)
{
    $statement = $connect->prepare("SELECT * FROM land_profile WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['land_id'] . '" >' . $row['land_code'] . '</option>';
    }
    return $output;
}

function filled_land_collection_code($connect)
{
    $statement = $connect->prepare("SELECT * FROM land_collection WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['collection_id'] . '" >' . $row['collection_code'] . '</option>';
    }
    return $output;
}

function filled_designation_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM designation WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['designation_id'] . '" >' . $row['designation_name'] . '</option>';
    }
    return $output;
}

function filled_food_formula_unit_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM food_formula_unit WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['food_formula_unit_id'] . '" >' . $row['food_formula_unit_name'] . '</option>';
    }
    return $output;
}

function filled_food_formula($connect)
{
    $statement = $connect->prepare("SELECT * FROM food_formula WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['food_formula_id'] . '" >' . $row['formula_code'] . '</option>';
    }
    return $output;
}

function filled_land_type_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM land_type WHERE delete_status = '0' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['land_type_id'] . '" >' . $row['land_type_name'] . '</option>';
    }
    return $output;
}

function filled_manager_name($connect)
{
    $statement = $connect->prepare("SELECT * FROM employee_profile WHERE delete_status = '0' AND designation = '2' ");
    $statement->execute();
    $result = $statement->fetchAll();
    $output = "<option value=''>Select</option>";
    foreach ($result as $row) {
        $output .= '<option value="' . $row['employee_profile_id'] . '" >' . $row['emp_name'] . '</option>';
    }
    return $output;
}

function get_employee_name($connect, $employee_id)
{
    $statement = $connect->prepare("SELECT * FROM employee_profile WHERE employee_profile_id = '$employee_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['emp_name'];
    }
}

function get_food_formula($connect, $feeding_formula_no)
{
    $statement = $connect->prepare("SELECT * FROM food_formula WHERE food_formula_id = '$feeding_formula_no' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['formula_code'];
    }
}

function get_farm_name($connect, $farm_id)
{
    $statement = $connect->prepare("SELECT * FROM farm_profile WHERE farm_profile_id = '$farm_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['fp_name'];
    }
}

function get_chari_unit_name($connect, $unit)
{
    $statement = $connect->prepare("SELECT * FROM chari_unit WHERE chari_unit_id = '$unit' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['chari_unit_name'];
    }
}

function get_location_name($connect, $location)
{
    $statement = $connect->prepare("SELECT * FROM location WHERE location_id = '$location' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['location_name'];
    }
}

function get_collection_code($connect, $collection_id)
{
    $statement = $connect->prepare("SELECT * FROM land_collection WHERE collection_id  = '$collection_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['collection_code'];
    }
}

function get_payment_status_name($connect, $unit)
{
    $statement = $connect->prepare("SELECT * FROM payment_status WHERE payment_status_id = '$unit' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['payment_status_name'];
    }
}

function get_supplier_name($connect, $supplier)
{
    $statement = $connect->prepare("SELECT * FROM supplier WHERE supplier_id = '$supplier' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['supplier_name'];
    }
}

function get_designation_name($connect, $designation)
{
    $statement = $connect->prepare("SELECT * FROM designation WHERE designation_id = '$designation' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['designation_name'];
    }
}

function get_customer_name($connect, $customer)
{
    $statement = $connect->prepare("SELECT * FROM customer WHERE customer_id = '$customer' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['customer_name'];
    }
}

function get_farm_profile_name($connect, $farm_id)
{
    $statement = $connect->prepare("SELECT * FROM farm_profile WHERE farm_profile_id = '$farm_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['fp_name'];
    }
}

function get_chari_code($connect, $chari_no)
{
    $statement = $connect->prepare("SELECT * FROM chari WHERE chari_id = '$chari_no' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['chari_code'];
    }
}

function get_food_type_name($connect, $unit)
{
    $statement = $connect->prepare("SELECT * FROM food_type WHERE food_type_id = '$unit' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['food_type_name'];
    }
}

function get_cattle_code($connect, $cattle_id)
{
    $statement = $connect->prepare("SELECT * FROM cattle_profile WHERE cattle_profile_id = '$cattle_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['cattle_code'];
    }
}

function get_animal_type($connect, $animal_type)
{
    $statement = $connect->prepare("SELECT * FROM animal_type WHERE  animal_type_id = '$animal_type' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['animal_type_name'];
    }
}

function get_cattle_kin($connect, $cattle_kin)
{
    $statement = $connect->prepare("SELECT * FROM cattle_kin WHERE  cattle_kin_id = '$cattle_kin' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['cattle_kin_name'];
    }
}

function get_doctor_name($connect, $dr_name)
{
    $statement = $connect->prepare("SELECT * FROM doctor_profile WHERE dp_id = '$dr_name' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['dr_name'];
    }
}

function get_problem_type_name($connect, $problem_type)
{
    $statement = $connect->prepare("SELECT * FROM problem_type WHERE problem_type_id = '$problem_type' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['problem_type_name'];
    }
}

function get_color_name($connect, $color)
{
    $statement = $connect->prepare("SELECT * FROM color WHERE color_id = '$color' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['color_name'];
    }
}

function get_storage_name($connect, $storage)
{
    $statement = $connect->prepare("SELECT * FROM storage WHERE storage_id = '$storage' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['storage_name'];
    }
}

function get_problem_area_name($connect, $problem_area)
{
    $statement = $connect->prepare("SELECT * FROM problem_area WHERE problem_area_id = '$problem_area' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['problem_area_name'];
    }
}

function get_medicine_name($connect, $medicine_id)
{
    $statement = $connect->prepare("SELECT * FROM medicine WHERE med_id = '$medicine_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['med_name'];
    }
}

function get_medicine_unit_namme($connect, $medicine_unit_id)
{
    $statement = $connect->prepare("SELECT * FROM medicine_unit WHERE medicine_unit_id = '$medicine_unit_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['medicine_unit_name'];
    }
}

function get_land_type_name($connect, $land_type_id)
{
    $statement = $connect->prepare("SELECT * FROM land_type WHERE land_type_id = '$land_type_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['land_type_name'];
    }
}

function get_task_name($connect, $task_id)
{
    $statement = $connect->prepare("SELECT * FROM task WHERE task_id = '$task_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['task_name'];
    }
}

function get_land_code($connect, $land_id)
{
    $statement = $connect->prepare("SELECT * FROM land_profile WHERE land_id = '$land_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['land_code'];
    }
}

function get_food_name($connect, $food_id)
{
    $statement = $connect->prepare("SELECT * FROM food WHERE food_id = '$food_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['food_name'];
    }
}

function get_costing_type($connect, $costing_type_id)
{
    $statement = $connect->prepare("SELECT * FROM costing_type WHERE costing_type_id = '$costing_type_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['costing_type_name'];
    }
}

function get_task_type_name($connect, $task_type_id)
{
    $statement = $connect->prepare("SELECT * FROM task_type WHERE task_type_id = '$task_type_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['task_type_name'];
    }
}

function get_work_type_name($connect, $work_type_id)
{
    $statement = $connect->prepare("SELECT * FROM work_type WHERE work_type_id = '$work_type_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['work_type_name'];
    }
}

function get_task_status_name($connect, $task_status_id)
{
    $statement = $connect->prepare("SELECT * FROM task_status WHERE task_status_id = '$task_status_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['task_status_name'];
    }
}

function get_food_unit_name($connect, $food_formula_unit_id)
{
    $statement = $connect->prepare("SELECT * FROM food_formula_unit WHERE food_formula_unit_id = '$food_formula_unit_id' ");
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
        return $row['food_formula_unit_name'];
    }
}

?>