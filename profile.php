<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realtime Chat App</title>
    <link rel="stylesheet" href="../style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body style="background: url(../default.jpg);background-size: 1550px 900px;background-repeat :no-repeat;">
    <?php
    include "../php/config.php";
    $record = $_REQUEST['record'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$record}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    } else {
        header("location: users.php");
    }
    $email = $row['email'];
    ?>

    <div class="container" style="margin: 20px;">
        <div class="form">
            <hr>
            <p style="font-size: 40px;"><img src="../php/images/<?php echo $row['img'] ?>" alt="image" style="height: 45px;width:45px;border-radius:10px;"> Your Profile...</p>
            <hr>
            <hr>
            <div class="final">
                <?php
                include "../php/config.php";
                $record = $_REQUEST['record'];
                if (isset($_POST['update'])) {
                    $fname2 = $_REQUEST['fname'];
                    $lname2 = $_REQUEST['lname'];
                    $email2 = $_REQUEST['email'];
                    if ($email2 != $email) {
                        $sql3 = mysqli_query($conn, "UPDATE `users` SET `state` = 'notverified' WHERE `unique_id` = '$record'");
                    }
                    $phone2 = $_REQUEST['phone'];
                    $sql2 = mysqli_query($conn, "SELECT * FROM `users` WHERE `unique_id` = $record");
                    if ($sql2) {
                        $edit = "UPDATE `users` SET `fname` = '$fname2', `lname` = '$lname2', `phone` = '$phone2', `email` = '$email2' WHERE `unique_id` = '$record'";
                        $result = mysqli_query($conn, $edit);
                        if ($result) {
                            echo "Updation Successful , Please Go Back! ";
                        } else {
                            echo "Sorry! Unable to Update your Profile.";
                        }
                    }
                }
                ?>
                <label>
                    <br>
                    <h3 style="color: cornflowerblue;">You can edit your details here... </h3>
                    <hr>
                </label>
                <br>
                <h3 style="color: red;">Your User Id : <?php echo $record ?></h3>
                <div class="details">
                    <p>
                    <h3>Name : <?php echo $row['fname'] . " " . $row['lname']; ?>
                    </h3>
                    </p>
                    <h3>Email : <?php echo $row['email']; ?>
                    </h3>
                    </p>
                    <p>
                    <h3>Phone Number : <?php echo $row['phone']; ?>
                    </h3>
                    </p>
                </div>
            </div>
            <a href="../php/edit-details.php?record=<?php echo $record ?>">
                <button style="height: 30px;width:300px;" name="edit">Edit Details</button>
            </a>
            <p></p>
            <a href="../users.php"><button style="height: 30px;width:300px;">Go Back</button></a>
        </div>
    </div>

</body>

</html>