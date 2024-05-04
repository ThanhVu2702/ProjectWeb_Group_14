<p style="font-size:20px; text-align:center; color:coral; font-weight:bold">Thêm Sản Phẩm </p>
<table border="1" width="100%" style="border-collapse: collapse; border:5px solid coral">
<form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Tên Sản Phẩm:</td>
<td><input type="text" name="tensanpham" style="width:100%;"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Mã Sản Phẩm:</td>
<td><input type="text" name="masp" style="width:100%;"></td>
</tr>
<tr>
    <td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Giá Sản Phẩm:</td>
     <td><input type="text" name="giasp" style="width:100%"></td>
</tr>

<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Hình Ảnh </td>
<td><input type="file" name="hinhanh" style="width:100%;"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Nội dung:</td>
<td><textarea row="10" width="100%" name="noidung"  style="resize:none"></textarea></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;font-style:italic;color:coral">Tóm Tắt:</td>
<td><textarea row="10" width="100%" name="tomtat"  style="resize:none"></textarea></td>
</tr>
<tr>
    <td  style="text-align:left;font-weight:bold;font-style:italic;color:coral">Danh Mục Sản Phẩm:</td>
     <td>
        <select name="danhmuc">
            <?php 
            $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY iddanhmuc DESC";
            $querydanhmuc=mysqli_query($mysqli,$sql_danhmuc);
            while($row_danhmuc = mysqli_fetch_array($querydanhmuc)){
            ?>
           <option value="<?php echo $row_danhmuc['iddanhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
            <?php
            }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td  style="text-align:left;font-weight:bold;font-style:italic;color:coral">Tình Trạng:</td>
     <td>
        <select name="tinhtrang">
           <option value="1">Kích Hoạt</option>
           <option value="0">Ẩn</option>
        </select>
    </td>
</tr>
<tr>
    
    <td colspan="2"><input type="submit" name="themsanpham" value="Thêm" style="background-color:coral;border-radius:12px;border-style:dotted"></td>
</tr>
</form>
</table>
