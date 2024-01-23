<?php
  ob_start();
  include('../includes/header.php');
  include('../includes/dbcon.php');
  $sql = 'SELECT * FROM user_data WHERE isActive = 1';
  $query = sqlsrv_query($Con, $sql);

  

  ?>

  <div class="container-fluid">
    <div>
      <a href="userRegistration.php?id=<?php echo $row['id']?>"><button class="btn btn-primary mb-5" type="submit"> <i class='bx bx-plus-circle'></i> &nbsp;&nbsp;Add New</button></a>
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
            <td class="contact_number"><?php echo $row['contact_number'] ?></td>
            <td class="email_id"><?php echo $row['email_id'] ?></td>
            <td class="designation"><?php echo $row['designation'] ?></td>
            <td class="date_of_joining"><?php echo $date_of_joining ?></td>
            <td class="birthdate"><?php echo $birthdate ?></td>
            <td>
              <div class="container" id="actions_style">
              <a href="../Functionality//user_data_update.php/id=<?php echo $row['id']?>"><button type="button" class="btn btn-primary edit" id="<?php echo $row['id'] ?>"><i class='bx bxs-edit'></i>&nbsp;&nbsp;Edit</button></a>
                <button type="button" class="btn btn-danger delete" id="<?php echo $row['id']?>"><i class='bx bxs-trash'></i>
                  Delete
                </button>
                <button type="button" class="btn btn-warning pdf" data-record-id="<?php echo $row['id'] ?>">
                  <i class='bx bxs-file-pdf'></i> &nbsp;pdf
                </button>
                <!-- <button type="button" class="btn btn-warning pdf" style="" data-bs-toggle="modal" data-bs-target="#deletemodal" data-record-id="<?php echo $row['id'] ?>">
                  <i class='bx bxs-file-pdf'></i> &nbsp;pdf
                </button> -->
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
          <!-- <th scope="col">Education</th> -->
          <th scope="col">Contact Number</th>
          <th scope="col">Email Id</th>
          <!-- <th scope="col">Address</th> -->
          <th scope="col">Designation</th>
          <th scope="col">Date Of Joining</th>
          <!-- <th scope="col">Salary</th> -->
          <!-- <th scope="col">Gender</th> -->
          <!-- <th scope="col">Martial Status</th> -->
          <th scope="col">Date of Birth</th>
          <th scope="col">Actions</th>
        </tr>
      </tfoot>
    </table>

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



   


    // ajax soft delete
    $(document).on("click", ".delete", function() {
      var perdelete = $(this).attr('id');
      console.log(perdelete);
  

      $.ajax({
        url: '../Functionality/user_data_crud_operation.php',
        method: 'POST',
        data: {
          perdelete: perdelete
        },
        success: function(data) {
          alert('Data is successfully deleted');
          console.log(data);
          window.open('http://localhost/Php-Admin-Dashboard/pages/user.php', '_self');
        },
        error: function(error) {  
          console.log(error);
        }
      });
    });
    // // ajax update
    // $(document).on("click", ".edit", function() {
    //   var editUser_Data = $(this).attr('id');
    //    console.log(editUser_Data);
  

    //   $.ajax({
    //     url: '../Functionality/user_data_update.php',
    //     method: 'POST',
    //     data: {
    //       editUser_Data: editUser_Data
    //     },
    //     success: function(data) {
    //       alert('Data is successfully updated');
    //       console.log(data);
    //       window.open('http://localhost/Php-Admin-Dashboard/pages/user.php', '_self');
    //     },
    //     error: function(error) {  
    //       console.log(error);
    //     }
    //   });
    // });
  </script>
  <?php
  include('../includes/footer.php');
