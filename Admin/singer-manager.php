<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singer manager</title>
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
        }

        .table {
            margin: 0 auto;
            width: 550px;
        }

        .table th,
        .table tr,
        .table td {
            border: 1px solid #fff;
            text-align: center;
        }

        thead {
            background-color: #009688;
            color: #fff;
        }

        .body-table {
            background-color: #f1f1f1;
        }

        h2 {
            text-align: center;
            color: #009688;
            font-size: 36px;
        }

        .active {
            background-color: #ccc;
        }

        .delete {
            background-color: #FF3300;
            color: #fff;
            padding: 6px 6px;
            border-radius: 8px;
        }
        .delete:hover {
            background-color: #CC0000;
        }

        .btn-add {
            border: none;
            background-color: #00FF00;
            border-radius: 8px;
            height: 32px;
            width: 74px;
            margin: 0 830px;
            margin-bottom: 12px;
        }
        .btn-add:hover {
            background-color: #00EE00;
        }

        .add {
            padding: 6px 12px;
            color: #fff;
        }
        .tk {
            margin: 0 auto;
            padding: 6px 0;
        }
        #txt_search {
            outline: none;
            border: 2px solid #009688;
            border-radius: 8px;
            padding: 4px 8px;
        }
        .btnFind,
        .btnALL{
            border-radius: 8px;
            padding: 4px 8px;
            border: 2px solid #009688;
            background-color: #009688;
            color: #fff;
        }
        .btnFind:hover,
        .btnALL:hover{
            background-color: #007687;
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
            <a href="./singer-manager.php" class="active w3-bar-item w3-button">
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
                <h1>Singer manager</h1>
            </div>

            <div class="content w3-container" style="height:1000px;">
                <div style="display: block; background-color:#f1f1f1;">
                    <a href="./admin.php" style="padding: 4px 4px; color: #3366CC;">Home</a>
                    <i class="fa-regular fa-angle-right"></i>
                </div>
                <div>
                    <h2><strong>List of singer</strong></h2>
                    <table class="tk">
                        <form action="" method="get">
                            <tr>
                                <td><input type="text" name="search" id="txt_search" placeholder="Enter the keyword you want to search" size="43" value=""></td>
                                <td><input type="submit" class="btnFind" name="btnFind" value="Search"></td>
                                <td><input type="submit" class="btnALL" name="btnALL" value="All" onclick="window.location.href='singer-manager.php'"></td>
                            </tr>
                        </form>
                    </table>
                    <button class="btn-add"><a class="add" href="./add-singer.php">Add</a></button>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "", "nhom8_web-music");
                    if(isset($_GET["search"]) && !empty($_GET["search"])){
                        $key = $_GET["search"];
                        $sql = "SELECT *
                        FROM singer 
                        where Name_Singer like '%$key%' ";
                    }
                    else {
                        $sql = "SELECT * From singer";
                    }
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table" cellspacing = "0" cellpadding = "16"> <thead>';
                        echo '<th> ID </th>';
                        echo '<th> Singer Name </th>';
                        echo '<th> Option </th>';
                        echo '</thead> <tbody class="body-table">';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row["ID_Singer"] . '</td>';
                            echo '<td>' . $row["Name_Singer"] . '</td>';
                            echo '<td>' . "<a class='delete' href = 'delete-singer.php?ID_Singer=" . $row["ID_Singer"] . "' Onclick = 'return confirm(\"Bạn có muốn xóa không?\");' >Delete</a>" . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody> </table>';
                    }
                    mysqli_close($conn)
                    ?>
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