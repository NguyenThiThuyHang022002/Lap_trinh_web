<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='ltw_nt';
$conn=mysqli_connect($hostname,$username,$password,$dbname);
if(!$conn){
    die("Không thể kết nối: ".mysqli_connect_error());
    exit();
}
mysqli_query($conn, "set names 'utf8'");
?>