<?php
session_start();
$user = $_SESSION['empname'];
include '../includes/dbcon.php';
if (isset($_POST['save'])){
    $empid = $_POST['empid'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $date = $_POST['date'];
    $material = $_POST['material'];
    $qnty = $_POST['qnty'];
    $rate = $_POST['rate'];
    $amount = $_POST['amount'];

    $sql = "SELECT MAX(id) as id FROM memo_head";
    $run = sqlsrv_query($Con,$sql);
    $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
    $id = $row['id'] + 1;

    $sql1 = "INSERT INTO memo_head(id,empid,empname,department,designation,date,createdBy) VALUES('$id','$empid','$name','$department','$designation','$date','$user')";
    $run1 = sqlsrv_query($Con,$sql1);

    if ($run) {
        foreach ($material as $key => $value) {
            $sql2 = "INSERT INTO memo_detail(iid,material,qnty,rate,amount,createdBy) VALUES('$id','".$value."','".$qnty[$key]."','".$rate[$key]."','".$amount[$key]."','$user')";
            $run2 = sqlsrv_query($Con,$sql2);
        }

        if ($run1 && $run2) {
            echo "<script>alert('Data Inserted');window.open('memo.php','_self');</script>";
        }else{
            echo "error in details";
            print_r(sqlsrv_errors());
        }
    }else{
        echo "error in head";
        print_r(sqlsrv_errors());
    }
}
?>