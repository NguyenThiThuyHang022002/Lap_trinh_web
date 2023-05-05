<?php

session_start();
include 'connect.php';



$search = $_POST['search'] ?? "";



if ($search) {
    $sql = "SELECT * FROM sanpham Where TenSP like '%$search%'";
} else {
    $sql = "SELECT * FROM sanpham";
}

$list_sp = mysqli_query($conn, $sql) or die(mysqli_error($conn,));

if (mysqli_num_rows($list_sp) > 0) {

    $list_sp = mysqli_fetch_all($list_sp);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="../CSSAd/styleAd.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</a></li>

                </ol>
            </nav>

        </div>

        <div style="margin-bottom:20px">


            <a type="button" class="btn btn-primary" href="index.php?quanly=them_sp">
                Thêm mới</a>


        </div>

        <div>
            <div style="text-align:center;margin-bottom:20px">
                <p style="font-weight:bold">Danh sách sản phẩm</p>
            </div>
            <div style="margin-bottom:30px">
                <form action="index.php?quanly=sanpham" method="POST">
                    <div style="display:flex;align-items: center;justify-content: flex-end;">
                        <div class="form-group" style="margin-bottom:0px">

                            <input class="form-control" id="search" name="search" value="<?php echo $search?>" style="min-width:300px;margin-right:10px">
                        </div>

                        <button name="submit" type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>

                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col" colspan="2">Thao tác</th>

                    </tr>
                </thead>
                <tbody>

                    <?php

                    $i = 0;
                    foreach ($list_sp as $sp) {
                        $i++;
                    ?>
                        <tr>
                            <th scope="row"> <?php echo $i; ?> </th>
                            <td><?php echo $sp[0] ?></td>
                            <td> <img src=" <?php echo $sp[2] ?>" width="100px" height="auto"></td>
                            <td><?php echo $sp[1] ?></td>
                            <td><?php echo $sp[3] ?></td>
                            <td><a href="index.php?quanly=sua_sp&MaSP= <?php echo $sp[0] ?>"> Cập nhật</a></td>
                            <td><a href="index.php?quanly=xoa_sp&MaSP= <?php echo $sp[0] ?>"> Xoá</a></td>

                        </tr>

                    <?php

                    }
                    ?>

                </tbody>
            </table>

        </div>

    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>