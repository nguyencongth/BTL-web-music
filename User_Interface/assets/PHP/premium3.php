<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" conNAMEt="IE=edge">
    <meta name="viewport" conNAMEt="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/Bootstrap/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/CSS/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/premium.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../fonts/themify-icons-font/themify-icons/themify-icons.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <title>Premium</title>
    <style>
        .item {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .input {
            padding: 2px 8px;
            border: none;
            border-radius: 8px;
            width: 196px;
            margin-bottom: 12px;
        }
        select {
            border: none;
            padding: 2px 8px;
            border-radius: 8px;
            width: 196px;
            margin-bottom: 12px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
    $BANKNAME = "";
    $ACCOUNTNUMBER = "";
    $NAME = "";
    $ID = $_SESSION["ID"];
    $a = 0;
    $erorr = array();
    $result = mysqli_query($conn, "SELECT * from pay");
    while ($row = mysqli_fetch_assoc($result)) {
        if ($ID == $row["ID_THONGTIN"]) {
            $BANKNAME = $row["BANKNAME"];
            $ACCOUNTNUMBER = $row["ACCOUNTNUMBER"];
            $NAME = $row["NAME"];
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["BANKNAME"])) {
            $erorr["BANKNAME"] = "vui chọn chọn tên ngân hàng";
        } else {
            $BANKNAME = $_POST["BANKNAME"];
        }
        if (empty($_POST["ACCOUNTNUMBER"])) {
            $erorr["ACCOUNTNUMBER"] = "vui lòng nhập ACCOUNTNUMBER";
        } else {
            $ACCOUNTNUMBER = $_POST["ACCOUNTNUMBER"];
        }
        if (empty($_POST["NAME"])) {
            $erorr["NAME"] = "vui chọn chọn tên ";
        } else {
            $NAME = $_POST["NAME"];
        }
    }
    if (isset($_POST["btn"])) {
        if (empty($erorr["ACCOUNTNUMBER"])) {
            if ($BANKNAME == "BIDV" && !preg_match("/^(125|213|581|601)+([0-9]{6,11})$/", $ACCOUNTNUMBER)) {
                $erorr["eACCOUNTNUMBER"] = "số tài khoản không hợp lệ";
            }
            if ($BANKNAME == "TPBank" && !preg_match("/^(030|02)+([0-9]{6,11})$/", $ACCOUNTNUMBER)) {
                $erorr["eACCOUNTNUMBER"] = "số tài khoản không hợp lệ";
            }
            if ($BANKNAME == "Agribank" && !preg_match("/^(150|340|130|490|290)+([0-9]{6,11})$/", $ACCOUNTNUMBER)) {
                $erorr["eACCOUNTNUMBER"] = "số tài khoản không hợp lệ";
            }
            if ($BANKNAME == "VPBank" && !preg_match("/^(15)+([0-9]{6,11})$/", $ACCOUNTNUMBER)) {
                $erorr["eACCOUNTNUMBER"] = "số tài khoản không hợp lệ";
            }
        }
        if (empty($erorr["NAME"])) {
            if (!preg_match("/^[A-Z\s]+$/", $NAME)) {
                $erorr["eNAME"] = "tất cả chữ cái phải viết hoa không dấu";
            }
        }
        if (empty($erorr)) {
            if (empty($erorr) && !preg_match("/^([0-9]){9,14}+$/", $ACCOUNTNUMBER)) {
                $erorr["eACCOUNTNUMBER"] = "số tài khoản không hợp lệ";
            } else {
                mysqli_query($conn, "UPDATE pay set BANKNAME='$BANKNAME', ACCOUNTNUMBER='$ACCOUNTNUMBER', NAME='$NAME' WHERE ID_THONGTIN ='$ID' ");
            }
        }
    }
    ?>
    <div id="main">
        <div id="header">
            <div class="header_wapper">
                <div class="header_logo">
                    <img src="../img/img_logo.jpg" alt="logo music">
                </div>
                <div class="header_nav">
                    <ul>
                        <li><a href="../../index.php">Home</a></li>
                        <?php
                        if (empty($_SESSION["USER"])) {
                        ?>
                            <li><a href="#" class="js-create_playlist">Playlist</a></li>
                        <?php } ?>

                        <?php
                        if (isset($_SESSION["USER"])) {
                        ?>
                            <li><a href="../PHP/playlist.php">Playlist</a></li>
                        <?php } ?>

                        <li><a class="active" href="../PHP/premium.php">Premium</a></li>
                    </ul>
                </div>
            </div>
            <div class="search">
                <input type="text" name="" id="" class="form_search" placeholder="Search here....." size="50">
                <div><i class="search_icon ti-search"></i></div>
            </div>
            <div class="header_signin_signup">
                <?php
                if (empty($_SESSION["USER"]) && empty($_SESSION["PASSWORD"])) {
                ?>
                    <ul style="display: flex;">
                        <li><a href="./assets/PHP/signin.php">Sign in</a></li>
                        <li><a href="./assets/PHP/signup.php">Sign up</a></li>
                    </ul>
                <?php } ?>
                <?php
                if (isset($_SESSION["USER"]) && isset($_SESSION["PASSWORD"])) {
                ?>
                    <div>
                        <ul id="n">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" style="color:#fff; border: 1px solid white; border-radius: 8px; margin-right: 50px; background: green;">
                                    <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION["USER"]; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="#">Account</a></li>
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="#">Change password</a></li>
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="../PHP/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div id="banner">
            <div class="box-left">
                <h2>
                    Chào mừng đến với dịch vụ premium
                </h2>
                <h3>
                    Dịch vụ giúp trải nghiệm nghe nhạc của bạn trở nên tuyệt vời hơn
                </h3>
                <p>Miễn phí dùng thử 1 tháng</p>
                <button>
                    <a href="">Dùng thử miễn phí</a>
                </button>
            </div>
        </div>
        <div id="wp-products">
            <h2>Thêm phương thức thanh toán</h2>
            <div id="list-products">
                <div class="item" style="height: 300px;">
                    <form method="POST">
                        <div class="BANKNAME">
                            <label for="txtBANKNAME">Tên tài khoản </label> <br>
                            <select name="BANKNAME" id="">
                                <option value="">--chọn--</option>
                                <option <?php if (isset($BANKNAME) && $BANKNAME == "BIDV") {
                                            echo "selected=\"selected\"";
                                        } ?> value="BIDV">BIDV</option>
                                <option <?php if (isset($BANKNAME) && $BANKNAME == "TPBank") {
                                            echo "selected=\"selected\"";
                                        } ?> value="TPBank">TPBank</option>
                                <option <?php if (isset($BANKNAME) && $BANKNAME == "Agribank") {
                                            echo "selected=\"selected\"";
                                        } ?> value="Agribank">Agribank</option>
                                <option <?php if (isset($BANKNAME) && $BANKNAME == "VPBank") {
                                            echo "selected=\"selected\"";
                                        } ?> value="VPBank">VPBank</option>
                            </select> <br>
                            <?php if (isset($erorr["BANKNAME"])) { ?>
                                <span id="thongbao"><?php echo $erorr["BANKNAME"];
                                                    echo '<br>'; ?></span>
                            <?php } ?>
                        </div>
                        <div class="ACCOUNTNUMBER">
                            <label for="txtACCOUNTNUMBER">Số tài khoản <br> <input class="input" id="txtACCOUNTNUMBER" name="ACCOUNTNUMBER" type="text" value="<?php if (isset($ACCOUNTNUMBER)) {
                                                                                                                                                        echo $ACCOUNTNUMBER;
                                                                                                                                                    } ?>"></label> <br>
                            <?php if (isset($erorr["ACCOUNTNUMBER"])) { ?>
                                <span id="thongbao"><?php echo $erorr["ACCOUNTNUMBER"];
                                                    echo '<br>' ?></span>
                            <?php } ?>
                            <?php if (isset($erorr["eACCOUNTNUMBER"])) { ?>
                                <span id="thongbao"><?php echo $erorr["eACCOUNTNUMBER"];
                                                    echo '<br>' ?></span>
                            <?php } ?>
                        </div>
                        <div class="NAME">
                            <label for="txtNAME">Tên người dùng <br><input class="input" id="txtNAME" name="NAME" type="text" value="<?php if (isset($NAME)) {
                                                                                                                            echo $NAME;
                                                                                                                        } ?>"></label> <br>
                            <?php if (isset($erorr["NAME"])) { ?>
                                <span id="thongbao"><?php echo $erorr["NAME"];
                                                    echo '<br>' ?></span>
                            <?php } ?>
                            <?php if (isset($erorr["eNAME"])) { ?>
                                <span id="thongbao"><?php echo $erorr["eNAME"];
                                                    echo '<br>' ?></span>
                            <?php } ?>
                        </div>
                        <button type="submit" name="btn" style="color: white; margin-left: 0;">Cập nhật</button> <br>
                    </form>
                </div>
                <div id="item">
                    <img src="../img/pre.png" alt="">
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="footer_logo">
                <img src="../img/img_logo.jpg" alt="logo music">
            </div>
            <div class="box">
                <h3>About us</h3>
                <ul>
                    <li>
                        <a href="#">Security</a>
                    </li>
                    <li>
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#">Help</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-brands fa-location-circle"></i>
                            250, Đại Kim, Hoàng Mai, Hà Nội
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="footer-item">
                        <a href="#" class="footer-item-link">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="footer-item-link">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="footer-item-link">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        Tel : 038849999
                    </li>
                    <li>
                        Email: Music2022@gmail.com
                    </li>
                    <div class="footer_download-app">
                        <img src="../img/1.jpg" alt="Google play" class="footer_download-app-img">
                        <img src="../img/3.jpg" alt="App store" class="footer_download-app-img">
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <script src="../common/Jquery/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>