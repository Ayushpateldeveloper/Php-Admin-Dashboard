<?php
include('../includes/header.php');
include ('../includes/dbcon.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'    ) {
   
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

    $sql = "INSERT into user_data (emp_id, first_name, middle_name, last_name, education, contact_number,email_id,address,designation,date_of_joining,salary,martial_status,gender,birthdate,profile_image) 
                values ('$emp_id', '$first_name', '$middle_name', '$last_name', '$education', '$contact_number','$email_id','$address','$designation','$date_of_joining','$salary','$martial_status','$gender','$birthdate','$profile_image')";

$run = sqlsrv_query($Con, $sql);


    if ($run) {
      echo "data is succesfully stored";
    } else {
      echo 'Error: ' . print_r(sqlsrv_errors(), true);
    }
  
}




?>


<div>
    <a href="user.php"><button class="btn btn-primary" type="button"> <i class='bx bx-arrow-back'></i>&nbsp;Back</button></a>
</div>
<form class="mt-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputPassword">Employee ID</label>
        <input type="int" class="form-control" name="emp_id" placeholder="Employee Id">
    </div>

    <label>Name</label>
    <div class="input-group mt-2">
        <div class="input-group-prepend">
            <span class="input-group-text">First name</span>
        </div>
        <input type="text" aria-label="First name" class="form-control" name="first_name" autocomplete="off">
        <span class="input-group-text">Middle name</span>
        <input type="text" aria-label="Middle name" class="form-control" name="middle_name" autocomplete="off">
        <span class="input-group-text">Last name</span>
        <input type="text" aria-label="Last  name" class="form-control"  name="last_name" autocomplete="off">
    </div>
    <div class="form-group mt-2">
        <label for="education">Education</label>
        <input type="text" class="form-control" id="" name="education" placeholder="education">
    </div>
    <div class="form-group mt-2">
        <label for="contact_number">Contact Number</label>
        <input type="tel" class="form-control" id="" name="contact_number" placeholder="+91-XXXXXXXXXX">
    </div>
    <div class="form-group mt-2">
        <label for="">Email Id</label>
        <input type="email" class="form-control" id="" name="email_id" placeholder="abc@gmail.com">
    </div>
    <div class="mb-3 mt-2">
        <label for="address" class="form-label"> Address</label>
        <textarea class="form-control" name="address" id="" rows="3"></textarea>
    </div>
    
    <div class="form-group mt-2">
        <label for="">Designation</label>
        <input type="text" class="form-control" id="" name="designation" placeholder="e.g. B.E">
    </div>
    
    <div class="form-group mt-2">
        <label for="">Date of Joining</label>
        <input type="date" class="form-control" name="date_of_joining" id="" placeholder="e.g. DD/MM/YYYY">
    </div>
    
    <div class="form-group mt-2">
        <label for="">Salary</label>
        <input type="number" class="form-control" id="" name="salary" placeholder="e.g 1,00,000">
    </div>
    <div class="form-group mt-2">
        <label for="">Martial Status</label>
        <input type="text" class="form-control" name="martial_status" id="" placeholder="Married,Unmarried,Divorced">
    <div class="form-group mt-2">
        <label for="">Gender</label>
        <input type="text" class="form-control" id="" name="gender" placeholder="M,F,O">
    </div>
    <div class="form-group mt-2">
        <label for=""> BirthDate</label>
        <input type="date" class="form-control" name="birthdate" id="" placeholder="e.g. DD/MM/YYYY">
    </div>
    <div class="form-group mt-2">
        <label for=""> Profile Pic</label>
        <input type="file" class="form-control" name="profile_image" id="" placeholder="Upload your image">
    </div>
    
   
    <button type="submit" class="btn btn-primary mt-3 mb-5">Submit</button>
</form>


<script>
    $('#userPage').addClass('active');
</script>
<?php
include('../includes/footer.php');
