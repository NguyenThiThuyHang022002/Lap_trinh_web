<?php

session_start();
include 'connect.php';

$sql = "SELECT * FROM danhmucsanpham";
$list_dmsp = mysqli_query($conn, $sql) or die(mysqli_error($conn, $sql));

if (mysqli_num_rows($list_dmsp) > 0) {

    $list_dmsp = mysqli_fetch_all($list_dmsp);
}

if (isset($_POST['submit'])) {


    $image = $_FILES['image'] ?? "";
    $name = $_POST['name'] ?? "";
    $category = $_POST['category'] ?? "";
    $description = $_POST['description'] ?? "";

    $link = "";
    $tmpFilePath = $image['tmp_name'];
    if ($tmpFilePath != "") {

        $absolutePath = "D:/NOITHAT/Lap_trinh_web/images";

        // cái absolutePath này sau em đổi thành path của xampp của máy em nhá. anh dùng Mac nên nó khác tí
        
        $absoluteURL = "http://localhost//Lap_trinh_web";


        $fileName = $image['name'];

        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $extension_allow = ['png', 'jpg', 'jpeg', 'apng', 'avif', 'gif', 'jfif', 'pjpeg', 'pjp', 'svg', 'webp', 'bmp', 'ico'];


        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randomString = substr(str_shuffle($permitted_chars), 0, 10);

        $destinationFolder = "/images";
        if (!is_dir($absolutePath . $destinationFolder)) {
            if (!mkdir($absolutePath . $destinationFolder, 0777, true))
                throw new Exception(sprintf('Không thể tạo folder'));
        }

        if (move_uploaded_file($tmpFilePath, $absolutePath . $destinationFolder . "/$randomString" . '.' . $extension)) {
            $link = $absoluteURL . $destinationFolder . "/$randomString" . '.' . $extension;
        }
    }


    $sql = "INSERT INTO sanpham (MaDM,TenSP,HinhAnh,MoTa) values ('$category','$name','$link','$description')";

    $kq = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    header('location:index.php?quanly=sanpham');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item">Quản lý sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm</a></li>

                </ol>
            </nav>

        </div>

        <div>

            <div style="text-align:center;margin-bottom:20px">
                <p style="font-weight:bold">Thêm sản phẩm</p>
            </div>

            <div style="width:50%;margin-left:25%">
                <form action="index.php?quanly=them_sp" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="image">Hình ảnh</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <select class="form-control" id="category" name="category">

                            <?php foreach ($list_dmsp as $dm) {

                            ?>
                                <option value="<?php echo $dm[0] ?>"> <?php echo $dm[1] ?></option>

                            <?php
                            }
                            ?>
                        </select>
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