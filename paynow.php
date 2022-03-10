<?php
$cust_id = $_REQUEST['cust_id'];
$amount = $_REQUEST['money'];
$orderid = "ORDS" . rand(10000, 99999999);
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
    <div class="container" style="margin: 20px;">
        <div class="form">
            <p>Confirm the transaction...</p>
            <hr>
            <hr>
            <div class="final">
                <label>
                    <br>
                    <h3>Review these details...</h3>
                    <hr>
                </label>
                <br>
                <h3 style="color: red;">Payee's User Id : <?php echo $cust_id ?></h3>
                <div class="details">
                    <p>
                    <h3>Phone Number : <?php echo $row['phone'] ?></h3>
                    </p>
                    <p>
                    <h3>Payee's Name : <?php echo $row['fname'] . " " . $row['lname'] ?></h3>
                    </p>
                </div>
                <h4 style="color: red;"> Order Id : <?php echo $orderid; ?></h4>
                <p>
                <h2>For : </span><span>Money Transfer</h2>
                </p>
                <h2 style="color: cornflowerblue;"><span>Amount: </span> Rs.<?php echo $amount ?></h2>
                <br>
                <hr>

                <form method="post" action="../CLONE/PaytmKit/pgRedirect.php">

                    <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $orderid; ?>">

                    <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $cust_id ?>">

                    <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">

                    <input hidden id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">

                    <input type="hidden" title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $amount; ?>">

                    <input class="button" value="CheckOut" type="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>