<?php
session_start();
include_once "../CLONE/php/config.php";
$unique_id = $_SESSION['unique_id'];
$sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql2) > 0) {
    $row = mysqli_fetch_assoc($sql2);
    $record = $row['unique_id'];
}
if (!empty($_POST['submit']) && !empty($_POST['caption']) && !empty($_FILES['upload'])) {
    $caption = $_REQUEST['caption'];
    $file = $_FILES['upload'];
    $sql = mysqli_query($conn, "SELECT * FROM story");
    if ($sql) {
        if (isset($file)) {
            $img_name = $_FILES['upload']['name'];
            $img_type = $_FILES['upload']['type'];
            $tmp_name = $_FILES['upload']['tmp_name'];

            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);

            $extensions = ["jpeg", "png", "jpg"];
            if (in_array($img_ext, $extensions) === true) {
                $types = ["image/jpeg", "image/jpg", "image/png"];
                if (in_array($img_type, $types) === true) {
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "../CLONE/php/pictures/" . $new_img_name)) {
                        $ran_id = rand(time(), 100000000);
                        $query = mysqli_query($conn, "INSERT INTO `story` (`unique_id`, `caption`, `image`) 
                    VALUES ('$unique_id', '$caption', '$new_img_name')");
                        if ($query) {
                            $value = "Success !";
                        } else {
                            $error = "Something went wrong!";
                        }
                    } else {
                        $error = "Something went wrong!";
                    }
                } else {
                    $error = "Something went wrong!";
                }
            } else {
                $error = "Something went wrong!";
            }
        } else {
            $error = "Something went wrong!";
        }
    } else {
        $error = "Something went wrong!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Stories</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body style="background: url(default.jpg);background-size: 1550px 900px;background-repeat :no-repeat;">
    <div class="wrapper" style="margin: 20px;">
        <div class="first">
            <h2 style="background-color: #333333;color: red; margin: 10px; border-radius: 20px;">
                <a href="../CLONE/users.php"><i class="fas fa-arrow-left" style="background-color: cornflowerblue; 
                color:black;border-radius: 30px;margin: 5px;padding: 8px;font-size: 20px;"></i> </a>
                <i class="fas fa-camera"></i> Stories Of The Day ...
            </h2>
        </div>
        <div class="second" style="margin: 20px;display: flex;">
            <a href="../CLONE/uploads.php"><button class="plus" style="border:2px solid black;border-radius: 30px; cursor:pointer;display: flex;">
                    <img src="php/images/<?php echo $row['img']; ?>" alt="profile-pic" style="height: 50px; width: 50px; border-radius: 33px;">
                </button></a>
            <div style="margin-left: 12px;">
                <i style="font-size: 22px;"> My Status </i><br>
                <i> Tap to add status update </i>
            </div>
        </div>
        <hr style="margin-left: 20px;margin-right: 20px;">
        <hr style="margin-left: 20px;margin-right: 20px;">
        <div class="second" style="margin: 20px;display: flex;">

            <?php
            $sql = mysqli_query($conn, "SELECT * FROM `story` WHERE `unique_id`='$unique_id'");
            if (mysqli_num_rows($sql) == 0) {
                $say = 'href="../CLONE/story.php"';
            } else {
                $say = 'href = "../CLONE/view.php"';
            }
            ?>
            <a <?php echo $say ?>>
                <button class="plus" style="border: 2px solid black; border-radius: 30px; cursor:pointer;display: flex;">
                    <img src="php/images/<?php echo $row['img']; ?>" alt="profile-pic" style="height: 50px; width: 50px; border-radius: 33px;">
                </button>
            </a>
            <div style="margin-left: 12px;">
                <i style="font-size: 22px;"> <?php echo $row['fname'] . "'s" ?> Status </i><br>
                <i> Tap to view status update </i>
            </div>
        </div>
    </div>
</body>

</html>