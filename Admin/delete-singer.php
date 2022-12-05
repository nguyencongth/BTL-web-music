<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete singer</title>
</head>

<body>
    <?php
    $ID = $_GET["ID_Singer"];
    $conn = mysqli_connect("localhost", "root", "", "nhom8_web-music");
    
    $sqlGeID = "DELETE FROM singer WHERE ID_Singer = '$ID'";
    $result = mysqli_query($conn, $sqlGeID);
    if ($result == true) {
        echo "<script>";
        echo "alert('Success delete');";
        echo "window.location.href='singer-manager.php'";
        echo "</script>";
    } else {
        echo "Delete error";
    }
    ?>
</body>

</html>