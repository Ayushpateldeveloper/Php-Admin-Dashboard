<?php
include('../includes/header.php');
include ('../includes/dbcon.php');
?>
<div class="container-fluid">
    
<form class="mt-5" action="user_db.php" method="post" id="saveForm" enctype="multipart/form-data">

    <div class="d-flex">
        <label for="exampleInputPassword" class="w-25">Employee ID
            <input type="int" class="form-control" name="emp_id" placeholder="Employee Id">
        </label>
        <label class="w-75 ms-2">Name
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text">First name</span></div>
                <input type="text" aria-label="First name" class="form-control" name="first_name" autocomplete="off">
                <span class="input-group-text">Middle name</span>
                <input type="text" aria-label="Middle name" class="form-control" name="middle_name" autocomplete="off">
                <span class="input-group-text">Last name</span>
                <input type="text" aria-label="Last  name" class="form-control"  name="last_name" autocomplete="off">
            </div>
        </label>
    </div>

    
    <div class="d-flex mt-2">
        <label class="w-25" for="education">Education
        <input type="text" class="form-control" id="" name="education" placeholder="education">
        </label>
        <label class="w-25 ms-2" for="contact_number">Contact Number
        <input type="tel" class="form-control" id="" name="contact_number" placeholder="+91-XXXXXXXXXX">
        </label>
        <label class="w-25 ms-2" for="">Email Id
        <input type="email" class="form-control" id="" name="email_id" placeholder="abc@gmail.com">
        </label>
        <label class="w-25 ms-2" for="">Designation
        <input type="text" class="form-control" id="" name="designation" placeholder="e.g. B.E">
        </label>
    </div>
    <label class="w-100 mt-2" for="address"> Address
    <textarea class="form-control" name="address" id="" rows="3"></textarea>
    </label>
    <div class="d-flex mb-3 mt-2">
        <label class="w-25" for="">Date of Joining
        <input type="date" class="form-control" name="date_of_joining" id="" placeholder="e.g. DD/MM/YYYY">
        </label>
        <label class="w-25 ms-2" for="">Salary
        <input type="number" class="form-control" id="" name="salary" placeholder="e.g 1,00,000">
        </label>
        <label class="w-25 ms-2" for="">Martial Status
        <input type="text" class="form-control" name="martial_status" id="" placeholder="Married,Unmarried,Divorced">
        </label>
        <label for="gender" class="form-label">Gender
            <select class="form-select" id="gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            </label>
    </div>
    <div class="d-flex mt-2">
        <label  class="w-25" for=""> BirthDate
        <input type="date" class="form-control" name="birthdate" id="" placeholder="e.g. DD/MM/YYYY">
        </label>
        <label class="w-25 ms-2" for=""> Profile Pic
        <input type="file" class="form-control" name="profile_image" id="" placeholder="Upload your image">
        </label>
    </div>
</form>
<div class="d-flex mt-4">
<button type="submit" class="btn btn-primary" name="save" form="saveForm">Submit</button>
<a href="user.php"><button class="btn btn-danger ms-2" type="button"> <i class='bx bx-arrow-back'></i>&nbsp;Back</button></a>
</div>
</div>


<script>
    $('#userPage').addClass('active');
</script>
<?php
include('../includes/footer.php');
