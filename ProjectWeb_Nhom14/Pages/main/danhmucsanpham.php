 <?php 
// if(isset($_GET['trang'])){
//     $page=$_GET['trang'];
// }else{
//     $page='';
// }
// if($page==''||$page==1){
//     $begin=0;
// }
// else{
//     $begin=($page*3)-3;
// } 

$soSanPhamTrenTrang = 3;

// Lấy trang hiện tại từ tham số GET, nếu không có thì mặc định là trang 1
$trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;

// Tính chỉ số bắt đầu của sản phẩm trên trang hiện tại
$batDau = ($trangHienTai - 1) * $soSanPhamTrenTrang;

// Lấy danh mục từ tham số GET
$idDanhMuc = isset($_GET['id']) ? $_GET['id'] : '';

// Truy vấn để lấy tổng số lượng sản phẩm trong danh mục
$sql_count = "SELECT COUNT(*) AS total FROM tbl_sanpham WHERE id_danhmuc = '$idDanhMuc'";
$query_count = mysqli_query($mysqli, $sql_count);
$row_count = mysqli_fetch_assoc($query_count);
$totalSanPham = $row_count['total'];

// Tính số trang
$tongSoTrang = ceil($totalSanPham / $soSanPhamTrenTrang);
$minPrice = isset($_GET['min_price']) ? $_GET['min_price'] : 0;
$maxPrice = isset($_GET['max_price']) ? $_GET['max_price'] : 999999999;
// Truy vấn lấy sản phẩm trong danh mục với phân trang
$sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE id_danhmuc = '$idDanhMuc'AND giasp >= $minPrice AND giasp <= $maxPrice AND tbl_sanpham.id_danhmuc=tbl_danhmuc.iddanhmuc ORDER BY id_sanpham DESC LIMIT $batDau, $soSanPhamTrenTrang";
$query_pro = mysqli_query($mysqli, $sql_pro);
$querysearch=mysqli_query($mysqli,$sql_pro);
$row_search=mysqli_fetch_array($querysearch);
$query_pro=mysqli_query($mysqli,$sql_pro);
$sql_cate="SELECT *FROM  tbl_danhmuc Where  tbl_danhmuc.iddanhmuc='$_GET[id]' ";
$query_cate=mysqli_query($mysqli,$sql_cate);
$row_tiltle=mysqli_fetch_array($query_cate);

?>
     
    <body>
    
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"><?php echo $row_tiltle['tendanhmuc']?></a></li>
                    <li class="breadcrumb-item active">List:<?php echo $row_tiltle['tendanhmuc']?></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                                <form action="index.php?quanly=timkiem"  method="POST">
                                                <input type="text" name="tukhoa" placeholder="Search">
                                                <button type="submit" name="timkiem"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Newest</a>
                                                        <a href="#" class="dropdown-item">Popular</a>
                                                        <a href="#" class="dropdown-item">Most sale</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=0&max_price=50000" class="dropdown-item">$0 to $50</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=51000&max_price=100000" class="dropdown-item">$51 to $100</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=101000&max_price=150000" class="dropdown-item">$101 to $150</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=151000&max_price=200000" class="dropdown-item">$151 to $200</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=201000&max_price=250000" class="dropdown-item">$201 to $250</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=251000&max_price=300000" class="dropdown-item">$251 to $300</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=301000&max_price=350000" class="dropdown-item">$301 to $350</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=351000&max_price=400000" class="dropdown-item">$351 to $400</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=401000&max_price=450000" class="dropdown-item">$401 to $450</a>
                                                        <a href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $trangHienTai; ?>&min_price=451000&max_price=500000" class="dropdown-item">$451 to $500</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  while($row_pro=mysqli_fetch_array($query_pro)){ ?>
                            <div class="col-md-4">
                            <form method="POST" action="Pages/main/themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham']?>">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?php echo $row_pro['tensanpham']?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="#">
                                       
                                            <img src="<?php echo 'Admin/modules/quanlysanpham/uploads/'.$row_pro['hinhanh'] ?>" alt="Product Image">
                                           
                                        </a>
                                        <div class="product-action">
                                        <button class="btn" name="themgiohang" type="submit" >
                                         <i class="fa fa-shopping-cart"></i></button>
                                    <a href="Pages/main/themyeuthich.php?idsanpham=<?php echo $row_pro['id_sanpham']?>"><i class="fa fa-heart"></i></a>
                                      <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>"><i class="fa fa-search"></i></a>
                                </div>
                            </form>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span><?php echo number_format($row_pro['giasp']) ?></h3>
                                        <button class="btn" name="themgiohang" type="submit" ><i class="fa fa-shopping-cart"></i>Buy Now</button>
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <?php
                                    }
                                    ?>
                        </div>
                        
                        <!-- Pagination Start -->
 <div class="col-md-12">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo ($trangHienTai <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo ($trangHienTai - 1); ?>" tabindex="-1">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $tongSoTrang; $i++) { ?>
                <li class="page-item <?php echo ($i == $trangHienTai) ? 'active' : ''; ?>"><a class="page-link" href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
            <li class="page-item <?php echo ($trangHienTai >= $tongSoTrang) ? 'disabled' : ''; ?>">
                <a class="page-link" href="index.php?quanly=danhmucsanpham&id=<?php echo $idDanhMuc; ?>&trang=<?php echo ($trangHienTai + 1); ?>">Next</a>
            </li>
        </ul>
    </nav>
</div>
                        
                        <!-- Pagination Start -->
                    </div>           
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa-solid fa-sitemap"></i>Kids & Babies Clothes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
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
                                            <img src="img/product-10.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
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
                                            <img src="img/product-9.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                    <a href="Pages/main/themgiohang.php?idsanpham=<?php echo $row_sanpham1['id_sanpham']?>"><i class="fa fa-cart-plus"></i></a>
                                    <a href="Pages/main/themyeuthich.php?idsanpham=<?php echo $row_sanpham1['id_sanpham']?>"><i class="fa fa-heart"></i></a>
                                      <a href="index.php?quanly=sanpham&id=<?php echo $row_sanpham1['id_sanpham']?>"><i class="fa fa-search"></i></a>
                                </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
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
                                            <img src="img/product-8.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <li><a href="#">Nulla </a><span>(45)</span></li>
                                <li><a href="#">Curabitur </a><span>(34)</span></li>
                                <li><a href="#">Nunc </a><span>(67)</span></li>
                                <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                                <li><a href="#">Fusce </a><span>(89)</span></li>
                                <li><a href="#">Sagittis</a><span>(28)</span></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div>
        <!-- Brand End -->
    </body>
       
     
