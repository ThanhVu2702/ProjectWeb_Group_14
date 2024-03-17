<?php
/*
require('../dbhelper.php');
if(isset($_POST['USERID'])&& isset($_POST['enable'])){
    $USERID=$_POST['USERID'];
    $enable=$_POST['enable'];
    if($enable==1){
        $sql="UPDATE tbl_taikhoan SET  enable=0 WHERE USERID='$USERID'";
        execute($sql);
    }
    else{
        $sql="UPDATE tbl_taikhoan SET enable=1 WHERE USERID='$USERID'";
        execute($sql);
    }
   
}
*/
?>
<?php
$sql_enabletk="SELECT * FROM tbl_taikhoan WHERE USERID='$_GET[USERID]' LIMIT 1";
$querry_sua = mysqli_query($mysqli,$sql_enabletk);
?>
<p style="font-size:20px; text-align:center; color:coral; font-weight:bold">Sửa Tình Trạng</p>
<table border="1" width="50%" style="border-collapse: collapse;">
<form method="POST" action="modules/quanlytaikhoan/xuly.php?USERID=<?php echo $_GET['USERID']?>">
    <?php
    while($dongtk=mysqli_fetch_array($querry_sua)){
    ?>
<tr>
<td style="text-align:center">Tên Đăng Nhập</td>
<td><input type="text"  name="USERID" value="<?php echo $dongtk['USERID']?>"style="padding-right:30px" disabled></td>
</tr>
<tr>
    <td style="text-align:center">Hiện Trạng</td>
     <td><input type="text" name="enable" value="<?php echo $dongtk['enable']?>" style="padding-right:30px"></td>
</tr>
<tr>
    
    <td colspan="2"><input type="submit" name="suataikhoan" value="Sửa tài Khoản"></td>
</tr>
<?php
    }
    ?>
</form>
</table>