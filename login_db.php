<?php 
    session_start();
include('includes/dbcon.php');
if(isset($_POST['save'])){
    $empid = $_POST['empid'];
    $password = $_POST['password'];



    $sql = "SELECT * FROM emp_data where empid = '$empid' and password = '$password'";
    $run = sqlsrv_query($Con,$sql);
    $query = sqlsrv_query($Con, $sql, array(), array( "Scrollable" => 'static' ));
    $count = sqlsrv_num_rows($query);
    $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
    

    

    if($count == 1){
         $_SESSION['empid'] =$row['empid'];   
         $_SESSION['empname'] =$row['empname'];   
        header("location: pages/index.php");
   
    }else{
        ?>
            <script>
                alert('Data not match!');
                window.open('login.php','_self');
            </script>
        <?php
    }

}
?>