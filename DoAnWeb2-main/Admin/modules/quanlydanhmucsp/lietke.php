<?php
$sql_lietkedanhmucsp="SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
$querry_lietkedanhmuc = mysqli_query($mysqli,$sql_lietkedanhmucsp);
?>

<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Liệt Kê Sản Phẩm</p>
<table style="width: 100%;" border="1",style="border-collapse:collapse">
<tr>
     <th>Thứ Tự</th>
    <th>Tên Danh Mục</th>
    <th>Quản Lý</th>
</tr>
<?php
$i=0;
while($row=mysqli_fetch_array($querry_lietkedanhmuc)){
$i++;
?>
<tr>
<td><?php echo $i?></td>
    <td><?php echo $row['tendanhmuc']?></td>
    <td><a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['iddanhmuc']?>">Xóa</a>|<a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['iddanhmuc']?>">Sửa</a></td>
    
</tr>
<?php
}
?>
</table>