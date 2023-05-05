<?php
require_once 'connect.php';
session_start();

// $errors = array();
if (isset($_POST['submit'])) {
    $username = $_POST["admin_username"];
    $password = $_POST["password"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // $hash_md5  = md5($password);

    $sql = "SELECT * FROM nhanvien WHERE TaiKhoan ='$username' AND MatKhau ='$password'";
    $admin = mysqli_query($conn, $sql) or die(mysqli_error($conn, $sql));

    if (mysqli_num_rows($admin) == 1) {

        $row_admin = mysqli_fetch_assoc($admin);
        //thiết lập các biến session muốn kiểm tra
        $_SESSION['admin_name'] = $row_admin['TenNV'];
        $_SESSION['admin_email'] = $row_admin['Email'];
        $_SESSION['admin_id'] = $row_admin['MaNV'];
        $_SESSION['success'] = "You are now logged in";
        //tạo cookie lưu tên đăng nhập, password khi click vào check box ghi nhớ
        header('location:index.php');
        if(isset($_POST['ghinho'])){
            setcookie("un", $_POST['username'],time()+60*60*24);
            setcookie("pw", $_POST['password'],time()+60*60*24);
         }else {
            setcookie("un");
            setcookie("pw");
         }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="./CSSAd/login.css">
</head>

<body>
    <div class="container">
        <div class="signin-image">
            <figure><img src="../images/signup-image.jpg" alt="sing up image"></figure>
            <a href="../index.php" class="signup-image-link">Back To Home</a>
        </div>

        <div class="signin-form">
            <h2 class="form-title">ADMIN LOGIN</h2>
            <form class="register-form" id="login-form" action="login.php" method="post">
                <div class="form-group">
                    <span> Tên đăng nhập</span><br>
                    <input type="text" name="admin_username" class="box" id="your_name" placeholder="Nhập tên đăng nhập " /><br>

                    <span> Mật khẩu</span><br>
                    <input type="password" name="password" class="box" id="your_pass" placeholder="Nhập mật khẩu" /><br>

                    <input type="submit" name="submit" id="signin" class="form-submit" value="Đăng nhập" />
                    <input type="checkbox" name="ghinho" value="Ghi nhớ"> Ghi nhớ
                </div>
            </form>

        </div>
    </div>

    <!-- JS -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <!-- <script src="js/main.js"></script> -->
</body>

</html>