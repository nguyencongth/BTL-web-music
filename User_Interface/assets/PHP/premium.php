<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/Bootstrap/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/CSS/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/premium.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../fonts/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <title>Premium</title>
</head>

<body>
    <?php
    session_start();
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
            <h2>Ngoài ra còn các gói dịch vụ</h2>
            <div id="list-products">
                <div class="item">
                    <div class="name">Dịch vụ theo ngày</div>
                    <div class="price">Tính phí 2.000đ/ngày</div>
                    <div class="desc">
                        <ul>
                            <li>
                                Tải không giới hạn bài hát về thiết bị
                            </li>
                            <li>
                                Phát bài hát theo ý mình
                            </li>
                            <li>
                                Không có quảng cáo
                            </li>
                        </ul>
                    </div>
                    <a href="./premium2.php">
                        <button>Bắt đầu</button>
                    </a>
                </div>
                <div class="item">
                    <div class="name">Dịch vụ theo tháng</div>
                    <div class="price">Tính phí 50.000đ/tháng</div>
                    <div class="desc">
                        <ul>
                            <li>
                                Tải không giới hạn bài hát về thiết bị
                            </li>
                            <li>
                                Phát bài hát theo ý mình
                            </li>
                            <li>
                                Nghe nhạc không cần kết nối mạng
                            </li>
                        </ul>
                    </div>
                    <a href="./premium2.php">
                        <button>Bắt đầu</button>
                    </a>
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