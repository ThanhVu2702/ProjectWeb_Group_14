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
             <div class="col-md-8">
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
                                            <th class="btn btn-danger">Xóa</th>
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
                                               
                                                    <input type="text" value=" <?php echo $cart_item['soluong'];?>" />
                                                    
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
                                            <!-- <button type="submit" onclick="window.location.href='Pages/main/thanhtoan.php' " class="btn btn-primary">Place Order</button> -->
                                            <button  onclick="window.location.href='index.php?quanly=checkout'" class="btn btn-primary">Trang Thanh Toán</button>
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
             <div class="col-md-4">
                        <?php 
                        
                        if(isset($_POST['vanchuyen'])){
                             $name=$_POST['name'];
                             $phone=$_POST['phone'];
                             $email=$_POST['email'];
                             $note=$_POST['note'];
                             $dangky=$_SESSION['USERID'];
                             $sql_vanchuyen=mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,email,note,id_dangky) VALUES('$name','$phone','$email','$note','$dangky')");
                             if($sql_vanchuyen){
                               // unset($_SESSION['cart']);
                                echo '<script> alert("Insert successfully")</script>';
                               
                             }
                        }
                        elseif(isset($_POST['updatevanchuyen'])){
                            $name=$_POST['name'];
                            $phone=$_POST['phone'];
                            $email=$_POST['email'];
                            $note=$_POST['note'];
                            $dangky=$_SESSION['USERID'];
                            $sql_update_vanchuyen=mysqli_query($mysqli,"UPDATE tbl_shipping SET name='$name',phone='$phone',email='$email',note='$note',id_dangky='$dangky' 
                            WHERE id_dangky='$dangky'");
                            if($sql_update_vanchuyen){
                              // unset($_SESSION['cart']);
                               echo '<script> alert("Updated successfully")</script>';
                              
                            }
                        }
                        ?>
                        <div class="checkout-inner">
                            
                            <?php
                            $dangky=$_SESSION['USERID'];
                            $sql_getdata=mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky='$dangky' LIMIT 1");
                            $count=mysqli_num_rows($sql_getdata);
                            if($count>0){
                                $row_get_data=mysqli_fetch_array($sql_getdata);
                                $name=$row_get_data['name'];
                                $phone=$row_get_data['phone'];
                                $email=$row_get_data['email'];
                                $note=$row_get_data['note'];
                            }else{
                                $name="";
                                $phone="";
                                $email="";
                                $note="";
                            }
                            ?>
                            
                         <h4>Thông tin Vận Chuyển</h4>
                         
                  <form action="" autocomplete="off" method="POST">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="...."/>
                                
                            </div>
                            <div class="form-group">
                            <label for="Phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="...."/>
                            </div>
                            <div class="form-group">
                            <label for="Address">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo  $_SESSION['EMAIL']; ?>" placeholder="...."/>
                            </div>
                    
                            <div class="form-group">
                            <label for="note">note</label>
                                    <input type="text" name="note" class="form-control" value="<?php echo $note ?>" placeholder="...."/>
                            </div>
                            <?php
                            if($name==""&& $phone==""){
                            ?>
                            
                            <div class="checkout-btn">
                                <button  name="vanchuyen" onclick="window.location.href='index.php?quanly=checkout'" class="btn btn-primary" >Ghi Nhận Thông Tin</button>
                               </div>
                               <?php
                            }elseif($name!=""&& $phone!=""){
                               ?>
                                <div class="checkout-btn">
                                <button  name="updatevanchuyen" onclick="window.location.href='index.php?quanly=checkout'" class="btn btn-primary" >Cập Nhật  Thông Tin</button>
                               </div>
                               <?php
                            }
                               ?>
                       </form>
                        </div>
                    </div>    
            </div>
        </div>
        <!-- Checkout End -->