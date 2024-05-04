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
                    <div class="col-lg-8">
                        <?php 
                        
                        if(isset($_POST['checkout'])){
                             $name=$_POST['name'];
                             $phone=$_POST['phone'];
                             $address=$_POST['address'];
                             $note=$_POST['note'];
                             $dangky=$_SESSION['IDCustomer'];
                             $payment=$_POST['payment'];
                             $sql_checkout=mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky,payment) VALUES('$name','$phone','$address','$note','$dangky','$payment')");
                             if($sql_checkout){
                                unset($_SESSION['cart']);
                                echo '<script> alert("Updated successfully")</script>';
                               
                             }
                            
                        }
                        ?>
                        <div class="checkout-inner">
                            <?php
                            $name=$_SESSION['nameUser'];
                            $sql_getdata=mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE name='$name' LIMIT 1");
                            $count=mysqli_num_rows($sql_getdata);
                            if($count>0){
                                $row_get_data=mysqli_fetch_array($sql_getdata);
                                $name=$row_get_data['name'];
                                $phone=$row_get_data['phone'];
                                $address=$row_get_data['address'];
                                $note=$row_get_data['note'];
                            }else{
                                $name="";
                                $phone="";
                                $address="";
                                $note="";
                            }
                            ?>
                         <h4>Thông tin thanh toán</h4>
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
                            <label for="Address">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="...."/>
                            </div>
                    
                            <div class="form-group">
                            <label for="note">note</label>
                                    <input type="text" name="note" class="form-control" value="<?php echo $note ?>" placeholder="...."/>
                            </div>
                           
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
                                            <input type="radio" class="custom-control-input" id="payment-5" name="payment" value="Chuyen Khoan">
                                            <label class="custom-control-label" for="payment-5">Cash on Delivery</label>
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                
                                <button type="submit" name="checkout" onclick="window.location.href='Pages/main/thanhtoan.php'">Place Order</button>
                                
                                </div>
                            </div>
                        </div>
                    
                     
                
            
                         </form>
                        </div>
                    </div>
                 
                   
            </div>
        </div>
        <!-- Checkout End -->