<?php
session_start();
if(!empty($_POST)){
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    $newpass=$_POST["newpass"];
    $sql = "SELECT * FROM tbl_taikhoan 
    LEFT JOIN tbl_khachhang
        ON tbl_taikhoan.USERID = tbl_khachhang.USERID_KH
    LEFT JOIN tbl_nhanvien
        ON tbl_taikhoan.USERID = tbl_nhanvien.USERID_NV
";
require('../dbhelper.php');
$login=ReSultExecute($sql);
foreach($login as $log){
    if($log['USERNAME']==$user && $log['PASSWORD']==$pass &&$log['MAQUYEN']==0 && $log['enable']==1){
       $userId=$log['USERID'];
       $updatePassSQL = "UPDATE tbl_taikhoan SET PASSWORD='$newPass' WHERE USERID='$userID'";
       $updateResult=ReSultExecute($updatePassSQL);
       $_SESSION['nameUser']=$log['USERNAME'];
       $_SESSION['IDCustomer']=$log['MAKH'];
       echo 'success-user';
       break;
         if ($updateResult) {
                echo 'success-user'; // Thông báo thành công cho người dùng
            } else {
                echo 'error'; // Thông báo lỗi cho người dùng
            }
            break; // Dừng vòng lặp sau khi thực hiện xong
        } else {
            echo 'invalid'; // Thông báo mật khẩu cũ không chính xác
            break; // Dừng vòng lặp sau khi thông báo
        }
    }
}

?>