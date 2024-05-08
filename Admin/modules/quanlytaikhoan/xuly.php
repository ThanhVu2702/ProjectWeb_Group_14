<?php  
include('../../config/config.php');
$username=$_POST['USERNAME'];
$password=$_POST['PASSWORD'];
$email=$_POST['EMAIL'];
$idquyen=$_POST['MAQUYEN'];
$quyen=$_POST['enable'];

if(isset($_POST['themtaikhoan'])){
    $sql_them="INSERT INTO tbl_taikhoan(USERNAME,PASSWORD,EMAIL, MAQUYEN,enable) VALUE('".$username."','".$password."','".$email."','".$idquyen."','".$quyen."')";
    mysqli_query($mysqli,$sql_them);
   header('Location:../../index.php?action=quanlytaikhoan&query=them');
}
else if(isset($_POST['suataikhoan'])){
   if($quyen==0||$quyen==1){
   $sql_sua= "UPDATE tbl_taikhoan SET enable='".$quyen."' WHERE USERID='$_GET[USERID]'";
   mysqli_query($mysqli,$sql_sua);
   header('Location:../../index.php?action=quanlytaikhoan&query=them');
   }else{
    echo '<div class="alert alert-danger>Error</div>"';
    header('Location:../../index.php?action=quanlytaikhoan&query=sua');
   }
}
else{
    $id=$_GET['USERID'];
     $sql_xoa="DELETE from tbl_taikhoan WHERE USERID='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlytaikhoan&query=them');
}

/*
elseif(isset($_POST['suadanhmuc'])){
 
$sql_sua="UPDATE tbl_sanpham SET USERNAME='".$username."',PASSWORD='".$password."',EMAIL='".$email."',MAQUYEN='".$idquyen."',enable='".$quyen."' WHERE USERID='$_GET[USERID]'";
mysqli_query($mysqli,$sql_sua);
header('Location:../../index.php?action=quanlytaikhoan&query=them');


}
*/
?>