  <?php 
  include('../includes/dbcon.php');

  //insert
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

  //update
  if (isset($_POST['update'])) {


    $profile_image=$_FILES['profile_image']['name'];
    move_uploaded_file($_FILES['profile_image']['tmp_name'],'../pages/Profile_photo/'.$profile_image);
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


      if (!empty($_FILES['profile_image']['name'])) {
        $profile_image = $_FILES['profile_image']['name'];
        move_uploaded_file($_FILES['profile_image']['tmp_name'], '../pages/Profile_photo/' . $profile_image);
    } else {
        $profile_image = $_POST['imageName'];
    }
      $updateSql = "UPDATE user_data SET emp_id = '$emp_id', first_name = '$first_name', middle_name = '$middle_name', 
                          last_name = '$last_name',education = '$education', contact_number = '$contact_number', email_id = '$email_id', 
                          address = '$address',designation = '$designation', date_of_joining = '$date_of_joining', salary = '$salary', 
                          martial_status = '$martial_status',gender = '$gender', birthdate = '$birthdate', profile_image ='$profile_image'  WHERE id = '$id'";

      $updateQuery = sqlsrv_query($Con, $updateSql);

      if ($updateQuery === false) {
        echo 'Update failed: ' . print_r(sqlsrv_errors(), true);
      } else {
        header('Location:user.php');
      }
    }

    //soft_delete

    if (isset($_POST['restoreId'])) {
      $id = $_POST['restoreId'] ;
    

      // Perform the delete query
      $deleteSql = "UPDATE user_data  set isActive='0' WHERE id = ?";
      $params = array($id);

      $deleteQuery = sqlsrv_query($Con, $deleteSql, $params);

      if ($deleteQuery === false) {
          echo "error: " . print_r(sqlsrv_errors(), true);
      } else {
          echo 'data successfully deleted';
          header('Location:user.php');
  }
  }

  ?> 