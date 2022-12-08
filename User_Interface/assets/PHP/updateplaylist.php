<?php
$conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');

$PLAY = $_GET["PLAY"];


$DES = $_GET["DES"];


$ID1 = $_GET["ID1"];

if (isset($_GET["up"])) {
    mysqli_query($conn, "UPDATE playlist set PLAYLIST = '$PLAY', DESCRIPTIONS ='$DES' WHERE ID_PLAYLIST = '$ID1' ");
    header('location: playlist.php');
}
