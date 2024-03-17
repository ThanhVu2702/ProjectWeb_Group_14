<?php
$sql_suadanhmucsp="SELECT * FROM tbl_danhmuc WHERE iddanhmuc='$_GET[iddanhmuc]' LIMIT 1";
$querry_suadanhmuc = mysqli_query($mysqli,$sql_suadanhmucsp);
?>
<p style="font-size:20px; text-align:center; color:coral; font-weight:bold">Sửa Danh Mục Sản Phẩm </p>
<table border="1" width="50%" style="border-collapse: collapse;">
<form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
    <?php
    while($dong=mysqli_fetch_array($querry_suadanhmuc)){
    ?>
<tr>
<td style="text-align:center">Tên Danh Mục</td>
<td><input type="text" name="tendanhmuc" value="<?php echo $dong['tendanhmuc']?>"style="padding-right:30px"></td>
</tr>
<tr>
    <td style="text-align:center">Thứ Tự</td>
     <td><input type="text" name="thutu" value="<?php echo $dong['thutu']?>" style="padding-right:30px"></td>
</tr>
<tr>
    
    <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
</tr>
<?php
    }
    ?>
</form>
</table>