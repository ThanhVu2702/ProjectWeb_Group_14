<?php
$sql_suasp="SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id_sanpham]' LIMIT 1";
$querry_suasp = mysqli_query($mysqli,$sql_suasp);
?>
<p style="font-size:20px; text-align:center; color:coral; font-weight:bold">Sửa Sản Phẩm </p>
<table class="table" style="border-collapse: collapse; border:5px solid coral">
<?php 
while($row = mysqli_fetch_array($querry_suasp)){

?>
<form method="POST" action="modules/quanlysanpham/xuly.php?id_sanpham=<?php echo $_GET['id_sanpham']?>" enctype="multipart/form-data">

<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Tên Sản Phẩm:</td>
<td><input class="form-control" type="text" value="<?php echo $row['tensanpham']?>" name="tensanpham" style="width:100%;"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Mã Sản Phẩm:</td>
<td><input class="form-control" type="text"  value="<?php echo $row['masp']?>" name="masp" style="width:100%;"></td>
</tr>
<tr>
    <td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Giá Sản Phẩm:</td>
     <td><input class="form-control" type="text" name="giasp" value="<?php echo $row['giasp']?>" style="width:100%"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Số Lượng:</td>
<td><input class="form-control" type="text" name="soluong" value="<?php echo $row['soluong']?>" style="width:100%;"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Hình Ảnh </td>
<td><input class="form-control-file" type="file" name="hinhanh" style="width:100%;">
<img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>" width="150px">
</td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Nội dung:</td>
<td><textarea class="form-control" row="10" width="100%" name="noidung"   style="resize:none"><?php echo $row['noidung']?></textarea class="form-control"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Tóm Tắt:</td>
<td><textarea class="form-control" row="10" width="100%" name="tomtat"   style="resize:none"><?php echo $row['tomtat']?></textarea class="form-control"></td>
</tr>
<tr>
    <td  style="text-align:left;font-weight:bold;font-style:italic;color:coral">Danh Mục Sản Phẩm:</td>
     <td>
        <select class="form-control" name="danhmuc">
            <?php 
            $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY iddanhmuc DESC";
            $querydanhmuc=mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($querydanhmuc)){
                if($row_danhmuc['iddanhmuc']==$row_danhmuc['id_danhmuc']){
            ?>
           <option selected value="<?php echo $row_danhmuc['iddanhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
            <?php
            }else{
            ?>
            <option selected value="<?php echo $row_danhmuc['iddanhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
            <?php
            }
        }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td  style="text-align:left;font-weight:bold;font-style:italic;color:coral">Tình Trạng:</td>
     <td>
        <select class="form-control" name="tinhtrang">
            <?php
            if($row['tinhtrang'] ==1){
            ?>
           <option value="1" selected>Kích Hoạt</option>
           <option value="0">Ẩn</option>
           <?php
            }else{
           ?>
           <option value="1">Kích Hoạt</option>
           <option value="0" selected>Ẩn</option>
           <?php
            }
           ?>
        </select>
    </td>
</tr>
<tr>
    
    <td colspan="2"><input class="btn btn-success" type="submit" name="suasanpham" value="Sửa" style="background-color:coral;border-radius:12px;border-style:dotted"></td>
</tr>
</form>
<?php 
}
?>
</table>
