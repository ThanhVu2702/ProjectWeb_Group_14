<?php
session_start();
include("../../Admin/config/config.php");
    if(!empty($_POST['size'])) {
        $selected = $_POST['size'];
        echo 'You have chosen: ' . $selected;
    } else {
        echo 'Please select the value.';
    }
if(isset($_GET['cong'])){
    $id=$_GET['cong'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            $selected = 'abc'
            if(!empty($_POST['size'])) {
                $selected = $_POST['size'];
                echo 'You have chosen: ' . $selected;
            } else {
                echo 'Please select the value.';
            }
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'size' => $selected, 'color' => $cart_item['color'],
            'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
            $_SESSION['cart']=$product;
            
    }else{
        $tangsoluong=$cart_item['soluong']+1;
        if($cart_item['soluong']<=9){
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,
            'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
        }
        else{
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],
            'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
        }
        $_SESSION['cart']=$product;
    }
}
header('Location:../../index.php?quanly=giohang');
}
if(isset($_GET['tru'])){
    $id=$_GET['tru'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],
            'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
            $_SESSION['cart']=$product;
    }else{
        $giamsoluong=$cart_item['soluong']-1;
        if($cart_item['soluong']>1){
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$giamsoluong,
            'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
        }
        else{
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],
            'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']);
        }
        $_SESSION['cart']=$product;
    }
}
header('Location:../../index.php?quanly=giohang');
}

if(isset($_SESSION['cart'])&&$_GET['xoa']){
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
        $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
        if($cart_item['id']!=$id){
            $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],
            'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']
           );

        }
        $_SESSION['cart']=$product;
        header('Location:../../index.php?quanly=giohang');
    }
}
//session_destroy();
    if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?quanly=giohang');
    }
    $id=$_GET['idsanpham'];
    $soluong=1;
    $sql="SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE id_sanpham='".$id."' LIMIT 1";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
    if($row){
        $new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,
        'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh']
        ));
        if(isset($_SESSION['cart'])){
            $found=false;
           foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']==$id)
            {
        $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,
        'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']
       );
             $found=true;
            }
            else{
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],
                'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh']
               );
            }
           }
           if($found==false){
            $_SESSION['cart']=array_merge($product,$new_product);
           }
           else{
            $_SESSION['cart']=$product;
           }
        }else{
         $_SESSION['cart']=$new_product;
        }
    }
    //print_r($_SESSION['cart'] );
   header('Location:../../index.php?quanly=giohang');
   

?>