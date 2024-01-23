<?php
  ob_start();
  include('../includes/header.php');
  include('../includes/dbcon.php');
  $sql = 'SELECT * FROM user_data WHERE isActive = 1';
  $query = sqlsrv_query($Con, $sql);
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
        <div class="row">
            <div class="col">
                <h3>User Data</h3>
            </div>
            <div class="col-auto">
                <a href="userRegistration.php" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div>
            <table class="table table-bordered table-hover" id="tableData">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Profile Photo</th>
                        <th scope="col">Emp ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Date Of Joining</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = SQLSRV_FETCH_ARRAY($query, SQLSRV_FETCH_ASSOC)) {
                        $img_path = "http://localhost/Php-Admin-Dashboard/pages/Profile_photo/";
                        $date_of_joining = date('Y-m-d', strtotime($row['date_of_joining']->format('Y-m-d')));
                        $birthdate = date('Y-m-d', strtotime($row['birthdate']->format('Y-m-d')));
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><img src="<?php echo $img_path . $row['profile_image'] ?>" width="40px" height="40px"></td>
                        <td class="emp_id"><?php echo $row['emp_id'] ?></td>
                        <td class="first_name"><?php echo $row['first_name'] ?></td>
                        <td class="middle_name"><?php echo $row['middle_name'] ?></td>
                        <td class="last_name"><?php echo $row['last_name'] ?></td>
                        <td class="contact_number"><?php echo $row['contact_number'] ?></td>
                        <td class="email_id"><?php echo $row['email_id'] ?></td>
                        <td class="designation"><?php echo $row['designation'] ?></td>
                        <td class="date_of_joining"><?php echo $date_of_joining ?></td>
                        <td>
                            <a href="user_data_update.php?id=<?php echo $row['id']?>" class="btn btn-primary edit"><i class='bx bxs-edit'></i>&nbsp;&nbsp;Edit</a>
                            <button type="button" class="btn btn-danger soft_delete" id="<?php echo $row['id']?>"><i class='bx bxs-trash'></i>
                            Delete
                            </button>
                            <button type="button" class="btn btn-warning pdf" data-record-id="<?php echo $row['id'] ?>">
                            <i class='bx bxs-file-pdf'></i> &nbsp;pdf
                            </button>
                            <!-- <button type="button" class="btn btn-warning pdf" style="" data-bs-toggle="modal" data-bs-target="#deletemodal" data-record-id="<?php echo $row['id'] ?>">
                            <i class='bx bxs-file-pdf'></i> &nbsp;pdf
                            </button> -->
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script>
    $('#userPage').addClass('active');
    $(document).ready(function() {
        $('#tableData').DataTable({
            info: false,
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: ['pageLength', 'copy', 'excel', 'pdf', 'colvis'],
            stateSave: true
        });
    });

    $(document).on("click", ".soft_delete", function() {
        var restoreId = $(this).attr('id');
        // console.log(restoreId);
        if(confirm('Are You Sure')){
            $.ajax({
                url: 'user_db.php',
                method: 'POST',
                data: {restoreId:restoreId},
                success: function(data) {
                alert(data);
                 window.reload();
                },
                error: function(data) {
                console.log(error);
                }
            });
        }else{
            return false;
        }
    });
</script>
<?php
  include('../includes/footer.php');
?>