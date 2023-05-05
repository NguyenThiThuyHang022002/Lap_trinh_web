<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSSAd/styleAd.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>ADMIN</title>
    <script>
        const chevron_down = document.querySelector(".fa-solid fa-chevron-down");
        const product = document.querySelector(".product");
        chevron_down.addEventListener("click", () => {
            product.classList.toggle("open");
        });
    </script>
</head>

<body>

    <!-- header -->
    <div class="header">
        <div class="flex">
            <div class="box-logo">
                <a href="#" class="logo"><i class="fa-solid fa-house fa-2x" style="padding: 5px;"></i> DECOR-T</a>
            </div>
            <div class="text-inforAd">
                <span>Hi!</span>
                <i class="fa-solid fa-bell"></i>
            </div>
        </div>
    </div>

    <!-- sidebar -->
    <div class="sidebar">
        <ul class="list_sidebar">
            <li><a href="index.php?quanly=dashboard"><i class="fa-solid fa-house-chimney" style="width:50px;"></i> Dashboard</a></li>
            <li><a href="index.php?quanly=taikhoan"><i class="fa-solid fa-sliders" style="width:50px;"></i> Tài khoản</a></li>
            <li><a href="index.php?quanly=khachhang"><i class="fa-solid fa-user" style="width:50px;"></i> Khách hàng</a></li>
            <li><a href="index.php?quanly=danhmuc"><i class="fa-solid fa-user" style="width:70px; margin-left: 0px";></i> Danh mục sản phẩm</a></li>
            <li><a href="index.php?quanly=sanpham"><i class="fa-solid fa-boxes-stacked" style="width:50px; "></i> Sản phẩm </a>



            </li>
            <li><a href="index.php?quanly=dathang"><i class="fa-solid fa-clipboard" style="width:50px;"></i> Đặt hàng</a></li>
            <li><a href="index.php?quanly=hoadon"><i class="fa-sharp fa-solid fa-file-invoice" style="width:50px;"></i> Hóa đơn</a></li>
            <li><a href="index.php?quanly=nhanxet"><i class="fa-solid fa-feather" style="width:50px;"></i> Nhận xét</a></li>
            <li><a href="index.php?quanly=thongke"><i class="fa-solid fa-chart-simple" style="width:50px;"></i> Thống kê</a></li>
        
            <li><a href="index.php?quanly=doimatkhau"><i class="fa-solid fa-chart-simple" style="width:50px;"></i> Đổi mật khẩu</a></li>

        </ul>
    </div>

    <!-- maincontent -->
    <div class="maincontent">
        <?php
        //                                hàm isset dùng để kiểm tra một biến nào đó đã được khởi tạo trong 
        //                                bộ nhớ của máy tính hay chưa
        if (isset($_GET['quanly'])) {
            $tam = $_GET['quanly'];
        } else {
            $tam = '';
        }


        if ($tam == 'dashboard') {
            include 'main/dashboard.php';
        } 
        elseif ($tam == 'taikhoan') {
            include 'main/taikhoan.php';
        } 
       
        elseif ($tam == 'khachhang') {
            include 'main/khachhang.php';
        
        }  
        elseif ($tam == 'them_sp') {
            include 'main/sanpham_them_form.php';
        }
        elseif ($tam == 'sua_sp') {
            include 'main/sanpham_sua_form.php';
        }
        elseif ($tam == 'xoa_sp') {
            include 'main/sanpham_xoa.php';
        } 
         elseif ($tam == "danhmuc") {
            include 'main/danh_muc.php';
        } elseif ($tam == "danhmuc_them_form") {
            include 'main/danh_muc_them_form.php';
        } elseif ($tam == 'sanpham') {
            include 'main/sanpham.php';
        } elseif ($tam == 'dathang') {
            include 'main/dathang.php';
        } elseif ($tam == 'hoadon') {
            include 'main/hoadon.php';
        } elseif ($tam == 'nhanxet') {
            include 'main/nhanxet.php';
        } 
        else if($tam== "doimatkhau"){
            include 'main/doimatkhau.php';
        }
        else {
            include 'main/thongke.php';
        }       
        ?>
    </div>
</body>

</html>