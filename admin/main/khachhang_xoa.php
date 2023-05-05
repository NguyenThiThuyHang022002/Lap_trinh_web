<!-- <?php

session_start();
include 'connect.php';



if (isset($_GET['MaKH'])) {

    $MaKH = $_GET['MaKH'];

    $sql = "DELETE FROM khachhang where MaKH=$MaKH";
    $list_sp = mysqli_query($conn, $sql) or die(mysqli_error($conn, $sql));

    header('location:index.php?quanly=khachhang');

}
