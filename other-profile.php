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
            <img src="../php/images/<?php echo $row['img'] ?>" alt="image" style="height: 50px;width:50px; border-radius:10px;margin-left:130px">
            <h2 style="margin-left: 30px;"><?php echo $row['fname'] ?>'s Profile...</h2>
            <hr>
            <hr>
            <div class="final">
                <br>
                <h3 style="color: red;">User Id : <?php echo $record ?></h3>
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
                    <a href="../active-user.php"><button style="height: 30px;width:300px;" name="edit">Go To Active Users</button></a>
                    <p></p>
                    <a href="../chat.php?user_id=<?php echo $record ?>"><button style="height: 30px;width:300px;" name="edit">Go To Chat</button></a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>