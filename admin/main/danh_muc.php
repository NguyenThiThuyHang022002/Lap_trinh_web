<?php

session_start();
include 'connect.php';

$sql = "SELECT * FROM danhmucsanpham";
$list_dmsp = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($list_dmsp) > 0) {

    $list_dmsp = mysqli_fetch_all($list_dmsp);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục sản phẩm</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container" >
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý danh mục sản phẩm</a></li>

                </ol>
            </nav>

        </div>

        <div style="margin-bottom:20px">


            <a type="button" class="btn btn-primary" href="index.php?quanly=danhmuc_them_form">
                Thêm mới</a>


        </div>

        <div>
            <div style="text-align:center;margin-bottom:20px">
                <p style="font-weight:bold">Danh sách danh mục sản phẩm</p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Mã danh mục</th>
                        <th scope="col">Tên danh mục</th>
                        <!-- <th scope="col">Mô tả</th> -->

                    </tr>
                </thead>
                <tbody>

                    <?php

                    $i = 0;
                    foreach ($list_dmsp as $dmsp) {
                        $i++;
                    ?>
                        <tr>
                            <th scope="row"> <?php echo $i; ?> </th>
                            <td> <?php echo $dmsp[0] ?></td>
                            <td><?php echo $dmsp[1] ?></td>
                            <!-- <td><?php echo $dmsp[2] ?></td> -->
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