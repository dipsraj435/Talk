<?php
$errors = array();
$record = $_REQUEST['record'];
include_once "../CLONE/php/config.php";
$sql = "SELECT * FROM users WHERE unique_id = {$record}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: users.php");
}
$email = $row['email'];
if (isset($_POST)) {
    $check_email = "SELECT * FROM `users` WHERE `email` = '$email'";
    $sql = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($sql) > 0) {
        $code = rand(999999, 111111);
        $insert_code = "UPDATE `users` SET `code` = $code WHERE `email` = '$email'";
        $run_query =  mysqli_query($conn, $insert_code);
        if ($run_query) {
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: dipsraj435@gmail.com";
            if (mail($email, $subject, $message, $sender)) {
                $info = "We've sent a passwrod reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Something went wrong!";
        }
    } else {
        $errors['email'] = "This email address does not exist!";
    }
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
    <div class="container" style="margin: 20px;">
        <div class="form">
            <form action="../CLONE/users.php" method="POST" autocomplete="off">

                <h2 style="text-align: center;color:cornflowerblue;">Code Verification</h2>
                <hr>
                <hr><br>
                <div style="text-align:center;">
                    <input style="text-align:center; height:40px; border-radius:2px;border-width:4px;" type="text" name="otp" maxlength="6" placeholder="Enter verification code" required>
                </div>
                <div style="text-align:center;">
                    <input class="button" type="submit" name="check" value="Submit">
                </div><?php
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