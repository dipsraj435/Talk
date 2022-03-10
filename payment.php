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
        <form method="POST" class="form" action="../CLONE/paynow.php">
            <p>Money Transfer Made Easy With PAYTM UPIs...</p>
            <hr>
            <hr><br>
            <div class="field input">
                <h3 style="color: red;">Payee's User Id : <?php $cust_id = base64_decode($_REQUEST['cust_id']);
                                                            echo $cust_id; ?></h3>
                <?php
                include_once "../CLONE/php/config.php";
                $sql = "SELECT * FROM users WHERE unique_id = {$cust_id}";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                } else {
                    header("location: users.php");
                }
                ?>
                <div class="details">
                    <p>
                    <h3>Phone Number : <?php echo $row['phone'] ?></h3>
                    </p>
                    <p>
                    <h3>Payee's Name : <?php echo $row['fname'] . " " . $row['lname'] ?></h3>
                    </p>
                </div>
                <input type="hidden" name="cust_id" required id="cust_id" value="<?php echo $cust_id ?>" method="post">
                <label>
                    <h4 style="color: cornflowerblue;">Enter the amount to be transfered...</h4>
                </label>
                <input type="number" name="money" placeholder=" Amount in INR" required id="money" method="post">
            </div>
            <div>
                <a href="../CLONE/paynow.php" class="paynow">
                    <button class=" button" type="submit">Pay Now</button>
                </a>
            </div>
        </form>
    </div>
</body>

</html>