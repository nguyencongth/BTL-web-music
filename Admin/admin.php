<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="stylesheet" href="./base.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="./img/logo-admin.png">
    <style>
        li {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        .admin {
            background-color: #009688;
            color: #fff;
            padding: 12px 14px;
            margin-bottom: 8px;
            border-radius: 4px;
        }

        .nav {
            font-size: 16px;
        }

        .sub-nav {
            margin-top: 16px;
            display: none;
        }

        .nav:hover .sub-nav {
            display: block;
        }

        .sub-nav li a {
            display: block;
            padding: 4px 4px;
        }

        .sub-nav li:hover a {
            background-color: #ccc;
        }

        .icon {
            font-size: 18px;
        }

        .header {
            position: fixed;
            right: 0;
            top: 0;
            left: 15%;
        }

        .content {
            margin-top: 100px;
            display: flex;
            justify-content: space-evenly;
        }

        .content .block-content {
            display: flex;
            width: 250px;
            height: 180px;
            border-radius: 12px;
            align-items: center;
            text-align: center;
            justify-content: center;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    ?>
    <div>
        <!-- Sidebar -->
        <div class="sidebar w3-sidebar w3-light-grey w3-bar-block" style="width:15%; top: 0">
            <div class="w3-bar-item" style="height: 150px;">
                <ul style="padding: 0;">
                    <li class="nav">
                        <a href="#" class="admin">
                            <i class="fa-solid fa-user"></i>
                            <?php echo $_SESSION["userName"]; ?>
                        </a>
                        <ul class="sub-nav">
                            <li><a class="js-Account" href="#">Account</a></li>
                            <li><a href="./logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <h3 class="w3-bar-item">
                <i class="fa-solid fa-grid-horizontal"></i>
                Dashboard
            </h3>
            <a href="./user-manager.php" class="w3-bar-item w3-button">
                <i class="icon fa-solid fa-users"></i>
                User manager
            </a>
            <a href="./singer-manager.php" class="w3-bar-item w3-button">
                <i class="icon fa-solid fa-user-music"></i>
                Singer manager
            </a>
            <a href="./music-manager.php" class="w3-bar-item w3-button">
                <i class="icon fa-solid fa-music"></i>
                Music manager
            </a>
        </div>

        <!-- Page Content -->
        <div style="margin-left: 15%;">
            <div class="header w3-container w3-teal">
                <h1>Manager</h1>
            </div>

            <div class="content w3-container" style="height:1000px;">
                <div class="block-content" style="background-color: yellow;">
                    <div>
                        <i class="fa-solid fa-user"></i>
                        <p>User</p>
                        <p>
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
                            $sql = "SELECT count(ID_THONGTIN) as total from account";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_assoc($result);
                            echo $data["total"];
                            ?>
                        </p>
                    </div>
                </div>

                <div class="block-content" style="background-color: #00FFFF;">
                    <div>
                        <i class="icon fa-solid fa-user-music"></i>
                        <p>Singer</p>
                        <p>
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
                            $sql = "SELECT count(ID_Singer) as total from singer";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_assoc($result);
                            echo $data["total"];
                            ?>
                        </p>
                    </div>
                </div>

                <div class="block-content" style="background-color: #FFCCFF;">
                    <div>
                        <i class="icon fa-solid fa-music"></i>
                        <p>Songs</p>
                        <p>
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
                            $sql = "SELECT count(ID_Music) as total from music";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_assoc($result);
                            echo $data["total"];
                            ?>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php
    $ID = $_SESSION["ID"];
    $USER = "";
    $EMAIL = "";
    $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
    $result = mysqli_query($conn, "SELECT * from manager");
    while ($row = mysqli_fetch_assoc($result)) {
        if ($ID == $row["ID"]) {
            $USER = $row["userName"];
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
                    <!-- <div class="modal-login"><button class="js-edit" style="width: 145px; height: 35px;">Chỉnh sửa hồ sơ</button></div> -->
                </div>
            </div>

        </div>
    </div>
    <script>
        const Account_Btns = document.querySelectorAll('.js-Account')

        const modal3 = document.querySelector('.js-modal3')
        

        
        const modalClose3 = document.querySelector('.js-modal-close3')

        const modalContainer3 = document.querySelector('.js-modal-container3')

        function show3() {
            modal3.classList.add('open')
        }

        function hide3() {
            modal3.classList.remove('open')
        }


        for (const Account_Btn of Account_Btns) {
            Account_Btn.addEventListener('click', show3)
        }

        modalClose3.addEventListener('click', hide3)

        modal3.addEventListener('click', hide3)

        modalContainer3.addEventListener('click', function(event) {
            event.stopPropagation()
        })
    </script>

</body>

</html>