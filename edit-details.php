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
    include_once "../php/config.php";
    $record = $_REQUEST['record'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$record}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    } else {
        header("location: users.php");
    }
    ?>
    <div class="container" style="margin: 20px;">
        <div class="form">
            <hr>
            <p style="font-size: 40px;"><img src="../php/images/<?php echo $row['img'] ?>" alt="image" style="height: 45px;width:45px;border-radius:10px;">Edit Details...</p>
            <hr>
            <hr>
            <div class="final">
                <div class="details">
                    <form style="text-align:center;" action="../php/profile.php?record=<?php echo $record ?>" method="post">
                        <h3 style="color: red;">Your User Id : <?php echo $record ?></h3>
                        <p>
                        <h3>First Name : <input method="post" id="fname" name="fname" value="<?php echo $row['fname']; ?>">
                        </h3>
                        </p>
                        <p>
                        <h3>Last Name : <input type="text" method="post" id="lname" name="lname" value="<?php echo $row['lname']; ?>">
                        </h3>
                        </p>
                        <h3>Your Email : <input type="email" method="post" id="email" name="email" value="<?php echo $row['email']; ?>">
                        </h3>
                        </p>
                        <p>
                        <h3>P. Number : <input type="number" method="post" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
                        </h3>
                        </p>
                        <button class="button" type="submit" name="update"> Update Details </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>

</body>

</html>