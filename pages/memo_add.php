<?php
include('../includes/header.php');
?>
<div class="container-fluid">
    <form action="memo_db.php" method="post" id="empdata">
    <div class="row">
        <div class="d-flex ">
            <label class="w-25">EMP ID
                <input class="form-control" type="text" name="empid"></label>
            <label class="w-25 ms-2">Name (Full Name)
                <input class="form-control" type="text" name="name"></label>
            <label class="w-25 ms-2">Department
                <input class="form-control" type="text" name="department"></label>
            <label class="w-25 ms-2">Designation
                <input class="form-control" type="text" name="designation"></label>
            <label class="w-25  ms-2">Date
                <input class="form-control" type="date" name="date"></label>
            </div>
        </div>
        <div class="p-2">
            <div class="row mt-5">
                <table class="table text-center">
                    <thead>
                        <th>Material</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="material[]" class="form-control"></td>
                            <td><input type="number" name="qnty[]" class="form-control"></td>
                            <td><input type="number" name="rate[]" class="form-control"></td>
                            <td><input type="number" name="amount[]" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="material[]" class="form-control"></td>
                            <td><input type="number" name="qnty[]" class="form-control"></td>
                            <td><input type="number" name="rate[]" class="form-control"></td>
                            <td><input type="number" name="amount[]" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="material[]" class="form-control"></td>
                            <td><input type="number" name="qnty[]" class="form-control"></td>
                            <td><input type="number" name="rate[]" class="form-control"></td>
                            <td><input type="number" name="amount[]" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mt-3 float-end" name="save" form="empdata">Submit</button>
                <a href="memo_add.php" class="btn btn-danger mt-3 float-end me-2" type="button"> <i class='bx bx-arrow-back'></i>&nbsp;Back</a>
            </div>
        </div>
    </form>
</div>


<script>
    $('#memo').addClass('active');
</script>
<?php
include('../includes/footer.php');
?>