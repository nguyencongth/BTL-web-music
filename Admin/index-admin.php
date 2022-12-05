<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập với quyền admin</title>
    <!-- <link rel="stylesheet" href="../CSS/sigin.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../CSS/base.css?v=<?php echo time();?>"> -->
    <link rel="stylesheet" href="../User_Interface/assets/CSS/sigin.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../User_Interface/assets/CSS/base.css?v=<?php echo time();?>">
    <link rel="icon" type="image/x-icon" href="./img/logo-admin.png">
</head>
<body>
  <?php
    session_start();
    $USER = "";
    $EMAIL = "";
    $PASSWORD = "";
    $error = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["EMAIL"])){
        $error["EMAIL"] = "vui lòng nhập Email";
      }
    else{$EMAIL = $_POST["EMAIL"];}
    if(empty($_POST["PASSWORD"])){
      $error["PASSWORD"] = "vui lòng nhập mật khẩu";
    }
    else{ $PASSWORD = $_POST["PASSWORD"];}
  } 
  $conn = mysqli_connect('localhost','root','','nhom8_web-music');
  $result = mysqli_query($conn,"SELECT * from manager");
  $a = 0;
  $b = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    if($EMAIL == $row["EMAIL"] )
    {
      $a++;
      if($PASSWORD == $row["PASS"] )
      {
        $b++;
        if($a==1 && $b==1)
        {
          $USER = $row["userName"];
        }
      }
    }
  }
  if(isset($_POST["btn1"])){
    if( $a==1 && $b==1){ 
    $_SESSION["userName"] = $USER;
    $_SESSION["EMAIL"] = $EMAIL;
    $_SESSION["PASSWORD"] = $PASSWORD;
    header('location: admin.php');
    }
    else
    {
      if(empty($error) && $a==0){
      $error["eUSER"] = "thông tin tài khoản sai";
      }
      if(empty($error) && $b==0){
      $error["ePASSWORD"] = "thông tin mật khấu sai";
      }
    }
}
  ?>
    <div class="container">
            <div class="header">
              <div class="title"><img src="../User_Interface/assets/img/img_signin.jpg" alt=""></div>
                <div class="sub-heading">
                    <p>Đăng nhập với quyền admin</p>
                </div>
              </div>
              
              <form action="" method="POST">
                <div class="body">
                    <div class="user">
                        <label for="txtUser">Email <br>
                        <input id="txtUser" name="EMAIL" type="email" value = "<?php if(isset($EMAIL)){echo $EMAIL;}?>" placeholder="Enter your email"></label>
                    <?php if(isset($error["EMAIL"])){?>
                        <span id="thongbao" > <?php echo $error["EMAIL"];?></span>
                    <?php }?>
                    <?php if(isset($error["eUSER"])){?>
                        <span id="thongbao" > <?php echo $error["eUSER"];?></span>
                    <?php }?>
                    </div>
                    <div class="password">
                         <label for="txtPassword">Password <br>
                         <input id="txtPassword" name="PASSWORD" type="password" value = "<?php if(isset($PASSWORD)){echo $PASSWORD;}?>" placeholder="Enter password"></label>
                         <!-- <button id="hien" onclick="click()">bấm</button> -->
                   
                    <?php if(isset($error["PASSWORD"])){?>
                        <span id="thongbao" ><?php echo $error["PASSWORD"];?></span>
                        <?php } ?>
                        <?php if(isset($error["ePASSWORD"])){?>
                        <span id="thongbao"><?php echo $error["ePASSWORD"];?></span>
                        <?php } ?>
                    </div>
                    <div class="forgot-password"> 
                      <span><a href="forgotpassword.php">Quên mật khẩu?</a></span>
                    </div>

                  </div>
                  <div class="button">
                    <button type="submit" name="btn1">Sign In</button>
                  </div>
              </form>
                  
</body>
<!-- <script lang="javascript" type="text/javascript" src="../JS/signin.js"></script> -->

</html>