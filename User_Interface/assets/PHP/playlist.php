<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/Bootstrap/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fonts/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/playlist.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../assets/CSS/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./assets/CSS/homepage.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <title>playlist</title>
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
                            <li><a class="active" href="../PHP/playlist.php">Playlist</a></li>
                        <?php } ?>

                        <?php
                        if (empty($_SESSION["USER"])) {
                        ?>
                            <li><a href="#" class="js-premium">Premium</a></li>
                        <?php } ?>

                        <?php if (isset($_SESSION["USER"])) { ?>
                            <?php if ($a == 1) { ?>
                                <li><a href="../PHP/premium3.php">Premium</a></li>
                            <?php } else { ?>
                                <li><a href="../PHP/premium.php">Premium</a></li>
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
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" style="color:#fff; border: 1px solid white; border-radius: 8px; margin-right: 50px; background: green;">
                                    <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION["USER"]; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="js-Account dropdown-item" style="color: #000; font-size: 16px;" href="#">Account</a></li>
                                    <li><a class="js-changePassWord dropdown-item" style="color: #000; font-size: 16px;" href="#">Change password</a></li>
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="../PHP/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="container">
            <div id="banner">
                <div class="box-left">
                    <button class="box-left-item box-left-item-music">
                        <i class="fa-thin fa-music"></i>
                    </button>
                    <label for="choose-file" class="box-left-item box-left-item-pen">
                        <i class="fa-thin fa-pen"></i>
                    </label>
                </div>
                <div class="box-right">
                    <h2 class="box-right-title">
                        PLAYLIST
                    </h2>
                    <br>
                    <span>
                        <button class="bt2 js-create_playlist">
                            <span>
                                <h1>Danh sách phát của tôi</h1>
                            </span>
                        </button>
                    </span>
                </div>
            </div>
        </div>

        <div id="play_music">
            <div class="rangeBar">
                <!-- <div class="currTime">00:00</div> -->
                <input type="range" step="1" class="seekbar" value="0">
                <!-- <div class="durrTime">00:00</div> -->
            </div>
            <audio id="songFile"></audio>
            <div class="playerBar_item">
                <div class="playerBar_item-info">
                    <div class="playerBar_item-img"><img class="playerBar_item-img--thumb" alt=""></div>
                    <div class="playerBar_item-name">
                        <div class="playerBar_item-name--nameSong"></div>
                        <div class="playerBar_item-name--nameArtist"></div>
                    </div>
                </div>
                <div class="playerBar_item-action">
                    <div class="random"><i class="fa-light fa-shuffle"></i></div>
                    <div class="back playerBar_item-action--size"><i class="fa-solid fa-backward-fast"></i></div>
                    <div id="pause" class="pause playerBar_item-action--pausesize"><i class="fa-solid fa-circle-play"></i></div>
                    <div class="next playerBar_item-action--size"><i class="fa-solid fa-forward-fast"></i></div>
                    <div class="replay"><i class="fa-light fa-arrows-repeat"></i></div>
                </div>
                <div class="playerBar_item-vol">
                    <div class="playerBar_item-vol--icon"><i class="fa-solid fa-volume-high"></i></div>
                    <div class="playerBar_item-vol--bar"><input type="range" name="" id="volRange"></div>
                </div>
            </div>
        </div>


        <div class="modal js-modal">
            <div class="modal-container js-modal-container">
                <div class="modal-header1">

                    <div class="modal-header-text">
                        Tạo playlist
                    </div>

                    <div class="modal-close js-modal-close">
                        <i class="ti-close icon-close"></i>
                    </div>
                </div>
                <?php
                $PLAYLIST = "";
                $DESCRIPTIONS = "";
                $ID_THONGTIN = "";
                $error = array();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["PLAYLIST"])) {
                        $erorr["PLAYLIST"] = "vui chọn nhập tên playlist";
                    } else {
                        $PLAYLIST = $_POST["PLAYLIST"];
                    }
                    if (isset($_POST["DESCRIPTIONS"])) {
                        $DESCRIPTIONS = $_POST["DESCRIPTIONS"];
                    }
                }
                if (isset($_POST["btn"])) {
                    $ID_THONGTIN = $_SESSION["ID"];
                    mysqli_query($conn, "INSERT INTO playlist value ('','$PLAYLIST','$DESCRIPTIONS','$ID_THONGTIN')");
                }
                ?>


                <form method="POST">
                    <div class="modal-body">
                        <input accept="image/.jpg, image/.jpeg, image/.png" type="file" name="" id="choose-file" class="choose-file">
                        <div class="box-left">
                            <a class="box-left-item box-left-item-music">
                                <i class="fa-thin fa-music"></i>
                            </a>
                            <label class="box-left-item box-left-item-pen" for="choose-file">
                                <i class="fa-thin fa-pen"></i>
                            </label>
                        </div>

                        <div class="input-name-playlist"><input type="text" name="PLAYLIST" id="" placeholder="Add a name" class="enter-input"></div>
                        <div class="desc-playlist"><textarea name="DESCRIPTIONS" id="" cols="30" rows="10" placeholder="Add an optional description" class="enter-text"></textarea></div>
                        <div class="btn"><button type="submit" name="btn" class="btn-save">Lưu</button></div>

                    </div>
                </form>

            </div>
        </div>
        <div id="wp-products">
            <div class="a">

            </div>
            <h2>Danh sách playlist của bạn</h2>


            <table>
                <thead>
                    <th>PlayList Name</th>
                    <th>Description</th>
                    <th colspan="4">Option</th>
                </thead>
                <?php
                $ID_THONGTIN = $_SESSION["ID"];
                $re = mysqli_query($conn, "SELECT * FROM playlist where ID_THONGTIN = '$ID_THONGTIN' ");
                if (mysqli_num_rows($re) > 0) {
                    while ($row = mysqli_fetch_assoc($re)) { ?>
                        <tr>
                            <form action="updateplaylist.php" method="get">
                                <td><input type="text" name="PLAY" class="tex" value="<?php echo $row["PLAYLIST"]; ?>"></td>
                                <td><input type="text" name="DES" class="tex" value="<?php echo $row["DESCRIPTIONS"]; ?>"></td>
                                <input type="hidden" name="ID1" value="<?php echo $row["ID_PLAYLIST"]; ?>">
                                <td><button type="submit" class="up" name="up">Update</button></td>
                            </form>
                            <td> <a href="./playlistm.php?MA=<?php echo $row["ID_PLAYLIST"]; ?>"><button class="add">Add</button></a></td>
                            <td> <a href="./xoaplaylist.php?MA=<?php echo $row["ID_PLAYLIST"]; ?>"><button class="del">Delete</button></a></td>
                        </tr>
                <?php }
                } ?>
            </table>

        </div>

        <!-- dùng để sửa thông tin playlist -->


        <script>
            const create_playlist_Btns = document.querySelectorAll('.js-create_playlist')
            const modal = document.querySelector('.js-modal')
            const modalClose = document.querySelector('.js-modal-close')
            const modalContainer = document.querySelector('.js-modal-container')

            function show() {
                modal.classList.add('open')
            }

            function hide() {
                modal.classList.remove('open')
            }

            for (const create_playlist_Btn of create_playlist_Btns) {
                create_playlist_Btn.addEventListener('click', show)
            }

            modalClose.addEventListener('click', hide)

            modal.addEventListener('click', hide)

            modalContainer.addEventListener('click', function(event) {
                event.stopPropagation()
            })
        </script>

        <!-- -->



        <!-- -->
        <script src="../common/Jquery/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>