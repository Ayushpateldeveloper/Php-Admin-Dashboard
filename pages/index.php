<?php 
session_start();
include('../includes/header.php');





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <h1>New Page</h1>
        <?php
        echo $_SESSION['empname'];?>
    </div>
</body>
</html>
<script>
    $('#dashboard').addClass('active');
</script>
<?php 
include('../includes/footer.php');
?>