<div class="clear"></div>
<div class="main">
    <?php
    if(isset($_GET['action'])&& $_GET['query']){
        $pivot=$_GET['action'];
        $query=$_GET['query'];
       }
       else{
        $pivot=' ';
        $query=' ';
       }
       if($pivot=="quanlydanhmucsanpham"&& $query=="them"){
        include("modules/quanlydanhmucsp/them.php");
        include("modules/quanlydanhmucsp/lietke.php");
        
       }elseif($pivot=="quanlydanhmucsanpham"&& $query=="sua"){
        include("modules/quanlydanhmucsp/sua.php");
       }
       elseif($pivot=="quanlysanpham"&& $query=="them"){
        include("modules/quanlysanpham/them.php");
        include("modules/quanlysanpham/lietke.php");
       }elseif($pivot=="quanlysanpham"&& $query=="sua"){
        include("modules/quanlysanpham/sua.php");
       }
       elseif($pivot=="quanlytaikhoan"&&$query=="them") {
        include("modules/quanlytaikhoan/them.php");
        include("modules/quanlytaikhoan/account.php");
       }elseif($pivot=="quanlytaikhoan"&& $query=="sua"){
        include("modules/quanlytaikhoan/sua.php");
       }
       elseif($pivot=="quanlydonhang" &&$query=="lietke"){
        include("modules/quanlydonhang/lietke.php");
       }
       elseif($pivot=="donhang"&&$query=="xemdonhang"){
        include("modules/quanlydonhang/xemdonhang.php");
       }
       
       
       else{
        include("modules/ThongKe/dashboard.php");
       }
    
    ?>
</div>