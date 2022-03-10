<?php require_once "control.php"; ?>
<?php include_once "header.php"; ?>
<link rel="stylesheet" href="style2.css">

<body style="background: url(default.jpg);background-size: 1550px 900px;background-repeat :no-repeat;">
    <div class=" container" style="margin: 20px;">
        <div class="row">
            <div class="form">
                <form action="forgot.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>

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

                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="Email Me">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>