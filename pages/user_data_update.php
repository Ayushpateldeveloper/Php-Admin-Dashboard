<?php
include('../includes/dbcon.php');
include('../includes/header.php');
$id = $_GET['id'];
$sql = "SELECT * FROM user_data WHERE id = '$id' AND isActive = 1";
$query = sqlsrv_query($Con, $sql);
$row = SQLSRV_FETCH_ARRAY($query, SQLSRV_FETCH_ASSOC);

?>
<div class="container-fluid">

    <form class="mt-5" action="user_db.php" method="post" id="updateForm" enctype="multipart/form-data">

        <div class="d-flex">
            <label for="exampleInputPassword" class="w-25">Employee ID
                <input type="int" class="form-control" name="emp_id" value="<?php echo $row['emp_id'] ?>">
            </label>
            <label class="w-75 ms-2">Name
                <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">First name</span></div>
                    <input type="text" aria-label="First name" class="form-control" name="first_name" autocomplete="off" value="<?php echo $row['first_name'] ?>">
                    <span class="input-group-text">Middle name</span>
                    <input type="text" aria-label="Middle name" class="form-control" name="middle_name" autocomplete="off" value="<?php echo $row['middle_name'] ?>">
                    <span class="input-group-text">Last name</span>
                    <input type="text" aria-label="Last  name" class="form-control" name="last_name" autocomplete="off" value="<?php echo $row['last_name'] ?>">
                </div>
            </label>
        </div>


        <div class="d-flex mt-2">
            <label class="w-25" for="education">Education
                <input type="text" class="form-control" id="" name="education" value="<?php echo $row['education'] ?>">
            </label>
            <label class="w-25 ms-2" for="contact_number">Contact Number
                <input type="tel" class="form-control" id="" name="contact_number" value="<?php echo $row['contact_number'] ?>">
            </label>
            <label class="w-25 ms-2" for="">Email Id
                <input type="email" class="form-control" id="" name="email_id" value="<?php echo $row['email_id'] ?>">
            </label>
            <label class="w-25 ms-2" for="">Designation
                <input type="text" class="form-control" id="" name="designation" value="<?php echo $row['designation'] ?>">
            </label>
        </div>
        <label class="w-100 mt-2" for="address"> Address
            <textarea class="form-control" name="address" id="" rows="3"><?php echo $row['address'] ?></textarea>
        </label>
        <div class="d-flex mb-3 mt-2">
            <label class="w-25" for="">Date of Joining
                <?php
                $dateOfJoining = $row['date_of_joining']->format('Y-m-d');
                ?>
                <input type="date" class="form-control" name="date_of_joining" value="<?php echo $dateOfJoining ?>">
            </label>
            <label class="w-25 ms-2" for="">Salary
                <input type="number" class="form-control" id="" name="salary" value="<?php echo $row['salary'] ?>">
            </label>
            <label class="w-25 ms-2" for="">Martial Status
                <input type="text" class="form-control" name="martial_status" value="<?php echo $row['martial_status'] ?>">
            </label>
            <label class="w-25 ms-2" for="">Gender
                <input type="text" class="form-control" id="" name="gender" value="<?php echo $row['gender'] ?>">
            </label>
        </div>
        <div class="d-flex mt-2">
            <label class="w-25" for=""> BirthDate
                <?php
                $birthdate = $row['birthdate']->format('Y-m-d');
                ?>
                <input type="date" class="form-control" name="birthdate" value="<?php echo $birthdate ?>">
            </label>
            <label class="w-25 ms-2" for="">Profile Pic
            <div class="input-group mb-1">
                <input type="file" class="form-control" name="profile_image" accept="image/*">
                <?php if (!empty($row['profile_image'])) {
                    $img_path = "http://localhost/Php-Admin-Dashboard/pages/Profile_photo/"
                ?>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <img src="<?php echo $img_path . $row['profile_image'] ?>" width="50" height="50" alt="Profile Image">
                        </span>
                    </div>
                <?php } ?>
            </div>
            </label>
        </div>
        <input type="hidden" name="editUser_Data" value="<?php echo $row['id']?>">
    </form>
    <div class="d-flex mt-4">
        <button type="submit" class="btn btn-primary" name="update" form="updateForm">Edit</button>
        <a href="user.php"><button class="btn btn-danger ms-2" type="button"> <i class='bx bx-arrow-back'></i>&nbsp;Back</button></a>
    </div>
</div>
<?php
include('../includes/footer.php');
?>