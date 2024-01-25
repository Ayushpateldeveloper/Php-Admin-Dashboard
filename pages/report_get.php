<?php 
include('../includes/dbcon.php');

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $emp_id = $_POST['emp_id'];
    $contact_number = $_POST['contact_number'];
    $email_id = $_POST['email_id'];
    $date_of_joining= $_POST['date_of_joining'];
    $condition = '';

    if (!empty($name)) {
        $condition .= " AND first_name = '$name'";
    }
    if (!empty($designation)) {
        $condition .= " AND designation = '$designation'";
    }
    if (!empty($gender)) {
        $condition .= " AND gender = '$gender'";
    }
    if (!empty($emp_id)) {
        $condition .= " AND emp_id = '$emp_id'";
    }
    if (!empty($contact_number)) {
        $condition .= " AND contact_number = '$emp_contact_number'";
    }
    if (!empty($email_id)) {
        $condition .= " AND email_id = '$email_id'";
    }
    if (!empty($date_of_joining)) {
        $condition .= " AND date_of_joining = '$date_of_joining'";
    }

    $sql = "SELECT * FROM user_data WHERE id > 0".$condition;
    $run = sqlsrv_query($Con, $sql);
?>
<table class="table table-bordered table-hover mt-3" id="userDataTable">
    <thead>
        <tr class="text-wrap">
            <th scope="col" class="text-nowrap overflow-hidden"></th>
            <th scope="col" class="rounded-5 text-nowrap overflow-hidden">Profile Photo</th>
            <th scope="col" class="text-nowrap overflow-hidden">Emp ID</th>
            <th scope="col" class="text-nowrap overflow-hidden">First Name</th>
            <th scope="col" class="text-nowrap overflow-hidden">Middle Name</th>
            <th scope="col" class="text-nowrap overflow-hidden">Last Name</th>
            <th scope="col" class="text-nowrap overflow-hidden">Contact Number</th>
            <th scope="col" class="text-nowrap overflow-hidden">Email Id</th>
            <th scope="col" class="text-nowrap overflow-hidden">Designation</th>
            <th scope="col" class="text-nowrap overflow-hidden">Date Of Joining</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = SQLSRV_FETCH_ARRAY($run, SQLSRV_FETCH_ASSOC)) {
            $img_path = "http://localhost/Php-Admin-Dashboard/pages/Profile_photo/";
            $date_of_joining = date('Y-m-d', strtotime($row['date_of_joining']->format('Y-m-d')));
            $birthdate = date('Y-m-d', strtotime($row['birthdate']->format('Y-m-d')));
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><img src="<?php echo $img_path . $row['profile_image'] ?>" width="40px" height="40px" class="rounded-circle rounded-lg border border-info" ></td>
                <td class="emp_id"><?php echo $row['emp_id'] ?></td>
                <td class="first_name"><?php echo $row['first_name'] ?></td>
                <td class="middle_name"><?php echo $row['middle_name'] ?></td>
                <td class="last_name"><?php echo $row['last_name'] ?></td>
                <td class="contact_number"><?php echo $row['contact_number'] ?></td>
                <td class="email_id"><?php echo $row['email_id'] ?></td>
                <td class="designation"><?php echo $row['designation'] ?></td>
                <td class="date_of_joining"><?php echo $row['date_of_joining']->format('d-m-Y') ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
}
?>