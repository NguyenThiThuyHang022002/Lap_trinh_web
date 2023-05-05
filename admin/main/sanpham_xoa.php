<?php

session_start();
include 'connect.php';



if (isset($_GET['MaSP'])) {

    $MaSP = $_GET['MaSP'];

    $sql = "DELETE FROM sanpham where MaSP=$MaSP";
    $list_sp = mysqli_query($conn, $sql) or die(mysqli_error($conn, $sql));

    header('location:index.php?quanly=sanpham');

}
