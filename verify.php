<?php
$errors = array();
$record = $_REQUEST['record'];
?>

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
    $sql = "SELECT * FROM users WHERE unique_id = {$record}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("location: users.php");
    }
    $email = $row['email'];
    ?>
    <div class="container" style="margin: 20px;">
        <div class="form">
            <h2>Your Details...</h2>
            <hr>
            <hr><br>
            <h3>Name : <?php echo $row['fname'] . " " . $row['lname'] ?></h3>
            <p></p>
            <h3>Phone Number : <?php echo $row['phone'] ?></h3>
            <p></p>
            <h3 style="color:coral;">Email : <?php echo $row['email'] ?></h3>
            <form action="../verify-otp.php?record=<?php echo $record ?>" method="post">
                <input type="hidden" name="email" value="<?php echo $email ?>" type="submit">
                <h3 style="color: cornflowerblue;"> Click here to get otp
                    <input class="button" type="submit" value="Email Me">
                </h3>
                <?php
                if (count($errors) > 0) {
                ?>
                    <div class="alert alert-danger text-center">
                        <?php
                        foreach ($errors as $error) {
                            echo $error;
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>