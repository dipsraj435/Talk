<?php
session_start();
include_once "../CLONE/php/config.php";
$unique_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * FROM `story` WHERE `unique_id`='$unique_id'");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    $record = $row['unique_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Story</title>
    <link rel="stylesheet" href="../CLONE/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body style="background: url(default.jpg);background-size: 1550px 900px;background-repeat :no-repeat;">
    <div class="container" style="background-color:white;" style="margin: 20px;">
        <h2 style="background-color: #333333;color: red; margin: 10px; border-radius: 20px;">
            <a href="../CLONE/story.php"><i class="fas fa-arrow-left" style="background-color: cornflowerblue; 
                color:black;border-radius: 30px;margin: 5px;padding: 8px;font-size: 20px;"></i> </a>
            <i class="fas fa-camera"></i> Stories Of The Day ...
        </h2>
        <div class="wrapper" style="border:3px solid black;margin:50px;margin-top:10px;margin-bottom:10px;">
            <img src="php/pictures/<?php echo $row['image']; ?>" alt="profile-pic" style="display:flex;height: 400px; width: 350px; border-radius: 0px;">
        </div>
        <h3 style="background-color: #333333;color:white;text-align:center;margin:30px;margin-top:10px;margin-bottom:10px;"><?php echo $row['caption']; ?></h3>
        <button style="width: 60%;margin-left:20%;height:30px;background-color:#333333;color:white;cursor:pointer;">Next Story</button>
    </div>
</body>

</html>