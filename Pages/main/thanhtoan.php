<?php 
session_start();
include('../../Admin/config/config.php');
$id_KH=$_SESSION['IDCustomer'];
$code_order=rand(0,9999);
$insert_cart="INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('".$id_KH."','".$code_order."',1)";
$cart_query= mysqli_query($mysqli,$insert_cart);
if($cart_query){
    foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham=$value['id'];
        $soluong=$value['soluong'];
        $insert_cart_details="INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluong) 
         VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
         mysqli_query($mysqli,$insert_cart_details);
    }
    header('Location:../../index.php?quanly=checkout');
   
}
?>