<?php
session_start();
include_once "../CLONE/php/config.php";
$unique_id = $_SESSION['unique_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Uploads</title>
    <!--Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body style="background: url(default.jpg);background-size: 1550px 900px;background-repeat :no-repeat;">
    <div class="container" style="margin: 20px;">
        <div class="wrapper">
            <h2 style="background-color: black;color: red; margin-bottom: 20px; border-radius: 20px;">
                <a href="../CLONE/story.php"><i class="fas fa-arrow-left" style="background-color: cornflowerblue; 
                            color:black;border-radius: 30px;margin: 5px;padding: 8px;font-size: 20px;"></i> </a>
                <i class="fas fa-camera"></i> Upload Your Story ...
            </h2>
            <form action="../CLONE/story.php" method="post" enctype="multipart/form-data">
                <figure class="image-container">
                    <img id="chosen-image">
                    <figcaption id="file-name"></figcaption>
                </figure>
                <input id="upload" type="file" name="upload" accept="image/*">
                <input class="caption" type="text" name="caption" placeholder="ADD YOUR CAPTION HERE...">
                <input class="btn" type="submit" name="submit" value="Save and Upload">
            </form>
        </div>
    </div>
    <script src="../CLONE/javascript/uploads.js"></script>
</body>

</html>