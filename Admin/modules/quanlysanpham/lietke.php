<?php

if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
    $sql_lietkesanpham = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.iddanhmuc AND (tbl_sanpham.tensanpham LIKE '%$tukhoa%' OR tbl_sanpham.masp LIKE '%$tukhoa%' OR tbl_sanpham.giasp LIKE '%$tukhoa%' OR tbl_danhmuc.tendanhmuc LIKE '%$tukhoa%') ORDER BY id_sanpham DESC";
} else {
    $sql_lietkesanpham = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.iddanhmuc ORDER BY id_sanpham DESC";
}

$querry_lietkesp = mysqli_query($mysqli,$sql_lietkesanpham);
$so_san_pham_moi_trang = 5;

// Trang hiện tại, mặc định là 1
$trang_hien_tai = isset($_GET['trang']) ? $_GET['trang'] : 1;

// Tính offset để truy vấn cơ sở dữ liệu
$offset = ($trang_hien_tai - 1) * $so_san_pham_moi_trang;

// Truy vấn cơ sở dữ liệu với phân trang
$sql_lietkesanpham_paginated = $sql_lietkesanpham . " LIMIT $offset, $so_san_pham_moi_trang";
$querry_lietkesp_paginated = mysqli_query($mysqli, $sql_lietkesanpham_paginated);

// Đếm tổng số sản phẩm
$sql_count_total = "SELECT COUNT(*) AS total FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.iddanhmuc";
$result_total = mysqli_query($mysqli, $sql_count_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_products = $row_total['total'];

// Tính tổng số trang
$total_pages = ceil($total_products / $so_san_pham_moi_trang);
?>
<div style="text-align: center;">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="<?php if ($i == $trang_hien_tai) echo 'active'; ?>">
                <a href="index.php?action=quanlysanpham&query=them&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
  <form action="index.php?action=quanlysanpham&query=them&trang=<?php echo $i; ?>" method="POST" style="text-align: center;">
        <input class="form-control" type="text" name="tukhoa" placeholder="Search" class="form-control">
        <button type="submit" name="timkiem"><i class="fa fa-search"></i></button>
    </form>
<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Liệt Kê Sản Phẩm</p>
<table style="width: 90%;" border="1",style="border-collapse:collapse">
<tr>
     <th>Id</th>
    <th>Tên Sản Phẩm</th>
    <th>Mã Sản Phẩm</th>
    <th>Giá sản phẩm</th>
    <th>ID Danh Mục</th>
    <th>Hình Ảnh</th>
    <th>Tóm Tắt</th>
    <th>Tình Trạng</th>
    <th>Quản Lý </th>
</tr>

<?php
$i=0;
while($row=mysqli_fetch_array($querry_lietkesp_paginated)){
$i++;
?>
<tr>
<td><?php echo $i?></td>
    <td><?php echo $row['tensanpham']?></td>
    <td><?php echo $row['masp']?></td>
    <td><?php echo $row['giasp']?></td>
    <td><?php echo $row['id_danhmuc']?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>" width="150px"></td>
    <td><?php echo $row['tomtat']?></td>
    <td><?php  if($row['tinhtrang']==1){
        echo 'Kích Hoạt';
    }
    else{
        echo 'Ẩn';
    }
    ?></td>
    <td><a class="btn btn-danger" href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa</a>|<a class="btn btn-success" href="?action=quanlysanpham&query=sua&id_sanpham=<?php echo $row['id_sanpham']?>">Sửa</a></td>
    
</tr>
<?php
}
?>
</table> 

