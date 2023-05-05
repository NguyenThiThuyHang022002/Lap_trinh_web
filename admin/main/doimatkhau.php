<?php

session_start();
include 'connect.php';


if (isset($_POST['admin_id'])) {

    $manv = $_SESSION['MaNV'];

    $old_pass = ($_POST['old_pass']);
    $new_pass = ($_POST['new_pass']);



    $sql = "SELECT * FROM nhanvien WHERE MaNV='$manv' AND MatKhau='$old_pass'";

  
    $kq = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if (mysqli_num_rows($kq) > 0) {
        $sql = "UPDATE  nhanvien SET  MatKhau='$new_pass' WHERE MaNV='$manv'";

        $kq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        header('location:index.php?quanly=doimatkhau');
    } else {
        error_log("sai mật khẩu");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Đổi mật khẩu</a></li>

                </ol>
            </nav>

        </div>

        <div>

            <div style="text-align:center;margin-bottom:20px">
                <p style="font-weight:bold">Đổi mật khẩu</p>
            </div>

            <div style="width:50%;margin-left:25%">
                <form action="index.php?quanly=doimatkhau" enctype="multipart/form-data" method="POST">


                    <div class="form-group">
                        <label for="old_pass">Mật khẩu cũ</label>
                        <input class="form-control" id="old_pass" name="old_pass">
                    </div>
                    <div class="form-group">
                        <label for="new_pass">Mật khẩu mới</label>
                        <input class="form-control" id="new_pass" name="new_pass">

                    </div>



                    <button name="submit" type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>

    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>