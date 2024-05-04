<?php
include("../../config/config.php");
$tenloaisp=$_POST['tendanhmuc'];
$thutu=$_POST['thutu'];
if(isset($_POST['themdanhmuc'])){
    $sql_them="INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}
elseif(isset($_POST['suadanhmuc'])){
 
$sql_sua="UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."',thutu='".$thutu."' WHERE iddanhmuc='$_GET[iddanhmuc]'";
mysqli_query($mysqli,$sql_sua);
header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');

}else{
    $id=$_GET['iddanhmuc'];
    $sql_xoa="DELETE from tbl_danhmuc WHERE iddanhmuc='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
}

// if(isset($_POST['timkiem'])){
//     $tukhoa=$_POST['tukhoa'];
//     $sql_timkiem="SELECT * FROM  tbl_danhmuc WHERE tendanhmuc  LIKE '%".$tukhoa."' " ;
//      mysqli_query($mysqli,$sql_timkiem);
//     header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
// }
?>