<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Sign Up</title>
  <link rel="stylesheet" href="../CSS/signup.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="../CSS/base.css?v=<?php echo time(); ?>">
  <link rel="icon" type="image/x-icon" href="../img/logo.png">
</head>

<body>
  <?php
  if (isset($_POST["btn"])) {
    $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
    $USER = "";
    $PASSWORD = "";
    $EMAIL = "";
    $CONFIRM = "";
    $error = array();
    $a = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["USER"])) {
        $error["USER"] = "vui lòng nhập mật khẩu";
      } else {
        $USER = $_POST["USER"];
      }
      if (empty($_POST["EMAIL"])) {
        $error["EMAIL"] = "vui lòng nhập email";
      } else {
        $EMAIL = $_POST["EMAIL"];
      }
      if (empty($_POST["PASSWORD"])) {
        $error["PASSWORD"] = "vui lòng nhập mật khẩu";
      } else {
        $PASSWORD = $_POST["PASSWORD"];
      }
      if (isset($_POST["CONFIRM"])) {
        $CONFIRM = $_POST["CONFIRM"];
      }
    }
    if ($PASSWORD != $CONFIRM) {
      $error["Check"] = "vui lòng xác nhận lại mật khẩu";
    }
    $result = mysqli_query($conn, "SELECT * from account");
    while ($row = mysqli_fetch_assoc($result)) {
      if ($USER == $row["USER"]) {
        $a++;
      }
    }
    if (empty($error["PASSWORD"]) && !preg_match("/^([A-Z]){1}([\w\.!@#$%^&*()]){5,31}$/", $PASSWORD)) {
      if (!preg_match("/^[A-Z]{1}/", $PASSWORD)) {
        $error["pd"] = "chữ cái đầu phải viết hoa";
        echo '<br>';
      }
      if (!preg_match("/([\w\.!@#$%^&*()]){5,31}$/", $PASSWORD)) {
        $error["pd"] = "phải có từ 6 kí tự đổ lên";
        echo '<br>';
      }
    }
    if (empty($error["EMAIL"]) && !preg_match("/@gmail.com$/", $EMAIL)) {
      $error["e"] = "email thiếu @gmail.com";
    }
    if (empty($error) && $a == 1) {
      $error["CheckDL"] = "Tên Email đã tồn tại";
    } else if (empty($error) && $a == 0) {
      $qr = "INSERT INTO account value('','$USER','$EMAIL','$PASSWORD')";
      mysqli_query($conn, $qr);
      header('location: signin.php');
    }
  }
  ?>
  <div class="container">
    <div class="header">
      <div class="title"><img src="../img/img_signup.jpg" alt=""></div>
      <div class="sub-heading">
        <p>Do you already have account ? <span><a href="signin.php">Log in here</a></span></p>
      </div>
    </div>
    <form action="" method="POST">
      <div class="body">
        <div class="user">
          <label for="txtUser">User <br>
            <input id="txtUser" name="USER" type="text" value="<?php if (isset($USER)) {
                                                                  echo $USER;
                                                                } ?>" placeholder="Enter user"></label>
          <?php if (isset($error["USER"])) { ?>
            <span id="thongbao"><?php echo $error["USER"]; ?></span>
          <?php } ?>
        </div>
        <div class="email">
          <label for="txtEmail">Email<br>
            <input id="txtEmail" name="EMAIL" type="text" value="<?php if (isset($EMAIL)) {
                                                                    echo $EMAIL;
                                                                  } ?>" placeholder="Enter email"></label>
          <?php if (isset($error["EMAIL"])) { ?>
            <span id="thongbao"><?php echo $error["EMAIL"]; ?></span>
          <?php } ?>
          <?php if (isset($error["e"])) { ?>
            <span id="thongbao"><?php echo $error["e"]; ?></span>
          <?php } ?>
        </div>
        <div class="password">
          <label for="txtPassword">Password <br>
            <input id="txtPassword" name="PASSWORD" type="password" value="<?php if (isset($PASSWORD)) {
                                                                              echo $PASSWORD;
                                                                            } ?>" placeholder="Enter password"></label>
          <?php if (isset($error["PASSWORD"])) { ?>
            <span id="thongbao"><?php echo $error["PASSWORD"]; ?></span>
          <?php } ?>
          <?php if (isset($error["pd"])) { ?>
            <span id="thongbao"><?php echo $error["pd"]; ?></span>
          <?php } ?>
        </div>
        <div class="confirm">
          <label for="txtConfirm">Confirm password<br>
            <input id="txtConfirm" name="CONFIRM" type="password" value="<?php if (isset($CONFIRM)) {
                                                                            echo $CONFIRM;
                                                                          } ?>" placeholder="Confirm password"></label>
          <?php if (isset($error["Check"])) { ?>
            <span id="thongbao"><?php echo $error["Check"]; ?></span>
          <?php } ?>
          <?php if (isset($error["CheckDL"])) { ?>
            <span id="thongbao"><?php echo $error["CheckDL"]; ?></span>
          <?php } ?>
        </div>
      </div>
      <div class="button">
        <button name="btn" type="submit">Sign Up</button>
      </div>
    </form>
</body>

</html>