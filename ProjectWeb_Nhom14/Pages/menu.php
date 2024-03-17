<?php
 $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY iddanhmuc DESC";
 $querydanhmuc=mysqli_query($mysqli,$sql_danhmuc); 
?>
<div class="navbar-nav mr-auto">
                      
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="index.php?quanly=giohang" class="nav-item nav-link">Cart</a>
                            <a href="index.php?quanly=checkout" class="nav-item nav-link">Checkout</a>
                            <a href="Pages/login.php" class="nav-item nav-link">Login </a>
                            <a href="Pages/register.php" class="nav-item nav-link"> Register</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Products</a>
                                <div class="dropdown-menu">
                                    <?php if(isset($_SESSION['cart'])){?>
                                    <a href="index.php?quanly=giohang" class="dropdown-item">Wishlist</a>
                                    <?php }else{?>
                                        <a href="#" class="dropdown-item">Wishlist</a>
                                        <?php }?> 
                                    <?php 
                                    while($row_danhmuc = mysqli_fetch_array($querydanhmuc)){
                                    ?>
                                    <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['iddanhmuc']?>" class="dropdown-item"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
                                    <?php
                                    }
                                    ?>
                
                                    <a href="index.php?quanly=ContactUs" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                            
                          
                              
                            
                        </div>
                        <div class="navbar-nav ml-auto">
                            <?php if(isset($_SESSION['nameUser'])):
                              ?>
                            <div class="nav-item dropdown">
                                <a href="../Pages/register.php" class="nav-link dropdown-toggle" data-toggle="dropdown">Hello:<?php echo $_SESSION['nameUser'];
                                ?></a>
                    
                                <div class="dropdown-menu">
                                <a href="Pages/changePass.php" class="dropdown-item">
                                    Đổi Mật Khẩu
                                </a>
                                    <a href="Pages/handleLogout.php" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                          
                            <?php else: ?>
                                <div class="nav-item dropdown">
                          <a href="http://localhost:8080/%C4%90%E1%BB%93%20%C3%81n%20Web2/Pages/login.php" class="dropdown-item">Login</a>
                                </div>
                        
                             </div>
                             
                        </div>
                        <?php endif; ?>