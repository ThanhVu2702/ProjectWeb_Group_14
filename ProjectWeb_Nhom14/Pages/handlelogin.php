<?php
session_start();
if(!empty($_POST)){
    $user=$_POST["user"];
    $pass=$_POST["pass"];
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
       $_SESSION['nameUser']=$log['USERNAME'];
       $_SESSION['IDCustomer']=$log['MAKH'];
       $_SESSION['USERID']=$log['USERID_KH'];
       echo 'success-user';
       break;
    }
    else if($log['USERNAME'] == $user && $log['PASSWORD'] == $pass && ($log['MAQUYEN'] == 1 || $log['MAQUYEN'] == 2) && $log['enable'] == 1){
        $_SESSION['nameUser'] = $log['USERNAME'];
        $_SESSION['role'] = $log['MAQUYEN'];
        $_SESSION['IDStaff'] = $log['MANV'];
        $_SESSION['USERID']=$log['USERID_NV'];
        echo 'success-admin';
        break;
    }else if($log['USERNAME'] !=$user){
         echo '';
    }
}
}
?>