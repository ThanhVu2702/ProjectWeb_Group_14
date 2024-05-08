<?php
//include("../../config/config.php");
$mysqli=new mysqli("localhost","root","","webmysqli");
mysqli_set_charset($mysqli,"utf8");
if($mysqli->connect_errno){
    echo "Failed to connect to MySQL:" . $mysqli->connect_errno;
    exit();
}
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
    $sql_timkiem = "SELECT * FROM  tbl_danhmuc WHERE tendanhmuc LIKE '%" . $tukhoa . "'";
    // Make sure $mysqli is initialized and connected
    $querry_timkiem = mysqli_query($mysqli, $sql_timkiem);
}else{
    $sql_lietkedanhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    // Make sure $mysqli is initialized and connected
    $querry_lietkedanhmuc = mysqli_query($mysqli, $sql_lietkedanhmucsp);
}
?>
<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Liệt Kê Sản Phẩm</p>
<table style="width: 90%;" border="1",style="border-collapse:collapse">
<tr>
     <th>Thứ Tự</th>
    <th>Tên Danh Mục</th>
    <th>Quản Lý</th>
</tr>
<?php
$i=0;
$querry = isset($querry_timkiem) ? $querry_timkiem : $querry_lietkedanhmuc;
while($row=mysqli_fetch_array($querry)){
$i++;
?>
<tr>
<td><?php echo $i?></td>
    <td><?php echo $row['tendanhmuc']?></td>
    <td><a class="btn btn-danger" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['iddanhmuc']?>">Xóa</a>|<a class="btn btn-success" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['iddanhmuc']?>">Sửa</a></td>
    
</tr>
<?php
}
?>
</table>
<div class="product-search">
    <form action="index.php?action=quanlydanhmucsanpham&query=them" method="POST">
        <input type="text" name="tukhoa" class="form-control" placeholder="Search">
        <button type="submit" name="timkiem"><i class="fa fa-search"></i></button>
    </form>
</div>