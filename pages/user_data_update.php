<?php
include('../includes/dbcon.php');
include('../includes/header.php');
$id = $_GET['id'];
$sql = "SELECT * FROM user_data WHERE id = '$id' AND isActive = 1";
$query = sqlsrv_query($Con, $sql);
$row = SQLSRV_FETCH_ARRAY($query, SQLSRV_FETCH_ASSOC);

?>
    <div class="container-fluid">
        <form class="mt-5" action="user_db.php" method="post" id="update_form">

          <div class="form-group">
            <label for="exampleInputPassword">Employee ID</label>
            <input type="int" class="form-control " name="emp_id" value="<?php  echo $row['emp_id'] ?>">
            <input type="hidden"  name="editUser_Data" value="<?php echo $id ?>">
          </div>

          <label>Name</label>
          <div class="form-group mt-2">
            <span class="input-group-text">First name</span>
            <input type="text" aria-label="First name" class="form-control " value="<?php echo $row['first_name']?>" name="first_name" autocomplete="off">
            <span class="input-group-text">Middle name</span>
            <input type="text" aria-label="Middle name" class="form-control " value="<?php echo $row['middle_name']?>" name="middle_name" autocomplete="off">
            <span class="input-group-text">Last name</span>
            <input type="text" aria-label="Last  name" class="form-control "  value="<?php echo $row['last_name']?>" name="last_name" autocomplete="off">
          </div>
          <div class="form-group mt-2">
            <label for="education">Education</label>
            <input type="text" class="form-control " value="<?php echo $row['education']?>" name="education">
          </div>
          <div class="form-group mt-2">
            <label for="contact_number">Contact Number</label>
            <input type="tel" class="form-control "  name="contact_number" value="<?php  echo $row['contact_number'] ?>">
          </div>
          <div class="form-group mt-2">
            <label for="">Email Id</label>
            <input type="email" class="form-control " id="" name="email_id" value="<?php  echo $row['email_id'] ?>">
          </div>
          <div class="mb-3 mt-2">
            <label for="address" class="form-label"> Address</label>
            <textarea class="form-control " name="address"  rows="3" value="<?php echo $row['address']?>"></textarea>
          </div>

          <div class="form-group mt-2">
            <label for="">Designation</label>
            <input type="text" class="form-control "  name="designation" value="<?php  echo $row['designation'] ?>">
          </div>

          <div class="form-group mt-2">
            <label for="">Date of Joining</label>
            <input type="date" class="form-control " name="date_of_joining"  value="<?php  echo $row['date_of_joining'] ?>">
          </div>

          <h4>rfverfgrf</h4>

          <div class="form-group mt-2">
            <label for="">Salary</label>
            <input type="number" class="form-control "  name="salary" value="<?php  echo $row['salary'] ?>">
          </div>
          <div class="form-group mt-2">
            <label for="">Martial Status</label>
            <input type="text" class="form-control " name="martial_status"  value="<?php  echo $row['martial_status'] ?>">
            <div class="form-group mt-2">
              <label for="">Gender</label>
              <input type="text" class="form-control "  name="gender" value="<?php  echo $row['gender'] ?>">
            </div>
            <div class="form-group mt-2">
              <label for=""> BirthDate</label>
              <input type="date" class="form-control " name="birthdate"  value="<?php  echo $row['birthdate'] ?>" >
          
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="update" form="update_form">Submit</button>

            </div>
        </form>

      </div>
      <?php
  include('../includes/footer.php');
?>