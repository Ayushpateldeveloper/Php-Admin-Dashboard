  <?php
  ob_start();
  include('../includes/header.php');
  include('../includes/dbcon.php');
  $sql = 'SELECT * FROM user_data ';
  $query = sqlsrv_query($Con, $sql);

  // update query 

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
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


  ob_end_flush();

  ?>

  <div class="container-fluid">
    <div>
      <a href="userRegistration.php"><button class="btn btn-primary mb-5" type="submit"> <i class='bx bx-plus-circle'></i> &nbsp;&nbsp;Add New</button></a>
    </div>
    <table class="table pt-5" id="dataTable">
      <thead>

        <tr>
          <th scope="col">Id</th>
          <th scope="col">Profile Photo</th>
          <th scope="col">Emp ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Middle Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Education</th>
          <th scope="col">Contact Number</th>
          <th scope="col">Email Id</th>
          <th scope="col">Address</th>
          <th scope="col">Designation</th>
          <th scope="col">Date Of Joining</th>
          <th scope="col">Salary</th>
          <th scope="col">Gender</th>
          <th scope="col">Martial Status</th>
          <th scope="col">Date of Birth</th>
          <th scope="col">Actions</th>
        </tr>

      </thead>
      <tbody>
        <?php
        while ($row = SQLSRV_FETCH_ARRAY($query, SQLSRV_FETCH_ASSOC)) {
          $id = $row['id'];
          $img_path = "http://localhost/Php-Admin-Dashboard/pages/Profile_photo/";
          $raw_date_date_of_joining = $row['date_of_joining'];
          $date_of_joining = date('Y-m-d', strtotime($raw_date_date_of_joining->format('Y-m-d')));
          $raw_date_birtdate = $row['birthdate'];
          $birthdate = date('Y-m-d', strtotime($raw_date_birtdate->format('Y-m-d')));


        ?>
          <tr>
            <td><?php echo $row['id'] ?></td>
            <td><img src="<?php echo $img_path . $row['profile_image'] ?>" width="40px" height="40px"></td>

            <td class="emp_id"><?php echo $row['emp_id'] ?></td>
            <td class="first_name"><?php echo $row['first_name'] ?></td>
            <td class="middle_name"><?php echo $row['middle_name'] ?></td>
            <td class="last_name"><?php echo $row['last_name'] ?></td>
            <td class="education"><?php echo $row['education'] ?></td>
            <td class="contact_number"><?php echo $row['contact_number'] ?></td>
            <td class="email_id"><?php echo $row['email_id'] ?></td>
            <td class="address"><?php echo $row['address'] ?></td>
            <td class="designation"><?php echo $row['designation'] ?></td>
            <td class="date_of_joining"><?php echo $date_of_joining ?></td>
            <td class="salary"><?php echo $row['salary'] ?></td>
            <td class="martial_status"><?php echo $row['martial_status'] ?></td>
            <td class="gender"><?php echo $row['gender'] ?></td>
            <td class="birthdate"><?php echo $birthdate ?></td>
            <td>
              <div class="container" id="actions_style">
                <button type="button" class="btn btn-primary edit" id="<?php echo $row['id'] ?>"><i class='bx bxs-edit'></i>&nbsp;&nbsp;Edit</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bxs-trash'></i>
    Delete
  </button>
                <button type="button" class="btn btn-warning soft_delete" style="" data-bs-toggle="modal" data-bs-target="#deletemodal" data-record-id="<?php echo $row['id'] ?>">
                  <i class='bx bxs-file-pdf'></i> &nbsp;pdf
                </button>
              </div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Profile Photo</th>
          <th scope="col">Emp ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Middle Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Education</th>
          <th scope="col">Contact Number</th>
          <th scope="col">Email Id</th>
          <th scope="col">Address</th>
          <th scope="col">Designation</th>
          <th scope="col">Date Of Joining</th>
          <th scope="col">Salary</th>
          <th scope="col">Gender</th>
          <th scope="col">Martial Status</th>
          <th scope="col">Date of Birth</th>
          <th scope="col">Actions</th>
        </tr>
      </tfoot>
    </table>

  </div>
  <!-- update Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit information</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <form class="mt-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="update_form">

          <div class="form-group">
            <label for="exampleInputPassword">Employee ID</label>
            <input type="int" class="form-control input_emp_id" name="emp_id" placeholder="Employee Id">
          </div>

          <label>Name</label>
          <div class="form-group mt-2">
            <span class="input-group-text">First name</span>
            <input type="text" aria-label="First name" class="form-control input_first_name" name="first_name" autocomplete="off">
            <span class="input-group-text">Middle name</span>
            <input type="text" aria-label="Middle name" class="form-control input_middle_name" name="middle_name" autocomplete="off">
            <span class="input-group-text">Last name</span>
            <input type="text" aria-label="Last  name" class="form-control input_last_name" name="last_name" autocomplete="off">
          </div>
          <div class="form-group mt-2">
            <label for="education">Education</label>
            <input type="text" class="form-control einput_education" id="" name="education" placeholder="education">
          </div>
          <div class="form-group mt-2">
            <label for="contact_number">Contact Number</label>
            <input type="tel" class="form-control input_contact_number" id="" name="contact_number" placeholder="+91-XXXXXXXXXX">
          </div>
          <div class="form-group mt-2">
            <label for="">Email Id</label>
            <input type="email" class="form-control input_email_id" id="" name="email_id" placeholder="abc@gmail.com">
          </div>
          <div class="mb-3 mt-2">
            <label for="address" class="form-label"> Address</label>
            <textarea class="form-control input_address" name="address" id="" rows="3"></textarea>
          </div>

          <div class="form-group mt-2">
            <label for="">Designation</label>
            <input type="text" class="form-control input_designation" id="" name="designation" placeholder="e.g. B.E">
          </div>

          <div class="form-group mt-2">
            <label for="">Date of Joining</label>
            <input type="date" class="form-control input_date_of_joining" name="date_of_joining" id="" placeholder="e.g. DD/MM/YYYY">
          </div>

          <div class="form-group mt-2">
            <label for="">Salary</label>
            <input type="number" class="form-control input_salary" id="" name="salary" placeholder="e.g 1,00,000">
          </div>
          <div class="form-group mt-2">
            <label for="">Martial Status</label>
            <input type="text" class="form-control input_martial_status" name="martial_status" id="" placeholder="Married,Unmarried,Divorced">
            <div class="form-group mt-2">
              <label for="">Gender</label>
              <input type="text" class="form-control input_gender" id="" name="gender" placeholder="M,F,O">
            </div>
            <div class="form-group mt-2">
              <label for=""> BirthDate</label>
              <input type="date " class="form-control input_birthdate" name="birthdate" id="update_form" placeholder="e.g. DD/MM/YYYY">
              <input type="hidden" id="dataid" name="id" value="<?php echo $id ?>">
            </div>




            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" form="update_form">Submit</button>

            </div>
        </form>

      </div>
    </div>
  </div>
  <!-- update Modal -->







  <script>
    $('#userPage').addClass('active');
    $(document).ready(function() {
      $('#dataTable').DataTable({
        info: false,
        lengthChange: false,
        dom: 'Bfrtip',
        buttons: ['pageLength', 'copy', 'excel', 'pdf', 'colvis'],
        stateSave: true

      });
    });



    $(document).on("click", ".edit", function() {

      var id = $(this).attr('id');

      $('#myModal').modal('show');
      $('#dataid').val(id);
      var id = $(this).attr('id');

      // emp_id
      var in_emp_id = $(this).closest('tr').find('.emp_id').text();
      $('.input_emp_id').val(in_emp_id);
      //first name
      var in_first_name = $(this).closest('tr').find('.first_name').text();
      $('.input_first_name').val(in_first_name);
      //middle name
      var in_middle_name = $(this).closest('tr').find('.middle_name').text();
      $('.input_middle_name').val(in_middle_name);
      //last name
      var in_last_name = $(this).closest('tr').find('.last_name').text();
      $('.input_last_name').val(in_last_name);
      //education
      var in_education = $(this).closest('tr').find('.education').text();
      $('.input_education').val(in_education);
      //address
      var in_address = $(this).closest('tr').find('.address').text();
      $('.input_address').val(in_address);
      //designation
      var in_designation = $(this).closest('tr').find('.designation').text();
      $('.input_designation').val(in_designation);
      //date of joining
      var in_date_of_joining = $(this).closest('tr').find('.date_of_joining').text();
      $('.input_date_of_joining').val(in_date_of_joining);
      //salary
      var in_salary = $(this).closest('tr').find('.salary').text();
      $('.input_salary').val(in_salary);
      //martial Status
      var in_martial_status = $(this).closest('tr').find('.martial_status').text();
      $('.input_martial_status').val(in_martial_status);
      //gender
      var in_gender = $(this).closest('tr').find('.gender').text();
      $('.input_gender').val(in_gender);
      //birthdate
      var in_birthdate = $(this).closest('tr').find('.birthdate').text();
      $('.input_birthdate').val(in_birthdate);

      // contact number
      var in_contact_number = $(this).closest('tr').find('.contact_number').text();
      $('.input_contact_number').val(in_contact_number);

      // name
      var in_email_id = $(this).closest('tr').find('.email_id').text();
      $('.input_email_id').val(in_email_id);

    });


    // soft delete
    $(document).on("click", ".delete", function() {
          var restoreId = $(this).data('restore-id');
          console.log(restoreId);
          if(confirm('Are You Sure')){
              $.ajax({
                  url: 'ajaxrestore.php',
                  method: 'POST',
                  data: {restoreId:restoreId},
                  success: function(data) {
                  alert(data);
                  window.open('crud.php','_self');
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
