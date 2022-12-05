<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot password</title>
    <link rel="stylesheet" href="../CSS/sigin.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../CSS/base.css?v=<?php echo time();?>">
</head>
<body>
    <?php
        if(isset($_POST["btn"])){
            $conn = mysqli_connect('localhost','root','','nhom8_web-music');
            $PASSWORD = "";
            $EMAIL = "";
            $CONFIRM = "";
            $error = array();
            $a=0;
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if(empty($_POST["EMAIL"])){$error["EMAIL"] = "vui lòng nhập email";}
                else{$EMAIL = $_POST["EMAIL"];}
                if(empty($_POST["PASSWORD"])){$error["PASSWORD"] = "vui lòng nhập mật khẩu";}
                else{$PASSWORD = $_POST["PASSWORD"];}
                if(isset($_POST["CONFIRM"])){$CONFIRM = $_POST["CONFIRM"];}
            }
            if($PASSWORD != $CONFIRM){ $error["Check"] = "vui lòng xác nhận lại mật khẩu";}
            $result = mysqli_query($conn,"SELECT * from account");
            while($row = mysqli_fetch_assoc($result))
            {
                if($EMAIL == $row["EMAIL"]){
                    $a++;
                }
            }
            if(empty($error["PASSWORD"]) && !preg_match("/^([A-Z]){1}([\w\.!@#$%^&*()]){5,31}$/",$PASSWORD)) 
            {
                if(!preg_match("/^[A-Z]{1}/",$PASSWORD))
                {
                    $error["pd"] = "chữ cái đầu phải viết hoa"; echo '<br>';
                }
                if(!preg_match("/([\w\.!@#$%^&*()]){5,31}$/",$PASSWORD))
                {
                    $error["pd"] = "phải có từ 6 kí tự đổ lên"; echo '<br>';
                }
            }
            if(empty($error["EMAIL"]) && !preg_match("/@gmail.com$/",$EMAIL))
            {
                $error["e"] = "email thiếu @gmail.com";
            }
            if(empty($error) && $a==0)
            {
                $error["CheckDL"] = "Tên Email đã tồn tại";
            }
            else if (empty($error) && $a==1){
                $qr = "UPDATE account set PASS = '$PASSWORD' where EMAIL = '$EMAIL'";
                mysqli_query($conn,$qr);
                header('location: signin.php');
            }
        }
    ?>
    <div class="container">
        <div class="header">
            <div class="sub-heading">
                <p style="font-size: 30px; padding-bottom: 10px; color: #086302;">Quên Mật Khẩu</p>
                <p>Do not have an account? <span><a href="signup.php">Sign up here</a></span></p>
            </div>
        </div>
        <form action="" method="POST">
            <div class="body">
                <div class="user">
                    <label for="txtEmail">Nhập Email của bạn<br>
                        <input id="txtEmail" name="EMAIL" type="text" value="<?php if(isset($EMAIL)){ echo $EMAIL;} ?>" placeholder="Enter your email">
                    </label>
                    <?php if(isset($error["EMAIL"])) { ?>
                        <span id ="thongbao"><?php echo $error["EMAIL"];?></span>
                    <?php }?>
                    <?php if(isset($error["e"])) { ?>
                        <span id ="thongbao"><?php echo $error["e"];?></span>
                    <?php }?>
                    <?php if(isset($error["CheckL"])) { ?>
                        <span id ="thongbao"><?php echo $error["Check"];?></span>
                    <?php }?>
                </div>

                <div class="password">
                    <label for="txtPassword">Nhập mật khẩu mới<br>
                        <input id="txtPassword" name="PASSWORD" type="password" placeholder="Enter new password">
                    </label>
                    <?php if(isset($error["PASSWORD"])) { ?>
                        <span id ="thongbao"><?php echo $error["PASSWORD"];?></span>
                    <?php }?>
                    <?php if(isset($error["pd"])) { ?>
                        <span id ="thongbao"><?php echo $error["pd"];?></span>
                    <?php }?>
                </div>
                
                <div class="confirm-password">
                    <label for="txtConfirm">Xác nhận lại mật khẩu mới<br>
                        <input id="txtConfirm" name="CONFIRM" type="password" placeholder="Confirm new password">
                    </label>
                    <?php if(isset($error["Check"])) { ?>
                        <span id ="thongbao"><?php echo $error["Check"];?></span>
                    <?php }?>
                </div>
            </div>
            <div class="button">
            <button type="submit" name="btn">OK ></button>
            </div>
        </form>
    </div>
</body>
</html>