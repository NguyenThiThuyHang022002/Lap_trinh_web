<?php 
require_once 'connect.php';
session_start();
// lấy thông tin từ form bằng phương thức POST
if(isset($_POST['submit'])){ /*tên của button đăng ký*/
    $name = mysqli_real_escape_string($conn, $_POST['name']); /*mysqli_real_escape_string : loại bỏ các kí tự có trong input có thể dẫn đến lỗ hỏng bảo mật*/
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']); /* md5($conn, $_POST['password']): md5 để mã hóa */
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $sodienthoai = mysqli_real_escape_string($conn, $_POST['sodienthoai']);
    $diachi = mysqli_real_escape_string($conn, $_POST['diachi']);
    $phanquyen = mysqli_real_escape_string($conn, $_POST['phanquyen']);
    
    $sql="select * from khachhang where TenDN='$username'";
	$kt=mysqli_query($conn, $sql);
	if(mysqli_num_rows($kt)  > 0){
		echo "Tài khoản đã tồn tại";
	}else{
	//thực hiện việc lưu trữ dữ liệu vào db
	    $sql = "INSERT INTO khachhang(TenKH,DiaChi,Email,SDT,TenDN,MatKhau,MaPQ) Values ('$name','$diachi','$email','$sodienthoai','$username','$pass','$phanquyen)";	    
	// thực thi câu $sql với biến conn lấy từ file connection.php
   		mysqli_query($conn,$sql);     
        header('location:login.php');
	}
 }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="CSS/formLG-RS.css">
    <script src="js/register.js"></script>
    <title>ĐĂNG KÝ</title>
</head>
<body>  

<div class="form-container"> 
<form  name="frmregister" action="" method="post" onsubmit="return Checkregister()">
   <h3>ĐĂNG KÝ</h3><br>
   
   <span> Họ và tên </span>
    <input type="text" name="name" placeholder="Nhập họ tên của bạn" required class="box">

    <span> Tên đăng nhập</span>
    <input type="text" name="username" placeholder="Nhập tên đăng nhập" required class="box">

    <span> Mật khẩu</span>
    <input type="password" name="password" placeholder="Nhập mật khẩu" required class="box">

    <span> Xác nhận mật khẩu</span>
    <input type="password" name="xnpassword" placeholder="Xác nhận mật khẩu" required class="box">

    <span> Email</span>
    <input type="email" name="email" placeholder="Nhập email của bạn" required class="box">

    <span> Số điện thoại</span>
    <input type="text" name="sodienthoai" placeholder="Nhập số điện thoại của bạn" required class="box">

    <span> Địa chỉ</span>
    <input type="text" name="diachi" placeholder="Nhập địa chỉ của bạn" required class="box">

    <span> Người sử dụng</span>
    <input type="text" name="phanquyen" required class="box" value="4" readonly>

    <input type="submit" name="submit" value="Đăng ký" class="btn" >
   <!-- <span>Tên tài khoản </span>
   <input type="email" name="email" placeholder="enter your username" required class="box"><br>
   <span>Mật khẩu</span>
   <input type="password" name="password" placeholder="enter your password" required class="box"><br>
   <input type="submit" name="submit" value="Đăng nhập" class="btn"> -->
   <p>Bạn đã có tài khoản đăng nhập ngay  <a href="login.php">Đăng nhập</a></p>
</form>

</div>
</body>
</html>