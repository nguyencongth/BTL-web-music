<?php
$conn = mysqli_connect('localhost','root','','nhom8_web-music');
 if(isset($_GET["MA"]))
 {
    $MA = $_GET["MA"];
 }
  mysqli_query($conn,"DELETE from playlist where ID_PLAYLIST = '$MA'");
  mysqli_query($conn,"DELETE from music_playlist where ID_PLAYLIST = '$MA'");
  header('location: playlist.php');
?>