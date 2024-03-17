<?php
$sql_lietkesanpham="SELECT * FROM tbl_sanpham,tbl_danhmuc Where tbl_sanpham.id_danhmuc=tbl_danhmuc.iddanhmuc ORDER BY id_sanpham DESC";
$querry_lietkesp = mysqli_query($mysqli,$sql_lietkesanpham);
?>

<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Liệt Kê Sản Phẩm</p>
<table style="width: 100%;" border="1",style="border-collapse:collapse">
<tr>
     <th>Id</th>
    <th>Tên Sản Phẩm</th>
    <th>Mã Sản Phẩm</th>
    <th>Giá sản phẩm</th>
    <th>Số Lượng</th>
    <th>ID Danh Mục</th>
    <th>Hình Ảnh</th>
    <th>Tóm Tắt</th>
    <th>Tình Trạng</th>
    <th>Quản Lý </th>
</tr>
<?php
$i=0;
while($row=mysqli_fetch_array($querry_lietkesp)){
$i++;
?>
<tr>
<td><?php echo $i?></td>
    <td><?php echo $row['tensanpham']?></td>
    <td><?php echo $row['masp']?></td>
    <td><?php echo $row['giasp']?></td>
    <td><?php echo $row['soluong']?></td>
    <td><?php echo $row['id_danhmuc']?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>" width="150px"></td>
    <td><?php echo $row['tomtat']?></td>
    <td><?php  if($row['tinhtrang']==1){
        echo 'Kích Hoạt';
    }
    else{
        echo 'Ẩn';
    }
    ?></td>
    <td><a href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa</a>|<a href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row['id_sanpham']?>">Sửa</a></td>
    
</tr>
<?php
}
?>
</table> 