<?php
if(isset($_POST['timkiem'])){
  $tukhoa = $_POST['tukhoa'];
  $sql_lietkedsdonhang="SELECT * FROM tbl_cart,tbl_taikhoan WHERE tbl_cart.id_khachhang=tbl_taikhoan.USERID AND (tbl_taikhoan.USERNAME LIKE '%$tukhoa%' OR tbl_cart.code_cart LIKE '%$tukhoa%') ORDER BY tbl_taikhoan.USERID DESC";
}
  else{
  $sql_lietkedsdonhang="SELECT * FROM tbl_cart,tbl_taikhoan WHERE tbl_cart.id_khachhang=tbl_taikhoan.USERID ORDER BY tbl_taikhoan.USERID DESC";
  }

$querry_lietkedonhang = mysqli_query($mysqli,$sql_lietkedsdonhang);
$trang_hien_tai = isset($_GET['trang']) ? $_GET['trang'] : 1;
$so_san_pham_moi_trang = 5;
// Tính offset để truy vấn cơ sở dữ liệu
$offset = ($trang_hien_tai - 1) * $so_san_pham_moi_trang;

// Truy vấn cơ sở dữ liệu với phân trang
$sql_lietkedsdonhang_paginated = $sql_lietkedsdonhang . " LIMIT $offset, $so_san_pham_moi_trang";
$querry_lietkedsdonhang_paginated = mysqli_query($mysqli, $sql_lietkedsdonhang_paginated);

// Đếm tổng số sản phẩm
$sql_count_total = "SELECT COUNT(*) AS total FROM tbl_cart, tbl_taikhoan WHERE tbl_cart.id_khachhang=tbl_taikhoan.USERID ";
$result_total = mysqli_query($mysqli, $sql_count_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_products = $row_total['total'];

// Tính tổng số trang
$total_pages = ceil($total_products / $so_san_pham_moi_trang);
?>
<form action="index.php?action=quanlydonhang&query=them&trang=<?php echo $i; ?>" method="POST" style="text-align: center;">
        <input class="form-control" type="text" name="tukhoa" placeholder="Search" class="form-control">
        <button type="submit" name="timkiem"><i class="fa fa-search"></i></button>
    </form>
<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Danh Sách Đơn Hàng</p>
<table style="width: 90%;" border="6",style="border-collapse:collapse">
<div style="text-align: center;">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="<?php if ($i == $trang_hien_tai) echo 'active'; ?>">
                <a href="index.php?action=quanlydonhang&query=them&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
<tr>
     <th>Id</th>
     <th>Mã Đơn Hàng</th>
     <th>Tên Khách Hàng</th>
     <th>Email</th>
     <th>Tình Trạng</th>
     <th>Quản lý</th>
</tr>
<?php
$i=0;
while($row_dh=mysqli_fetch_array($querry_lietkedsdonhang_paginated)){
$i++;
?>
<tr>
<td><?php echo $i?></td>
    <td><?php echo $row_dh['code_cart']?></td>
    <td><?php echo $row_dh['USERNAME']?></td>
    <td><?php echo $row_dh['EMAIL']?></td>
    <td>
     <?php
     if($row_dh['cart_status']==1)
     {
       echo '<a href="modules/quanlydonhang/xuly.php?code='.$row_dh['code_cart'].'">New bill</a>';
     }
      else{
       echo 'Seen';
      }
     ?>
    </td>
    <td>
        <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row_dh['code_cart']?>">Xem Đơn Hàng</a>
    </td>
</tr>
<?php
}
?>
</table>
