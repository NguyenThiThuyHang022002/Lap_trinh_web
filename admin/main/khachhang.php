<?php

session_start();
include 'connect.php';

$search = $_POST['search'] ?? "";

if ($search) {
    $sql = "SELECT * FROM khachhang Where TenKH like '%$search%'";
} else {
    $sql = "SELECT * FROM khachhang";
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
    <title>Quản lý khách hàng</title>
    <link rel="stylesheet" href="../CSSAd/styleAd.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý khách hàng</li>

                </ol>
            </nav>

        </div>

        <div style="margin-bottom:20px">


            <a type="button" class="btn btn-primary" href="index.php?quanly=them_kh">
                Thêm mới</a>


        </div>

        <div>
            <div style="text-align:center;margin-bottom:20px">
                <p style="font-weight:bold">Danh sách khách hàng</p>
            </div>
            <div style="margin-bottom:30px">
                <form action="index.php?quanly=khachhang" method="POST">
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

                        <th scope="col" name="MaKH">Mã khách hàng</th>
                        <th scope="col">Họ và tên </th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Tên đăng nhập</th>
                        <!-- <th scope="col">Mật khẩu</th> -->
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
                            <td><?php echo $sp[1] ?></td>
                            <!-- <td> <img src=" <?php echo $sp[2] ?>" width="100px" height="auto"></td> -->
                            <td><?php echo $sp[2] ?></td>
                            <td><?php echo $sp[3] ?></td>
                            <td><?php echo $sp[4] ?></td>
                            <td><?php echo $sp[5] ?></td>
                            <!-- <td><a href="index.php?quanly=sua_sp&MaKH= <?php echo $sp[1] ?>"> Cập nhật</a></td> -->
                            <td><a href="index.php?quanly=khachhang_xoa?MaKH=<?php echo $sp[0]?>"> Xoá</a></td>

                        </tr>

                    <?php
// var_dump($sp[0]);
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


<!-- <?php
include "connect.php";
$sql="select * from khachhang";
$run=mysqli_query($conn,$sql);

$search = $_POST['search'] ?? "";



if ($search) {
    $sql = "SELECT * FROM sanpham Where TenKH like '%$search%'";
} else {
    $sql = "SELECT * FROM sanpham";
}

$list_kh = mysqli_query($conn, $sql) or die(mysqli_error($conn,));

if (mysqli_num_rows($list_kh) > 0) {

    $list_kh = mysqli_fetch_all($list_kh);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
th{
	background:#CCC;
	}
</style>
<body>
</head>
<body>
<table width="100%" border="1">
  <tr>
    <th colspan="10">Bảng danh sách người dùng</th>
  </tr>
  <tr>
    <td><em><strong>Mã khách hàng</strong></em></td>
   
    <td><em><strong>Họ và tên khách hàng</strong></em></td>
    <td><em><strong>Địa chỉ</strong></em></td>
    <td><em><strong>Email</strong></em></td>
    <td><em><strong>Số điện thoại</strong></em></td>     
    <td><em><strong>Tên đăng nhập</strong></em></td>
    <td colspan="2"><em><strong>Quản lý</strong></em></td>
  </tr>
  <?php

$i = 0;
foreach ($list_kh as $kh) {
    $i++;
}
?>
<?php
 
 while ($dong=mysqli_fetch_array($run)){
 ?>
 <tr>
  <tr>
    <td><?php echo $dong['MaKH']; ?></td>
    
    <td><?php echo $dong['TenKH'];?></td>
    <td><?php echo $dong['DiaChi'];?></td>
    <td><?php echo $dong['Email'];?></td>
    <td><?php echo $dong['SDT'];?></td>
    <td> <div align="center"><?php echo $dong['TenDN']; ?></div> </td>
    

    <td><a href="index.php?quanly=khachhang">Sửa</a></td>
    <td><a href="index.php?quanly=khachhang_xoa">Xóa</a></td>

     <td><div align="center"><a href="modules/quanlynguoidung/xuly.php?id_user=<?php echo $dong['id_user'] ?>">Xoá</a></div></td> 
  </tr>


  
  <?php
	
}
?>
</table>
</body>
</html>

  


 -->
