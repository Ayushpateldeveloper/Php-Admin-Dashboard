<?php
include('../includes/dbcon.php');


// 



if (isset($_POST['perdelete'])) {
    $id = $_POST['perdelete'] ;
  

    // Perform the delete query
    $deleteSql = "DELETE FROM user_data WHERE id = $id";
    $params = array($id);

    $deleteQuery = sqlsrv_query($Con, $deleteSql);
    // $deleteQuery = sqlsrv_query($Con, $deleteSql, $params);

    if ($deleteQuery === false) {
        echo "error: " . print_r(sqlsrv_errors(), true);
    } else {
        // echo "success";
        // $redirectLink='displaydata.php';
        // header('Location:'.$redirectLink);
}
}


?>
