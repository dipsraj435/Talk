<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
    header("location: users.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realtime Chat App</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body style="background: url(default.jpg);background-size: 1550px 900px;background-repeat :no-repeat;">
    <div class="container">
        <div class="container">
            <div class="form">
                <h3 style="text-decoration:solid;color:cornflowerblue;font:bold;">ACTIVE Users - Tap to Chat <i class="fas fa-comment-dots"> </i>
                    <i class="fas fa-comment-dots"> </i> </i> ...
                </h3>
                <hr>
                <br>

                <?php
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                    $record = $row['unique_id'];
                    $user_id = $record;
                }
                ?>
                <div class="subject" style="display: flex;margin-bottom:12px;">
                    <div>
                        <img src="php/images/<?php echo $row['img']; ?>" alt="image" style="height: 50px;width:50px;border-radius:40px;">
                    </div>
                    <div style="margin-left:12px;">
                        <a href="../CLONE/php/profile.php?record=<?php echo $user_id ?>" style="color: black;">
                            <h3 style="font-size: 18px;"><?php echo $row['fname'] . " " . $row['lname'] ?></h3>
                        </a>
                        <p style="font-size: 14px;margin: 0px;"><?php echo $row['status']; ?></p>
                    </div>
                    <div>
                        <a href="../CLONE/users.php">
                            <button style="background-color: #333333; color:whitesmoke;height:35px;width:70px;margin-left:20px;margin-top:5px;padding:4px;">Go Back</button>
                        </a>
                    </div>
                </div>
                <hr><br>
                <div class="activeusers-list">

                </div>
            </div>
        </div>
    </div>
    <script src="javascript/active-users.js"></script>
</body>

</html>