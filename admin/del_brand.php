<?php
session_start();
define("security", True);
include_once("../config/connect.php");
$brd_id = $_GET['brand_id'];
if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    $sql = "DELETE FROM brand WHERE brand_id='$brd_id'";
    mysqli_query($conn, $sql);

    header("location:index.php?page_layout=brand");
}else{
    include_once("index.php");
}

?>