<?php
$sql_lietkedsdonhang="SELECT * FROM tbl_cart,tbl_taikhoan,tbl_khachhang WHERE tbl_cart.id_khachhang=tbl_taikhoan.USERID 
AND tbl_cart.id_khachhang=tbl_khachhang.USERID_KH
ORDER BY tbl_cart.id_cart DESC";
$querry_lietkedonhang = mysqli_query($mysqli,$sql_lietkedsdonhang);
?>

<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Danh Sách Đơn Hàng</p>
<table style="width: 100%;" border="6",style="border-collapse:collapse">
<tr>
     <th>Id</th>
     <th>Mã Đơn Hàng</th>
     <th>Tên Khách Hàng</th>
     <th>Email</th>
     <th>Địa Chỉ</th>
     <th>SDT</th>
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
    <td><?php echo $row_dh['DIACHI']?></td>
    <td><?php echo $row_dh['SDT']?></td>   
    <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row_dh['code_cart']?>">Xem Đơn Hàng</a>
    </td>
</tr>
<?php
}
?>
</table>
