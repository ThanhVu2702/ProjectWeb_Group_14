<?php
$id_khachhang=$_SESSION['USERID'];
$sql_lietkedsdonhang="SELECT * FROM tbl_cart, tbl_taikhoan WHERE tbl_cart.id_khachhang=tbl_taikhoan.USERID AND 
 tbl_cart.id_khachhang=$id_khachhang ORDER BY tbl_cart.code_cart LIMIT 50";
$querry_lietkedonhang = mysqli_query($mysqli,$sql_lietkedsdonhang);
?>

<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Lịch Sử Đơn Hàng</p>
<table style="width: 100%;" border="6",style="border-collapse:collapse">
<tr>
     <th>Id</th>
     <th>Mã Đơn Hàng</th>
     <th>Tên Khách Hàng</th>
     <th>Email</th>
     <th>Ngày Đặt Hàng</th>
     <th>Tình Trạng</th>
     <th>Quản lý</th>
</tr>
<?php
$i=0;
while($row_dh=mysqli_fetch_array($querry_lietkedonhang)){
$i++;
?>
<tr>
<td><?php echo $i?></td>
    <td><?php echo $row_dh['code_cart']?></td>
    <td><?php echo $row_dh['USERNAME']?></td>
    <td><?php echo $row_dh['EMAIL']?></td>
    <td><?php echo $row_dh['cart_date']?></td>
    <td>
     <?php
     if($row_dh['cart_status']==1)
     {
       echo '<a href="modules/quanlydonhang/xuly.php?code='.$row_dh['code_cart'].'">New bill</a>';
     }
      else{
       echo 'Seen';
      }
     ?>
    </td>
    <td>
        <a href="index.php?quanly=xemdonhang&code=<?php echo $row_dh['code_cart']?>">Xem Đơn Hàng</a>
    </td>
</tr>
<?php
}
?>
</table>
