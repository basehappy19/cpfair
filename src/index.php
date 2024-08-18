<?php
ob_start();
require_once './functions.php';
require_once './action/Add.php';
require_once './action/Remove.php';

$folderComponents = "./components/";

if(isset($_GET['action'])){
    switch($_GET['action']) {
        case "add":
            $title = "เพิ่มพนักงาน";
            $btn = [
                "path"=>"/",
                "name"=>"กลับหน้าหลัก",
            ];
            $component = $folderComponents . "EmployessForm.php";
            break;
        case "edit":
            $title = "แก้ไขพนักงาน";
            $btn = [
                "path"=>"/",
                "name"=>"กลับหน้าหลัก",
            ];
            $component = $folderComponents . "EmployessForm.php";
            break;
        default:
            header("Location: /");
            exit();
    }
} else {
    if(isset($_GET['search'])){
        if($_GET['search'] !== ""){
            $employees = search("./data/employees", $_GET['search']);
        } else {
            $employees = read_data("./data/employees");
        }
    } else {
        $employees = read_data("./data/employees");
    }
    $title = "พนักงานทั้งหมด";
    $btn = [
        "path"=>"?action=add",
        "name"=>"เพิ่มพนักงาน",
    ];
    $component = $folderComponents . "EmployeesTable.php";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>พนักงานทั้งหมด</title>
    <link rel="stylesheet" href="./starterpacks/dist/css/bootstrap.min.css">
</head>
<body>
    <script src="./starterpacks/jquery-3.7.1.min.js"></script>
    <div class="d-flex flex-col justify-content-center align-items-center vh-100">
        <div class="container">
            <div class="border shadow rounded p-4" style="min-height: 80vh">
                <div class="d-flex justify-content-between align-items-center">
                    <h1><?php echo $title; ?></h1>
                    <a href="<?php echo $btn['path']; ?>" class="btn btn-primary"><?php echo $btn['name']; ?></a>
                </div>
                <?php include_once $component; ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#employeeTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>