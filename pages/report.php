<?php
include('../includes/header.php');
include('../includes/dbcon.php');
?>
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">
            <h3>User Report</h3>
        </div>
        <div class="col-auto">

        </div>
    </div>
    <form id="formData">
        <div class="d-flex">
            <label class="w-25">Name
                <input type="text" name="name" class="form-control">
            </label>
            <label class="w-25 ms-2">Designation
                <input type="text" name="designation" class="form-control">
            </label>
            <label for="gender" class="form-label w-25 ms-2">Gender
            <select class="form-select" id="gender" name="gender">
                <option></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            </label>
            <label class="w-25 ms-2"><br />
                <button type="button" class="btn btn-primary" id="getdata">Get Data</button>
            </label>
        </div>
        <div class="d-flex">
            <label class="w-25 ">EMP ID
                <input type="text" name="emp_id" class="form-control">
            </label>
            <label class="w-25 ms-2 ">Contact Number
                <input type="tel" name="contact_number" class="form-control">
            </label>
            <label class="w-25 ms-2 ">Email Id
                <input type="email" name="email_id" class="form-control">
            </label>
            <label class="w-25 ms-2 ">Date Of Joining
                <input type="date" name="date_of_joining" class="form-control">
            </label>
        </div>
    </form><br />
    <div id="userReport">

    </div>
</div>
<script>
    $('#report').addClass('active');
    $(document).on('click', '#getdata', function() {
        $.ajax({
            url: 'report_get.php',
            method: 'POST',
            data: $('#formData').serialize(),
            success: function(data) {
                $('#userReport').html(data);
            },
            error: function(data) {
                console.log(error);
            }
        });
    });
</script>
<?php
include('../includes/footer.php');
?>