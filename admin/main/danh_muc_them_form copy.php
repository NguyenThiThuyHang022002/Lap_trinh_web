<?php

session_start();
require_once 'connect.php';


if (isset($_POST['submit'])) {

    $name = $_POST['name'] ?? "";
    $description = $_POST['description'] ?? "";

    $sql = "INSERT INTO danhmucsanpham (TenDM,MoTa) values ('$name','$description') ";

    $kq = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    header('location:index.php?quanly=danhmuc');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục sản phẩm</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item">Quản lý danh mục sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm danh mục sản phẩm</a></li>

                </ol>
            </nav>

        </div>

        <div>

            <div style="text-align:center;margin-bottom:20px">
                <p style="font-weight:bold">Thêm danh mục sản phẩm</p>
            </div>


            <div style="width:50%;margin-left:25%">
                <form action="index.php?quanly=danhmuc_them_form" enctype="multipart/form-data" method="POST">


                    <div class="form-group">
                        <label for="name">Tên danh mục sản phẩm</label>
                        <input class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <button name="submit" type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>

    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>