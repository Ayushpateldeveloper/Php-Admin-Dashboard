<?php
include('../includes/dbcon.php');
$sql = "SELECT * FROM user_data WHERE id = '93'";
$result = sqlsrv_query($Con, $sql);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume | <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .header .name {
            display: flex;
            flex-direction: column;
            justify-content: end;
            text-transform: uppercase;
            font-size: 20px;
            color: #131313;
        }

        .header .designation {
            margin-top: 70px;
            font-size: large;
        }

        .header .profile_pic img {
            border-radius: 30%;
            margin-top: 25px;
        }
        .container{
            margin-left:20%;
        }

        .left-side,
        .right-side {
            width: 50%;
            float: left;
            padding: 20px;
        }

        .left-side h3,
        .right-side h3 {
            color: #333;
        }

        .bottom-body {
            clear: both;
            padding: 20px;
        }

        .bottom-body h4 {
            color: #333;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="name">
            <h1><span><?php echo $row['first_name'] ?><br><?php echo $row['last_name'] ?></span></h1>
        </div>
        <div class="designation">
            <h3><?php echo $row['designation'] ?></h3>
        </div>
        <div class="profile_pic">
            <img src="../pages/Profile_photo/<?php echo $row['profile_image'] ?>" width="100px" height="100px">
        </div>
    </div>
    <div class="container">
    <div class="left-side">
        <div class="address">
            <h3>Address</h3>
            <p><?php echo $row['address'] ?></p>
        </div>
        <div class="personal_info">
            <h3>Personal Information</h3>
            <p>Contact Number: <?php echo $row['contact_number'] ?></p>
            <p>Email Id: <?php echo $row['email_id'] ?></p>
        </div>
    </div>

    <div class="right-side">
        <div class="education">
            <h3>Education</h3>
            <p><?php echo $row['education'] ?></p>
        </div>
        <div class="education">
            <h3>Date of Joining</h3>
            <p><?php echo $row['date_of_joining']->format('Y-m-d') ?></p>
        </div>
    </div>

    <div class="bottom-body">
        <h4>Birthdate</h4>
        <p><?php echo $row['birthdate']->format('Y-m-d') ?></p>
        <h4>Gender</h4>
        <p><?php echo $row['gender'] ?></p>
        <h4>Martial Status</h4>
        <p><?php echo $row['martial_status'] ?></p>
    </div>
    </div>

        

</body>

</html>


<!-- <table>

        <th>Profile Photo</th>
        <td>
            << /td><br />

        <th>Emp ID</th>
        <td class="emp_id"></td>

        <th>First Name</th>
        


        <th>Date Of Joining</th>
       

        <th>Education</th>
      

        <th>Birtdate</th>
        <td class="birthdate"><?php echo $row['birthdate']->format('Y-m-d') ?></td>



    </table> -->




    