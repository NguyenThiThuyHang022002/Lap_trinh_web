<?php 
require_once 'connect.php';
session_start();

// $errors = array();
if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
      //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
	$password= strip_tags($password);
	$password= addslashes($password);
   $username = mysqli_real_escape_string($conn, $username);
   $password = mysqli_real_escape_string($conn, $password);
    $sql="SELECT * FROM khachhang WHERE TenDN ='$username' AND MatKhau ='$password'";
    $user = mysqli_query($conn,$sql)or die (mysqli_error($conn,$sql));

     if(mysqli_num_rows($user) == 1 ){

        $row_admin=mysqli_fetch_assoc($user);
        //thiết lập các biến session muốn kiểm tra
         $_SESSION['admin_name'] = $row_admin['TenNV'];
         $_SESSION['admin_email'] = $row_admin['Email'];
         $_SESSION['admin_id'] = $row_admin['MaNV'];
         $_SESSION['success'] = "Bạn đã đăng nhập";
         //tạo cookie lưu tên đăng nhập, password khi click vào check box ghi nhớ
         header('location:index2.php');
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
    <!-- <script src="js/login.js"></script> -->
    <title>ĐĂNG NHẬP</title>
</head>
<body>
  
<div class="form-container"> 
<form  name="frmlogin" action="index2.php" method="post"  onsubmit="return  ChecktenDN(),Checkmatkhau()" >
   <h3 id="title-login">ĐĂNG NHẬP</h3><br>
   <span>Tên tài khoản </span>
   <input type="text" name="username" placeholder="Nhập tên đăng nhập" required class="box"><br>
   <span>Mật khẩu</span>
   <input type="password" name="password" placeholder="Nhập mật khẩu" required class="box"><br>
   <input type="submit" name="submit" value="Đăng nhập" class="btn">
   <p>Bạn chưa có tài khoản, đăng ký ngay  <a href="register.php">Đăng ký</a></p>
</form>

</div>
</body>
</html>