<?php
require_once 'connect.php';
$sql="select MaSP,TenSP,HinhAnh,MoTa,MaDM from sanpham order by MaSP";
$rs= mysqli_query($conn, $sql);
if(mysqli_num_rows($rs)>0){     
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Danh sách sản phẩm Ghế</title>
    </head>
    <body>
        <table border="1">
            <caption class="caption_1">DANH SÁCH SẢN PHẨM GHẾ</caption>
             <tr>
                <td colspan="3">
                    <form name="frm_them" method="POST" action="danhmuc_them.php">
                        <!-- Mã sản phẩm: <input type="text" name="MaSP"> -->
                        Tên sản phẩm: <input type="text" name="TenSP">
                        Hình ảnh: <input type="text" name="HinhAnh">
                        Mô tả: <input type="text" name="MoTa">
                        Danh mục: <input type="text" name="TenDM"  value="Ghế" readonly><input type="number" name="MaDM"  value="2" readonly>
                        <input type="submit" name="btn_submit" value="Thêm"/>
                    </form>
                </td> 
            </tr>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Mô tả</th>
            </tr>
            <?php while ($row= mysqli_fetch_row($rs)){?>
            <tr>
                <td><?php echo $row["0"];?></td>
                <td><?php echo $row["1"];?></td>
                <td><?php echo $row["2"];?></td>
                <td><?php echo $row["3"];?></td>
                <!-- <td align="center">
                    <a href="loaisanpham_xoa_xuly.php?id=<?php echo $row[0]?>">
                    <img src="image/delete.gif" >
                    </a>
                     <a href="loaisanpham_capnhat_xuly.php?id=<?php echo $row[0]?>">
                         <img src="image/edit.png">
                    </a>                  
                  </td> -->
            </tr>
    <?php }?>          
       </table>
    </body>
</html>
 <?php
}
else{
   echo "Không có dữ liệu loại sản phẩm" ;
}
  ?>