<?php 
include('../includes/dbcon.php');
if (isset($_POST['save'])) {
   
    $profile_image=$_FILES['profile_image']['name'];
    move_uploaded_file($_FILES['profile_image']['tmp_name'],'../pages/Profile_photo/'.$profile_image);
    // print_r($_FILES);
    // die();
    $emp_id = $_POST['emp_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $education = $_POST['education'];
    $contact_number = $_POST['contact_number'];
    $email_id = $_POST['email_id'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $date_of_joining = $_POST['date_of_joining'];
    $salary = $_POST['salary'];
    $martial_status = $_POST['martial_status'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT into user_data (emp_id, first_name, middle_name, last_name, education, contact_number,email_id,address,designation,date_of_joining,salary,martial_status,gender,birthdate,profile_image,isActive) 
                values ('$emp_id', '$first_name', '$middle_name', '$last_name', '$education', '$contact_number','$email_id','$address','$designation','$date_of_joining','$salary','$martial_status','$gender','$birthdate','$profile_image','1')";
    $run = sqlsrv_query($Con, $sql);


    if ($run) {
        ?>
            <script>
                alert("Data Inserted Successfully");
                window.location.href = "user.php";
            </script>
        <?php
    } else {
      echo 'Error: ' . print_r(sqlsrv_errors(), true);
    }
  
}

if (isset($_POST['update'])) {

    $id = $_POST['editUser_Data'];
    $emp_id = $_POST['emp_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $education = $_POST['education'];
    $contact_number = $_POST['contact_number'];
    $email_id = $_POST['email_id'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $date_of_joining = $_POST['date_of_joining'];
    $salary = $_POST['salary'];
    $martial_status = $_POST['martial_status'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];

    $updateSql = "UPDATE user_data SET emp_id = '$emp_id', first_name = '$first_name', middle_name = '$middle_name', 
                        last_name = '$last_name',education = '$education', contact_number = '$contact_number', email_id = '$email_id', 
                        address = '$address',designation = '$designation', date_of_joining = '$date_of_joining', salary = '$salary', 
                        martial_status = '$martial_status',gender = '$gender', birthdate = '$birthdate'  WHERE id = $id";

    $updateQuery = sqlsrv_query($Con, $updateSql);

    if ($updateQuery === false) {
      echo 'Update failed: ' . print_r(sqlsrv_errors(), true);
    } else {
      header('Location:user.php');
    }
  }

?> 