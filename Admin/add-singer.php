<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Singer</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
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

        table {
            margin: 0 auto;
        }

        th,
        tr,
        td {
            border: 1px solid #fff;
            text-align: center;
        }

        thead {
            background-color: #009688;
            color: #fff;
        }

        tbody {
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

        .file {
            padding-left: 98px;
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
                            <li><a href="#">Account</a></li>
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
                <h1>Add Music</h1>
            </div>

            <div class="content w3-container" style="height:1000px;">
                <div style="display: flex; background-color:#f1f1f1;">
                    <div>
                        <a href="./admin.php" style="padding: 4px 4px; color: #3366CC;">Home</a>
                        <i class="fa-regular fa-angle-right"></i>
                    </div>
                    <div>
                        <a href="./singer-manager.php" style="padding: 4px 4px; color: #3366CC;">Singer manager</a>
                        <i class="fa-regular fa-angle-right"></i>
                    </div>
                </div>
                <div>
                    <form action="" method="POST">
                        <table>
                            <h2><strong>Add Singer</strong></h2>
                            <tr>
                                <td>Id Singer:</td>
                                <td><input type="text" name="txtID" id="txtID" size="22"></td>
                            </tr>
                            <tr>
                                <td>Singer Name:</td>
                                <td><input type="text" name="txtSinger" id="txtSinger" size="22"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">
                                    <input type="submit" name="btnGhiDL" value="Save">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] = "POST " and ISSET($_POST['btnGhiDL'])) {
            $ID_Music = $_POST['txtID'];
            $Name_Singer = $_POST['txtSinger'];

            $conn = mysqli_connect("localhost","root","","nhom8_web-music");

            $sql = "INSERT INTO singer VALUES('$ID_Music', '$Name_Singer')";
            $result = mysqli_query($conn, $sql);
            if($result == true){
                echo "<script>";
                echo "alert('Insert success');";
                echo "window.location.href='singer-manager.php'";
                echo "</script>";
            }
            else{
                echo "Insert error";
            }
            mysqli_close($conn);
        }
    ?>

</body>

</html>