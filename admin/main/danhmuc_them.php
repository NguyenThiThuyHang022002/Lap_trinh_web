<?php
require_once 'connect.php';
if(isset($_POST["btn_submit"])){
    // $MaSP=$_POST["MaSP"];
    // $MaSP= mysqli_real_escape_string ($conn, $MaSP);
    $TenSP=$_POST["TenSP"];
    $TenSP= mysqli_real_escape_string ($conn, $TenSP);
    $HinhAnh=$_POST["HinhAnh"];
    $HinhAnh= mysqli_real_escape_string ($conn, $HinhAnh);
    $MoTa=$_POST["MoTa"];
    $MoTa= mysqli_real_escape_string ($conn, $MoTa);
    $MaDM=$_POST["MaDM"];
    $MaDM= mysqli_real_escape_string ($conn, $MoTa);
    $rs= "insert into sanpham(TenSP,HinhAnh,MoTa,MaDM) values('$TenSP','$HinhAnh','$MoTa','$MaDM')";
    mysqli_query ($conn, $rs)or die(mysqli_error ($conn));
    header("location: danhmuc.php");
}

