<?php 
require_once './functions.php';
if(isset($_GET['action']) && $_GET['action'] === "edit" && isset($_GET['id'])) $employeeById = read_data_where("./data/employees", $_GET['id']);
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_GET['action']) && $_GET['action'] === "edit" && isset($_GET['id'])){
    $employee = [
        "employee_id"=>(int)$_POST['employee_id'],
        "name"=>$_POST['name'],
        "department"=>$_POST['department'],
        "position"=>$_POST['position'],
        "year_joined"=>(int)$_POST['year_joined'],
        "salary"=>(int)$_POST['salary'],
    ];
    update_data("./data/employees", $_GET['id'], $employee);
    header("Location: ./index.php");
    exit();
    ob_end_flush();
}