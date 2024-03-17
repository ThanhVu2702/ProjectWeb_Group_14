<?php 

//$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY tbl_danhmuc.iddanhmuc DESC";
$sql_pro="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.iddanhmuc ORDER BY tbl_sanpham.id_sanpham DESC";
$sql_pro2="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.iddanhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 50";
$query_pro=mysqli_query($mysqli,$sql_pro);
$row_tiltle=mysqli_fetch_array($query_pro);
$query_newpro=mysqli_query($mysqli,$sql_pro2);
/*$sql_ctsanpham1="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.iddanhmuc LIMIT 1";
 $query_chitiet=mysqli_query($mysqli,$sql_ctsanpham1);
 */
//$query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
// if($query_pro){
//     $row_tiltle=mysqli_fetch_array($query_pro);
// }else{
//  $row_tiltle= 'Hiện chưa Có Sản Phẩm';
// }

?>
  
  <!-- Feature Start-->
  
  <div class="feature">
            
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
       
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any queries</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+012-345-6789</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->       
        
        <!-- Featured Product Start -->
        
        <div class="featured-product product">
            <div class="container-fluid">
            <?php 
     //   while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
        ?>
                <div class="section-header">
                    <h1>Sản Phẩm Mới Nhất </h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                <?php 
        while($row_sanpham = mysqli_fetch_array($query_pro)){
            ?>
                <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#"><?php echo $row_sanpham['tensanpham'] ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="<?php echo 'Admin/modules/quanlysanpham/uploads/'.$row_sanpham['hinhanh'] ?>" alt="<?php echo $row_sanpham['tensanpham'] ?>">
                                </a>
                               
                                <div class="product-action">
                                    <a href="Pages/main/themgiohang.php?idsanpham=<?php echo $row_sanpham['id_sanpham']?>"><i class="fa fa-cart-plus"></i></a>
                                   
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="index.php?quanly=sanpham&id=<?php echo $row_sanpham['id_sanpham']?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                           
                            <div class="product-price">
                                <h3><?php echo number_format($row_sanpham['giasp'],0,',','.') ?></h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
            
                    </div>
                <?php 
            }
                 ?>
                </div>
                <?php 
        //}
        ?>
            </div>
        
        </div>
       
       
        <!-- Featured Product End -->    
         <!-- Recent Product Start -->
         <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Recent Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <?php
                    while($row_sanpham1=mysqli_fetch_array($query_newpro)){ 
                    ?>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#"><?php echo $row_sanpham1['tensanpham'] ?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="<?php echo 'Admin/modules/quanlysanpham/uploads/'.$row_sanpham1['hinhanh'] ?>" alt="<?php $row_sanpham['tensanpham'] ?>">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php echo number_format($row_sanpham1['giasp'],0,',','.') ?></h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                  <?php 
                    }
                  ?>
                </div>
            </div>
        </div>
        <!-- Recent Product End -->   