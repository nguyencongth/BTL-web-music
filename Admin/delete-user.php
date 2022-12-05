<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete user</title>
</head>

<body>
    <?php
    $ID = $_GET["ID_THONGTIN"];
    $conn = mysqli_connect("localhost", "root", "", "nhom8_web-music");
    if (!$conn) {
        echo "connect failed";
        return;
    }
    $sqlGeID = "DELETE FROM account WHERE ID_THONGTIN = '$ID'";
    $result = mysqli_query($conn, $sqlGeID);
    if ($result == true) {
        echo "<script>";
        echo "alert('Success delete');";
        echo "window.location.href='user-manager.php'";
        echo "</script>";
    } else {
        echo "Delete error";
    }
    ?>
</body>

</html>