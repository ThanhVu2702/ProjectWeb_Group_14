<?php
include("../../config/config.php");
$tensp=$_POST['tensanpham'];
$masp=$_POST['masp'];
$giasp=$_POST['giasp'];
$soluong=$_POST['soluong'];
$hinhanh=$_FILES['hinhanh']['name'];
$temp_hinhanh=$_FILES['hinhanh']['tmp_name'];
$hinhanh_time = time().'_'.$hinhanh;
$noidung=$_POST['noidung'];
$tomtat=$_POST['tomtat'];
$tinhtrang=$_POST['tinhtrang'];
$danhmuc=$_POST['danhmuc'];


if(isset($_POST['themsanpham'])){
    $sql_them="INSERT INTO tbl_sanpham(tensanpham,masp,giasp,hinhanh,noidung,tomtat,tinhtrang,id_danhmuc) 
    VALUE('".$tensp."','".$masp."','".$giasp."','".$hinhanh_time."','".$noidung."','".$tomtat."','".$tinhtrang."','".$danhmuc."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($temp_hinhanh,'uploads/'.$hinhanh_time);
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
elseif(isset($_POST['suasanpham'])){
 if($hinhanh!=''){
    move_uploaded_file($temp_hinhanh,'uploads/'.$hinhanh_time);
   
$sql_sua="UPDATE tbl_sanpham SET tensanpham='".$tensp."',masp='".$masp."',giasp='".$giasp."',hinhanh='".$hinhanh_time."',noidung='".$noidung."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',
id_danhmuc='".$danhmuc."'
 WHERE id_sanpham='$_GET[id_sanpham]'";
 $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[id_sanpham]' LIMIT 1";
 $query=mysqli_query($mysqli,$sql);
 while($row=mysqli_fetch_array($query)){
     unlink('uploads/'.$row['hinhanh']);
 }

 }else{
    $sql_sua="UPDATE tbl_sanpham SET tensanpham='".$tensp."',masp='".$masp."',giasp='".$giasp."',noidung='".$noidung."',tomtat='".$tomtat."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."'
 WHERE id_sanpham='$_GET[id_sanpham]'";
 }
 mysqli_query($mysqli,$sql_sua);
header('Location:../../index.php?action=quanlysanpham&query=them');

}else{
    $id=$_GET['idsanpham'];
    $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
    $query=mysqli_query($mysqli,$sql);
    while($row=mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa="DELETE from tbl_sanpham WHERE id_sanpham='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
?>