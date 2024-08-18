<?php 
if(isset($_GET['action']) && $_GET['action'] === "remove" && isset($_GET['id'])){
    echo remove_data("./data/employees", $_GET['id']);
    header("Location: ./index.php");
    exit();
    ob_end_flush();
}