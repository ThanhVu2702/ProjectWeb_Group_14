<?php
if (isset($_POST['timkiem'])) {
    $tukhoa = $_POST['tukhoa'];
    $sql_lietkedstaikhoan = "SELECT * FROM tbl_taikhoan WHERE (tbl_taikhoan.USERNAME LIKE '%$tukhoa%' OR tbl_taikhoan.EMAIL LIKE '%$tukhoa%') ORDER BY USERID DESC ";
} else {
    $sql_lietkedstaikhoan = "SELECT * FROM tbl_taikhoan ORDER BY USERID DESC";
}
$querry_lietketaikhoan = mysqli_query($mysqli, $sql_lietkedstaikhoan);
$so_san_pham_moi_trang = 5;

// Trang hiện tại, mặc định là 1
$trang_hien_tai = isset($_GET['trang']) ? $_GET['trang'] : 1;

// Tính offset để truy vấn cơ sở dữ liệu
$offset = ($trang_hien_tai - 1) * $so_san_pham_moi_trang;

// Truy vấn cơ sở dữ liệu với phân trang
$sql_lietkedstaikhoan_paginated = $sql_lietkedstaikhoan . " LIMIT $offset, $so_san_pham_moi_trang";
$querry_lietkedstaikhoan_paginated = mysqli_query($mysqli, $sql_lietkedstaikhoan_paginated);

// Đếm tổng số sản phẩm
$sql_count_total = "SELECT COUNT(*) AS total FROM tbl_taikhoan";
$result_total = mysqli_query($mysqli, $sql_count_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_products = $row_total['total'];

// Tính tổng số trang
$total_pages = ceil($total_products / $so_san_pham_moi_trang);
?>

<form action="index.php?action=quanlytaikhoan&query=them" method="POST" style="text-align: center;">
    <input class="form-control" type="text" name="tukhoa" placeholder="Search" class="form-control">
    <button type="submit" name="timkiem"><i class="fa fa-search"></i></button>
</form>
<div style="text-align: center;">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <li class="<?php if ($i == $trang_hien_tai) echo 'active'; ?>">
                <a href="index.php?action=quanlytaikhoan&query=them&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</div>
<p style="font-size:20px;text-align:center; color:coral; font-weight:bold">Liệt Kê DS Tài Khoản</p>
<table style="width: 90%;" border="5" ,style="border-collapse:collapse">
    <tr>
        <th>USERID</th>
        <th>USERNAME</th>
        <th>PASSWORD</th>
        <th>Gmail</th>
        <th>Mã Quyền</th>
        <th>Hiện Trạng</th>
    </tr>
    <?php
    $i = 0;
    while ($row_tk = mysqli_fetch_array($querry_lietkedstaikhoan_paginated)) {
        $i++;
    ?>
        <tr>
            <td> <?php echo $i ?></td>
            <td><?php echo $row_tk['USERNAME'] ?></td>
            <td><?php echo $row_tk['PASSWORD'] ?></td>
            <td><?php echo $row_tk['EMAIL'] ?></td>
            <td><?php echo $row_tk['MAQUYEN'] ?></td>
            <td><?php echo $row_tk['enable'] ?></td>
            <td><a class="btn btn-success" href="?action=quanlytaikhoan&query=sua&USERID=<?php echo $row_tk['USERID'] ?>">Sửa</a></td>

        </tr>
    <?php
    }
    ?>
</table>



<!--
<div id="content-area_admin">
    <h2>Account manager</h2>
    <div id="content-list-admin">
        <div id="react-list-product">
            <div class="product-header__admin">
            <ol class="alternating-colors" style="list-style-type: style type none">
               <li>
                <strong class="username-account">USERNAME<strong>
             </li>
             <li>
                <strong class="password-account">PASSWORD</strong>
             </li>
             <li>
                <strong class="email-account">EMAIL</strong>
             </li>
             <li>
                <strong class="action-account">ENABLE</strong>
            </li>
        </ol>
            </div>
            <div id="container-product__admin">
                 User list -->
<?php
/*     require_once('../dbhelper.php');
                    $sql = "SELECT * FROM tbl_taikhoan";
                    $render_account = ReSultExecute($sql);
                    foreach ($render_account as $account) {
                        echo '
                            <div class="product-list__admin">
                            <ol class="alternating-colors">
                            <li>
                               <td><input type="text" name="username-account" value="'.$account['USERNAME'].'"style="padding-right:30px"></td>
                                </li>
                                <li>
                                <td><input type="text" name="username-account" value="'.$account['PASSWORD'].'"style="padding-right:30px"></td>
                                </li>
                                <li>
                        
                               <td><input type="email" name="email-account" value="'.$account['EMAIL'].'"style="padding-right:30px"></td>
                                </li>
                                <div class="action-account">
                                <input class="input-checked" onchange="handleCheckedUser('.$account['USERID'] .', '.$account['enable'].')" type="checkbox" '.($account['enable'] == 1 ? 'checked' : '').' />
                                </div>
                                </ol>
                            </div>
                        ';
                    }
                    */
?>

</div>
</div>
</div>
</div>

<script>
    /*
   const handleCheckedUser = (USERID, enable) => {
        console.log('USERID: ', USERID, 'enable: ', enable);
        $(document).ready(function() {
            $.ajax({
                url: 'enableAccount.php',
                type: 'POST',
                data: {
                    USERID: USERID,
                    enable: enable
                },
                success: function(data) {
                      console.log(data);
                    window.location.reload();
                }
            })
        })
    }
    */
</script>