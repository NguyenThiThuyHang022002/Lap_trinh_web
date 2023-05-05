
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <title>DECOR-T</title>
    <style>
        .text-inforAd{
  float:left;
  width: 50%;
  margin-top: 40px;
  text-align: center;
 
} 
ul.product_list{
   padding:0;
   margin: 0;
   list-style:none;
   width: 100%;
}
ul.product_list li{
    width: 19%;
    height: 268px;
    border: 1px dashed #000;
    margin-left: 150px;
    margin-top: 20px;
    float: left;
    background: orange; /*nếu hình là không nền thì sẽ hiện nền màu này luôn*/
}

ul.product_list li img{
    width: 100%;
}
ul.product_list li a{
    text-decoration: none;
}

p.title_product{
    text-align: center;
    color:#000;
    font-size: 16px;
    font-weight: bold;
}
p.price_product{
    text-align: center;
    color: red;
    font-size: 16px;
    font-weight: bold;
}
    </style>
</head>
<body>
<header class="header">
    <!-- header-1 -->
   <div class="header-1">
        <div class="flex">
             <div class="box-logo">
                <a href="#" class="logo"><i class="fa-solid fa-house fa-2x" style="padding: 5px;"></i> DECOR-T</a>
            </div>

            <div class="text-inforAd">
                <span >Hi!</span>
                <i class="fa-solid fa-bell"></i>
            </div> 
             <!-- <div class="text-DN-DK">
            <a href="admin/login.php" id=" AM" class="DN-DK"> Quản trị viên </a>|<a href="login.php" id=" DN" class="DN-DK"> Đăng nhập </a> | <a href="register.php"  id="DK" class="DN-DK"> Đăng ký </a> 
            </div> -->
        </div>      
   </div>

   <div class="header-2">
        <div class="menu">
            <ul class="list_menu">
                        <li ><a href="index.php">Trang chủ</a></li>
                        <li ><a href="#">Giới thiệu</a></li>
                        <li ><a href="#"> sản phẩm</a></li>
                        <li ><a href="#">Liên hệ</a></li>
            </ul>
        </div>  
   </div>
</header>

<?php
session_start();
include 'connect.php';
?>
<div class="main">
<ul class="product_list">
                                    <li>
                                        <a href="">
                                        <img src="images/Giuong/Giường Arlington.jpg" alt="ban"/>
                                        <p class="title_product"> Tên sản phẩm :  </p>
                                        <p class="price_product">Giá : </p>
                                        </a>
                                    </li>
                                      <li>
                                        <a href="">
                                        <img src="images/Giuong/Giường  hộc kéo Iris.png" alt="ban"/>
                                        <p class="title_product"> Tên sản phẩm : </p>
                                        <p class="price_product">Giá : </p>
                                        </a>
                                    </li>
                                 <li>
                                        <a href="">
                                        <img src="images/Giuong/Giường Austin.jpg" alt="ban"/>
                                        <p class="title_product"> Tên sản phẩm : </p>
                                        <p class="price_product">Giá : </p>
                                        </a>
                                    </li>
                                 <li>
                                        <a href="">
                                        <img src="images/Giuong/Giường Houston.jpg" alt="ban"/>
                                        <p class="title_product"> Tên sản phẩm : </p>
                                        <p class="price_product">Giá : </p>
                                        </a>
                                    </li>
                                 <li>
                                        <a href="">
                                        <img src="images/Giuong/Giường Lagano.jpg" alt="ban"/>
                                        <p class="title_product"> Tên sản phẩm : </p>
                                        <p class="price_product">Giá : </p>
                                        </a>
                                    </li>
                                 <!-- <li>
                                        <a href="">
                                        <img src="images/sp_ban/8.jpg" alt="ban"/>
                                        <p class="title_product"> Tên sản phẩm : </p>
                                        <p class="price_product">Giá : </p>
                                        </a>
                                    </li> -->
</ul>
</div>

</body>
</html>