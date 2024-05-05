<?php
$code=$_GET['code'];
$sql_lietke_dh="SELECT * FROM tbl_cart_details, tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham 
AND tbl_cart_details.code_cart='$_GET[code]' ORDER BY tbl_cart_details.id_sanpham DESC";
$querry_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>

<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Chi Tiết Đơn Hàng</p>
<table style="width: 100%;" border="6",style="border-collapse:collapse">
<tr>
     <th>Id</th>
     <th>Mã Đơn Hàng</th>
     <th>Tên Sản Phẩm</th>
     <th>Số Lượng</th>
     <th>Đơn Giá</th>
     <th>Thành Tiền</th>
</tr>
<?php
$i=0;
$tongtien=0;
while($row_dh=mysqli_fetch_array($querry_lietke_dh)){
$i++;
$thanhtien=  $row_dh['giasp']* $row_dh['soluong'];
$tongtien+=$thanhtien;
?>
<tr>
<td><?php echo $i?></td>
    <td><?php echo $row_dh['code_cart']?></td>
    <td><?php echo $row_dh['tensanpham']?></td>
    <td><?php echo $row_dh['soluong']?></td>
    <td><?php echo $row_dh['giasp']?></td>
    <td><?php echo $row_dh['giasp']* $row_dh['soluong']?></td>   
    <td>
       Tổng tiền:<?php echo $tongtien ?>
    </td>
</tr>
<?php
}
?>
</table>
