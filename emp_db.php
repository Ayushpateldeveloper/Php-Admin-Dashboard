<?php
include ('./includes/dbcon.php');

if(isset($_POST['register'])){

    $empid=$_POST['empid'];
    $empname=$_POST['empname'];
    $designation=$_POST['designation'];
    $department=$_POST['department'];
    $password=$_POST['password'];


     $sql = "INSERT into emp_data (empid, empname, designation, department, password) 
                  values ('$empid', '$empname', '$designation', '$department', '$password')";
     $run = sqlsrv_query($Con, $sql);
     session_start();
     $_SESSION['empname'] = $_POST['empname'];

}


?>