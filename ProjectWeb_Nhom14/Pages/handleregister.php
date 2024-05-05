<?php
session_start();
require('../dbhelper.php');
if(!empty($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sqlCheckAccount = "SELECT * FROM tbl_taikhoan";
    $checkAccount = ReSultExecute($sqlCheckAccount);
    $flagCheckAcc=true;
    foreach ($checkAccount as $account){
     if($username!= $account['USERNAME']) {
        $flagCheckAcc=true;
     }  else{
        echo json_encode(array("statusCode"=>201));
        $flagCheckAcc=false;
        break;
     }
    }
    if($flagCheckAcc){
        $sqlInsert = "INSERT INTO tbl_taikhoan(USERNAME, PASSWORD, EMAIL, MAQUYEN, enable)
        VALUES ('$username', '$password', '$email', 0, 1)";
        execute($sqlInsert);
        $sql = "INSERT INTO tbl_khachhang(USERID_KH, enable_kh) VALUES((SELECT USERID FROM tbl_taikhoan WHERE USERNAME = '$username'), 1)";
        execute($sql);
        $_SESSION['EMAIL']=$email;
        $_SESSION['USERNAME']=$username;
        $_SESSION['PASSWORD']=$password;
   
         echo json_encode(array("statusCode" => 200));
    }
}
?>