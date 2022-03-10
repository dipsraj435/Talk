<?php

use function PHPSTORM_META\type;

session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body style="background: url(default.jpg);background-size: 1550px 900px;background-repeat :no-repeat;">
  <div class="wrapper" style="margin: 20px;">
    <section class="chat-area">
      <header>
        <?php
        $cust_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$cust_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <?php
          $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$cust_id}");
          if ($sql2) {
            if ($row['state'] == 'verified') {
              $hidden = "";
            } elseif ($row['state'] == 'notverified') {
              $hidden = 'visibility: collapse;';
            }
          }
          $record = $cust_id;
          ?>
          <span><a style="color: black;" href="../CLONE/php/other-profile.php?record=<?php echo $record ?>">
              <?php echo $row['fname'] . " " . $row['lname'] ?></a>
          </span>
          <p><?php echo $row['status']; ?></p>
        </div>
        <div class="profile">
          <img src="../CLONE/images.png" alt="right" style="height: 30px; width: 30px;margin-bottom:15px;margin-left:4px; <?php echo $hidden ?>">
        </div>
        <div class="payment">
          <a style="margin-left:20px;" href="payment.php?cust_id=<?php echo base64_encode($cust_id); ?>" class="payment">
            <button style="height: 35px;" class="button">RTC Pay</button></a>
        </div>

      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="hidden" class="incoming_id" name="incoming_id" value="<?php echo $cust_id; ?>">
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>

</html>