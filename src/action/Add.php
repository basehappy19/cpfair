<?php 
require_once './functions.php';
$employees = read_data("./data/employees");

if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_GET['action']) && $_GET['action'] === "add"){
    $ids = array_column($employees, "id");
    $id = $ids ? max($ids) + 1 : 1;
    $employee = [
        "id"=>$id,
        "employee_id"=>(int)$_POST['employee_id'],
        "name"=>$_POST['name'],
        "department"=>$_POST['department'],
        "position"=>$_POST['position'],
        "year_joined"=>(int)$_POST['year_joined'],
        "salary"=>(int)$_POST['salary'],
    ];
    insert_data("./data/employees", $employee);
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
    ob_end_flush();
}