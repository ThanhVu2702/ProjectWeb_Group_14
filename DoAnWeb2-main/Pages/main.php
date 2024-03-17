  
        
       <?php 
       if(isset($_GET['quanly'])){
        $pivot=$_GET['quanly'];
       }
       else{
        $pivot=' ';
        include('./Pages/main_slider.php');
        include('./Pages/newsletter.php');
        include('./Pages/categorylayout.php');
       }
       if($pivot=="danhmucsanpham"){
        include("./Pages/main/danhmucsanpham.php");
       }else if($pivot=="sanpham"){
          include("./Pages/main/sanpham.php");
       }else if($pivot=="giohang")
       {
        include("./Pages/main/giohang.php");
       }
       else if($pivot=="checkout")
       {
        include("./Pages/main/checkout.php");
       }else if($pivot=="myaccount")
       {
        include("Admin/index.php");
       }
       ?>
        
       
        