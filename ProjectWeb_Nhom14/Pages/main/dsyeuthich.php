<?php 
if(isset($_SESSION['cart'])){
}

?>
  <!-- Breadcrumb Start -->
  <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">DS yêu thích</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Sản Phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng Tiền</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <?php 
                                        if(isset($_SESSION['cart'])){
                                            $i=0;
                                            $tongtien=0;
                                            foreach($_SESSION['cart'] as $cart_item){
                                                $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
                                                $tongtien+=$thanhtien;
                                                $i++;
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a href="#"><img src="<?php echo 'Admin/modules/quanlysanpham/uploads/'.$cart_item['hinhanh'] ?>" alt="Image"></a>
                                                    <p><?php echo $cart_item['tensanpham']; ?></p>
                                                </div>
                                            </td>
                                            <td>Giá Sản Phẩm: <?php echo number_format( $cart_item['giasp']).'vnd'; ?></td>
                                            <td>
                                                <div class="qty">
                                                  <a class="btn" style="width:30px;height:40px;font-size:14px;text-align: center;color: #ffffff; background: #FF6F61;border: none;border-radius: 4px 0 0 4px;" href="Pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>"> <i class="fa fa-minus"></i></a>
                                                    <input type="text" value=" <?php echo $cart_item['soluong'];?>" >
                                                    <a class="btn" style="width:30px;height:40px;font-size:14px;text-align: center;color: #ffffff; background: #FF6F61;border: none;border-radius: 4px 0 0 4px;" href="Pages/main/themyeuthich.php?congyt=<?php echo $cart_item['id']?>"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </td>
                                            <td>Thành Tiền:<?php echo number_format($thanhtien).'vnd'; ?></td>
                                            <td>  <a href="Pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xóa</a></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                            <tr>
                                            <td colspan="1">Tổng Tiền:<?php echo number_format($tongtien).'vnd';?>
                    
                                            </td>
                                          
                                            <a style="float:right" class="btn" href="Pages/main/themgiohang.php?xoatatca=1">Xóa Tất Cả</a>
                                       
                                        </tr>
                                       
                                            <?php
                                        }else{
                                        ?>
                                        <tr>
                                            <td colspan="6"><p>
                                            Danh sách yêu thích trống
                                        </p>
                                            </td>
                                           
                                           
                                        </tr>
                                        <?php 

                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Cart End -->