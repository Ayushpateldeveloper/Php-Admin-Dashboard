<?php
session_start();
if(!isset($_SESSION['empname'])){
header('Location:http://localhost/Php-Admin-Dashboard/login.php');
}

if(isset($_GET['action'])){
    $action = $_GET['action'];
    if ($action == 'logout') {
        session_destroy();
        header('Location: http://localhost/Php-Admin-Dashboard/login.php');
        exit();
    } 
}


?>