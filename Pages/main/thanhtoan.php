<?php 
session_start();
include('../../Admin/config/config.php');
if(isset($_SESSION['cart']) && isset($_SESSION['nameUser'])) {
    $id_KH = $_SESSION['USERID'];
    
    // Kiểm tra xem đã tồn tại giỏ hàng cho khách hàng này chưa
    $select_cart = "SELECT * FROM tbl_cart WHERE id_khachhang = '".$id_KH."'";
    $result = mysqli_query($mysqli, $select_cart);
    
    if(mysqli_num_rows($result) > 0) {
        // Nếu đã tồn tại giỏ hàng, cập nhật thông tin
        $cart_data = mysqli_fetch_assoc($result);
        $code_order = $cart_data['code_cart'];
    } else {
        // Nếu chưa tồn tại, tạo mới mã đơn hàng
        $code_order = rand(0, 9999);
        // Thêm mới giỏ hàng cho khách hàng
        $insert_cart = "INSERT INTO tbl_cart(id_khachhang, code_cart, cart_status) VALUES('".$id_KH."','".$code_order."',1)";
        $cart_query = mysqli_query($mysqli, $insert_cart);
        if(!$cart_query) {
            // Xử lý lỗi khi thêm mới giỏ hàng không thành công
            // Ví dụ: ghi log lỗi, hiển thị thông báo lỗi
            exit("Lỗi khi thêm mới giỏ hàng.");
        }
    }
    
    // Thêm chi tiết giỏ hàng
    foreach($_SESSION['cart'] as $key => $value) {
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        
        // Kiểm tra xem chi tiết giỏ hàng đã tồn tại chưa
        $select_cart_details = "SELECT * FROM tbl_cart_details WHERE id_sanpham = '".$id_sanpham."' AND code_cart = '".$code_order."'";
        $result_details = mysqli_query($mysqli, $select_cart_details);
        
        if(mysqli_num_rows($result_details) > 0) {
            // Nếu đã tồn tại, cập nhật số lượng
            $update_cart_details = "UPDATE tbl_cart_details SET soluong = soluong + '".$soluong."' 
                                    WHERE id_sanpham = '".$id_sanpham."' AND code_cart = '".$code_order."'";
            $cart_details_query = mysqli_query($mysqli, $update_cart_details);
            if(!$cart_details_query) {
                // Xử lý lỗi khi cập nhật chi tiết giỏ hàng không thành công
                // Ví dụ: ghi log lỗi, hiển thị thông báo lỗi
                exit("Lỗi khi cập nhật chi tiết giỏ hàng.");
            }
        } else {
            // Nếu chưa tồn tại, thêm mới chi tiết giỏ hàng
            $insert_cart_details = "INSERT INTO tbl_cart_details(id_sanpham, code_cart, soluong) 
                                    VALUES('".$id_sanpham."','".$code_order."','".$soluong."')";
            $cart_details_query = mysqli_query($mysqli, $insert_cart_details);
            if(!$cart_details_query) {
                // Xử lý lỗi khi thêm mới chi tiết giỏ hàng không thành công
                // Ví dụ: ghi log lỗi, hiển thị thông báo lỗi
                exit("Lỗi khi thêm mới chi tiết giỏ hàng.");
            }
        }
    }
    
    // Xóa session giỏ hàng sau khi thêm thành công
    unset($_SESSION['cart']);
    header('Location:../../index.php?quanly=checkout');
} else {
    // Xử lý khi session giỏ hàng hoặc IDCustomer không tồn tại
    // Ví dụ: hiển thị thông báo lỗi
    exit("Session giỏ hàng hoặc IDCustomer không tồn tại.");
}


/*

*/
?>
