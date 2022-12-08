<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/common/Bootstrap/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/CSS/homepage.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/CSS/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/fonts/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="icon" type="image/x-icon" href="./assets/img/logo.png">
    <title>Home</title>
</head>

<body>
    <?php
    session_start();
    $a = 0;
    $ID = $_SESSION["ID"];
    $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
    $result = mysqli_query($conn, "SELECT * from pay");
    while ($row = mysqli_fetch_assoc($result)) {
        if ($ID == $row["ID_THONGTIN"]) {
            $a++;
        }
    }
    ?>
    <div id="main">
        <div id="header">
            <div class="header_wapper">
                <div class="header_logo">
                    <img src="./assets/img/img_logo.jpg" alt="logo music">
                </div>
                <div class="header_nav">
                    <ul>
                        <li><a class="active" href="./index.php">Home</a></li>
                        <?php
                        if (empty($_SESSION["USER"])) {
                        ?>
                            <li><a href="#" class="js-create_playlist">Playlist</a></li>
                        <?php } ?>

                        <?php
                        if (isset($_SESSION["USER"])) {
                        ?>  <?php if ($a == 1) { ?>
                            <li><a href="../User_Interface/assets/PHP/playlist.php">Playlist</a></li>
                            <?php } else { ?>
                                <li><a href="#" class="js-playlist_pre">Playlist</a></li>
                            <?php } ?>
                        <?php } ?>

                        <?php
                        if (empty($_SESSION["USER"])) {
                        ?>
                            <li><a href="#" class="js-premium">Premium</a></li>
                        <?php } ?>

                        <?php if (isset($_SESSION["USER"])) { ?>
                            <?php if ($a == 1) { ?>
                                <li><a href="./assets/PHP/premium3.php">Premium</a></li>
                            <?php } else { ?>
                                <li><a href="./assets/PHP/premium.php">Premium</a></li>
                            <?php } ?>
                        <?php } ?>

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
                                <a href="" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" style="color:#fff; border: 1px solid white; border-radius: 8px; margin-right: 50px; background: green;">
                                    <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION["USER"]; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="js-Account dropdown-item" style="color: #000; font-size: 16px;" href="#">Account</a></li>
                                    <li><a class="js-changePassWord dropdown-item" style="color: #000; font-size: 16px;" href="#">Change password</a></li>
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="./assets/PHP/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div id="section">
            <div class="singer-list">
                <a href="./assets/PHP/MusicList/mono.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/mono.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Mono</h3>
                        </div>
                    </div>
                </a>

                <a href="./assets/PHP/MusicList/sontung.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/sontung.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Sơn Tùng</h3>
                        </div>
                    </div>
                </a>

                <a href="./assets/PHP/MusicList/quanap.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/quan_ap.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Quân AP</h3>
                        </div>
                    </div>
                </a>

                <a href="./assets/PHP/MusicList/bichphuong.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/bichphuong.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Bích Phương</h3>
                        </div>
                    </div>
                </a>

                <a href="./assets/PHP/MusicList/hoaminzy.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/hoaminzy.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Hòa Minzy</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="singer-list">
                <a href="./assets/PHP/MusicList/mono.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/mono.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Mono</h3>
                        </div>
                    </div>
                </a>

                <a href="./assets/PHP/MusicList/sontung.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/sontung.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Sơn Tùng</h3>
                        </div>
                    </div>
                </a>

                <a href="./assets/PHP/MusicList/quanap.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/quan_ap.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Quân AP</h3>
                        </div>
                    </div>
                </a>

                <a href="./assets/PHP/MusicList/bichphuong.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/bichphuong.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Bích Phương</h3>
                        </div>
                    </div>
                </a>

                <a href="./assets/PHP/MusicList/hoaminzy.php">
                    <div class="singer-item">
                        <div class="singer__img">
                            <img src="./assets/img/hoaminzy.jpg" alt="" class="singer-img">
                            <span class="play"><i class="fa-solid fa-circle-play"></i></span>
                        </div>
                        <div class="singer-content">
                            <h3>Hòa Minzy</h3>
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>

    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-body">
                <div class="modal-header-text">
                    <p>Tạo danh sách phát</p>
                </div>
                <p class="modal-body-content">Đăng nhập để tạo playlist</p>
                <div class="modal-end">
                    <div class="modal-close js-modal-close"><button>Để sau</button></div>
                    <div class="modal-login"><button><a href="./assets/PHP/signin.php">Đăng nhập</a></button></div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal js-modal5">
        <div class="modal-container js-modal-container5">
            <div class="modal-body">
                <div class="modal-header-text">
                    <p>Tạo danh sách phát</p>
                </div>
                <p class="modal-body-content">Đăng ký premium để tạo playlist</p>
                <div class="modal-end">
                    <div class="modal-close js-modal-close5"><button>Để sau</button></div>
                    <div class="modal-login"><button><a href="./assets/PHP/premium.php">Đăng ký</a></button></div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal js-modal1">
        <div class="modal-container js-modal-container1">
            <div class="modal-body">
                <div class="modal-header-text">
                    <p>Đăng ký premium</p>
                </div>
                <p class="modal-body-content">Đăng nhập để đăng ký premium</p>
                <div class="modal-end">
                    <div class="modal-close js-modal-close1"><button>Để sau</button></div>
                    <div class="modal-login"><button><a href="./assets/PHP/signin.php">Đăng nhập</a></button></div>
                </div>
            </div>

        </div>
    </div>

    <?php
    if (isset($_POST["btn"])) {
        $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
        $OLD_PASSWORD = "";
        $NEW_PASSWORD = "";
        $CONFIRM = "";
        $error = array();
        $a = 0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["OLD_PASSWORD"])) {
                $error["OLD_PASSWORD"] = "vui lòng nhập mật khẩu cũ";
            } else {
                $OLD_PASSWORD = $_POST["OLD_PASSWORD"];
            }

            if (empty($_POST["NEW_PASSWORD"])) {
                $error["NEW_PASSWORD"] = "vui lòng nhập mật khẩu mới";
            } else {
                $NEW_PASSWORD = $_POST["NEW_PASSWORD"];
            }

            if (isset($_POST["CONFIRM"])) {
                $CONFIRM = $_POST["CONFIRM"];
            }
        }
        if ($NEW_PASSWORD != $CONFIRM) {
            $error["Check"] = "vui lòng xác nhận lại mật khẩu";
        }
        $result = mysqli_query($conn, "SELECT * from account");
        while ($row = mysqli_fetch_assoc($result)) {
            if ($OLD_PASSWORD == $row["PASS"]) {
                $a++;
            }
        }
        if (empty($error["NEW_PASSWORD"]) && !preg_match("/^([A-Z]){1}([\w\.!@#$%^&*()]){5,31}$/", $NEW_PASSWORD)) {
            if (!preg_match("/^[A-Z]{1}/", $NEW_PASSWORD)) {
                $error["pd"] = "Chữ cái đầu phải viết hoa";
                echo '<br>';
            }
            if (!preg_match("/([\w\.!@#$%^&*()]){5,31}$/", $NEW_PASSWORD)) {
                $error["pd"] = "Mật khẩu phải có từ 6 kí tự trở lên";
                echo '<br>';
            }
        }
        if (empty($error["OLD_PASSWORD"]) && !preg_match("/^([A-Z]){1}([\w\.!@#$%^&*()]){5,31}$/", $OLD_PASSWORD)) {
            $error["e"] = "Vui lòng nhập mật khẩu cũ";
        }
        if (empty($error) && $a == 1) {
            $qr = "UPDATE account set PASS = '$NEW_PASSWORD' where PASS = '$OLD_PASSWORD'";
            mysqli_query($conn, $qr);
        }
    }
    ?>
    <div class="modal js-modal2">
        <div class="modal-container js-modal-container2">
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="modal-header-text">
                        <p>Đổi mật khẩu</p>
                    </div>
                    <label for="old-passWord" class="modal-label">Old password</label>
                    <input class="modal-input" type="text" name="OLD_PASSWORD" id="old-passWord" value="<?php if (isset($OLD_PASSWORD)) {
                                                                                                            echo $OLD_PASSWORD;
                                                                                                        } ?>" placeholder="Enter old password">
                    <?php if (isset($error["OLD_PASSWORD"])) { ?>
                        <span id="thongbao"><?php echo $error["OLD_PASSWORD"]; ?></span>
                    <?php } ?>
                    <?php if (isset($error["e"])) { ?>
                        <span id="thongbao"><?php echo $error["e"]; ?></span>
                    <?php } ?>
                    <?php if (isset($error["CheckL"])) { ?>
                        <span id="thongbao"><?php echo $error["Check"]; ?></span>
                    <?php } ?>

                    <label for="new-passWord" class="modal-label">New password</label>
                    <input class="modal-input" type="text" name="NEW_PASSWORD" id="new-passWord" placeholder="Enter new password">
                    <?php if (isset($error["NEW_PASSWORD"])) { ?>
                        <span id="thongbao"><?php echo $error["NEW_PASSWORD"]; ?></span>
                    <?php } ?>
                    <?php if (isset($error["pd"])) { ?>
                        <span id="thongbao"><?php echo $error["pd"]; ?></span>
                    <?php } ?>

                    <label for="confirm-new-passWord" class="modal-label">Confirm new password</label>
                    <input class="modal-input" type="text" name="CONFIRM" id="confirm-new-passWord" placeholder="Confirm new password">
                    <?php if (isset($error["Check"])) { ?>
                        <span id="thongbao"><?php echo $error["Check"]; ?></span>
                    <?php } ?>

                    <div class="modal-end" style="margin-top: 15px;">
                        <div class="modal-close js-modal-close2"><button>Để sau</button></div>
                        <div class="modal-login"><a href="./index.php"><button type="submit" style="width: 160px; height:35px;" name="btn">Đặt mật khẩu mới</button></a></div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <?php
    $ID = $_SESSION["ID"];
    $USER = "";
    $EMAIL = "";
    $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
    $result = mysqli_query($conn, "SELECT * from account");
    while ($row = mysqli_fetch_assoc($result)) {
        if ($ID == $row["ID_THONGTIN"]) {
            $USER = $row["USER"];
            $EMAIL = $row["EMAIL"];
        }
    }
    ?>

    <div class="modal js-modal3">
        <div class="modal-container js-modal-container3">
            <div class="modal-body">
                <div class="modal-header-text">
                    <p>Tổng quan về tài khoản</p>
                </div>
                <p class="modal-body-content">Hồ sơ</p>
                <table>
                    <tr>
                        <td style="padding: 16px;">Tên tài khoản: </td>
                        <td>
                            <?php if (isset($USER)) {
                                echo $USER;
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 16px;">Email:</td>
                        <td>
                            <?php if (isset($EMAIL)) {
                                echo $EMAIL;
                            } ?>
                        </td>
                    </tr>
                </table>
                <div class="modal-end">
                    <div class="modal-close js-modal-close3"><button>Thoát</button></div>
                    <div class="modal-login"><button class="js-edit" style="width: 145px; height: 35px;">Chỉnh sửa hồ sơ</button></div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal js-modal4">
        <div class="modal-container js-modal-container4">
            <div class="modal-body">
                <div class="modal-header-text">
                    <p>Chỉnh sửa hồ sơ</p>
                </div>
                <form action="" method="POST">
                    <label for="user" class="modal-label">USER</label>
                    <input class="modal-input" type="text" name="txtUSER" id="user" value="<?php if (isset($USER)) {
                                                                                                echo $USER;
                                                                                            } ?>">

                    <label for="email" class="modal-label">EMAIL</label>
                    <input class="modal-input" type="text" name="txtEMAIL" id="email" value="<?php if (isset($EMAIL)) {
                                                                                                    echo $EMAIL;
                                                                                                } ?>">
                    <div class="modal-end" style="margin-top: 16px;">
                        <div class="modal-close js-modal-close4"><button>Để sau</button></div>
                        <div class="modal-login"><button type="submit" name="btn-update" style="width: 145px; height: 35px;">Lưu hồ sơ</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btn-update'])) {
        $USER = $_POST['txtUSER'];
        $EMAIL = $_POST['txtEMAIL'];
        $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
        $sql = "UPDATE account set USER = '$USER', EMAIL = '$EMAIL' where ID_THONGTIN = '$ID'";
        mysqli_query($conn, $sql);
        $id1 = $_SESSION['ID'];
        $sql1 = "SELECT * from account where ID_THONGTIN = '$id1'";
        $sql2 =  mysqli_query($conn, $sql1);
        while ($r = mysqli_fetch_array($sql2)) {
            $_SESSION["USER"] = $r["USER"];
        }
        header('location: http://localhost:8080/PHP/Nhom8_Web_Music_demo/User_interface/index.php');
    }
    ?>


    <script>
        const create_playlist_Btns = document.querySelectorAll('.js-create_playlist')
        const premium_Btns = document.querySelectorAll('.js-premium')
        const changePassWord_Btns = document.querySelectorAll('.js-changePassWord')
        const Account_Btns = document.querySelectorAll('.js-Account')
        const Edit_Btns = document.querySelectorAll('.js-edit')
        const playlist_pre_Btns = document.querySelectorAll('.js-playlist_pre')

        const modal = document.querySelector('.js-modal')
        const modal1 = document.querySelector('.js-modal1')
        const modal2 = document.querySelector('.js-modal2')
        const modal3 = document.querySelector('.js-modal3')
        const modal4 = document.querySelector('.js-modal4')
        const modal5 = document.querySelector('.js-modal5')

        const modalClose = document.querySelector('.js-modal-close')
        const modalClose1 = document.querySelector('.js-modal-close1')
        const modalClose2 = document.querySelector('.js-modal-close2')
        const modalClose3 = document.querySelector('.js-modal-close3')
        const modalClose4 = document.querySelector('.js-modal-close4')
        const modalClose5 = document.querySelector('.js-modal-close5')

        const modalContainer = document.querySelector('.js-modal-container')
        const modalContainer1 = document.querySelector('.js-modal-container1')
        const modalContainer2 = document.querySelector('.js-modal-container2')
        const modalContainer3 = document.querySelector('.js-modal-container3')
        const modalContainer4 = document.querySelector('.js-modal-container4')
        const modalContainer5 = document.querySelector('.js-modal-container5')

        function show() {
            modal.classList.add('open')
        }

        function show1() {
            modal1.classList.add('open')
        }

        function show2() {
            modal2.classList.add('open')
        }

        function show3() {
            modal3.classList.add('open')
        }

        function show4() {
            modal4.classList.add('open')
        }
        function show5() {
            modal5.classList.add('open')
        }


        function hide() {
            modal.classList.remove('open')
        }

        function hide1() {
            modal1.classList.remove('open')
        }

        function hide2() {
            modal2.classList.remove('open')
        }

        function hide3() {
            modal3.classList.remove('open')
        }

        function hide4() {
            modal4.classList.remove('open')
        }
        function hide5() {
            modal5.classList.remove('open')
        }


        for (const create_playlist_Btn of create_playlist_Btns) {
            create_playlist_Btn.addEventListener('click', show)
        }
        for (const premium_Btn of premium_Btns) {
            premium_Btn.addEventListener('click', show1)
        }
        for (const changePassWord_Btn of changePassWord_Btns) {
            changePassWord_Btn.addEventListener('click', show2)
        }
        for (const Account_Btn of Account_Btns) {
            Account_Btn.addEventListener('click', show3)
        }
        for (const Edit_Btn of Edit_Btns) {
            Edit_Btn.addEventListener('click', show4)
        }
        for (const playlist_pre_Btn  of playlist_pre_Btns) {
            playlist_pre_Btn.addEventListener('click', show5)
        }

        modalClose.addEventListener('click', hide)
        modalClose1.addEventListener('click', hide1)
        modalClose2.addEventListener('click', hide2)
        modalClose3.addEventListener('click', hide3)
        modalClose4.addEventListener('click', hide4)
        modalClose5.addEventListener('click', hide5)

        modal.addEventListener('click', hide)
        modal1.addEventListener('click', hide1)
        modal2.addEventListener('click', hide2)
        modal3.addEventListener('click', hide3)
        modal4.addEventListener('click', hide4)
        modal5.addEventListener('click', hide5)

        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })
        modalContainer1.addEventListener('click', function(event) {
            event.stopPropagation()
        })
        modalContainer2.addEventListener('click', function(event) {
            event.stopPropagation()
        })
        modalContainer3.addEventListener('click', function(event) {
            event.stopPropagation()
        })
        modalContainer4.addEventListener('click', function(event) {
            event.stopPropagation()
        })
        modalContainer5.addEventListener('click', function(event) {
            event.stopPropagation()
        })
    </script>

    <script src="../common/Jquery/jquery-3.6.1.min.js"></script>
    <script src="../common/slick-1.8.1/slick-1.8.1/slick/slick.js"></script>
    <script src="../JS/homepage.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>

</html>