<?php 
$sql_newpro="SELECT *FROM  tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.iddanhmuc ORDER BY tbl_sanpham.id_sanpham DESC";
$query_pro=mysqli_query($mysqli,$sql_newpro);
?>

<div class="category">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                    while($row_sanpham=mysqli_fetch_array($query_pro)){
                    ?>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                        <img src="<?php echo 'Admin/modules/quanlysanpham/uploads/'.$row_sanpham['hinhanh'] ?>">
                            <a class="category-name" href="">
                                <p><?php echo $row_sanpham['tendanhmuc'] ?></p>
                            </a>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>