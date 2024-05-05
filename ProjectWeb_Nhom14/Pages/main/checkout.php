 <!-- Breadcrumb Start -->

 <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid"> 
            <div class="row">
     <form action="Pages/main/xulythanhtoan.php" method="POST">
        <div class="col-md-10">
                <div class="cart-page">
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
                                               
                                                    <input type="text" value=" <?php echo $cart_item['soluong'];?>" >
                                                    
                                                </div>
                                            </td>
                                            <td>Thành Tiền:<?php echo number_format($thanhtien).'vnd'; ?></td>
        
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                            <tr>
                                            <td colspan="1">Tổng Tiền:<?php echo number_format($tongtien).'vnd';?>
                    
                                            </td>
                                            <div class="checkout-btn">
                                            <button type="submit" onclick="window.location.href='Pages/main/thanhtoan.php'">Place Order</button>
                                            </div>
                                        </tr>
                                       
                                            <?php
                                        }else{
                                        ?>
                                     <tr>
                                            <td colspan="6"><p>
                                                Hiện Tại Giỏ Hàng Trống
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
             <div class="col-md-10">
              <div class="checkout-inner">
                            
                <?php
                            $id_dangky=$_SESSION['USERID'];
                            $sql_getdata=mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
                            $count=mysqli_num_rows($sql_getdata);
                            if($count>0){
                                $row_get_data=mysqli_fetch_array($sql_getdata);
                                $name=$row_get_data['name'];
                                $phone=$row_get_data['phone'];
                                $email=$_SESSION['EMAIL'];
                                $note=$row_get_data['note'];
                            }else{
                                $name="";
                                $phone="";
                                $email="";
                                $note="";
                            }
                            ?>
                         <h4>Thông tin thanh toán</h4>
                    
                        <ul>
                            <li>Name:<b><?php echo $name ?></b></li>
                            <li>Phone:<b><?php echo $phone ?></b></li>
                            <li>Address:<b><?php echo $email ?></b></li>
                            <li>Note:<b><?php echo $note ?></b></li>
                        </ul>
              </div>
             </div>
             <div class="col-md-16">
                        <div class="checkout-inner">
                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Payment Methods</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2" name="payment">
                                            <label class="custom-control-label" for="payment-2">Payoneer</label>
                                        </div>
                                        <div class="payment-content" id="payment-2-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Check Payment</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                            <label class="custom-control-label" for="payment-4">Direct Bank Transfer</label>
                                        </div>
                                        <div class="payment-content" id="payment-4-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5" name="payment" value="Chuyển Khoản">
                                            <label class="custom-control-label" for="payment-5">Chuyển Khoản</label>
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                
                                <button type="submit" name="" onclick="window.location.href='Pages/main/thanhtoan.php'">Thanh Toán</button>
                        
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>    
            </div>
        
        </div>
    </form>
    </div>
    </div>
                        </div>
        <!-- Checkout End -->