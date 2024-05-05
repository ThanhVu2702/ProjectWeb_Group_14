  
        
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
       }elseif($pivot=="sanpham"){
          include("./Pages/main/sanpham.php");
       }elseif($pivot=="giohang")
       {
        include("./Pages/main/giohang.php");
       }
       elseif($pivot=="checkout")
       {
        include("./Pages/main/checkout.php");
       }elseif($pivot=="yeuthich")
       {
        include("./Pages/main/dsyeuthich.php");
       }
       elseif($pivot=="timkiem"){
        include("./Pages/main/timkiem.php");
       }
       elseif($pivot=="contact"){
         include("./Pages/main/contact.php");
       }
       elseif($pivot=="vanchuyen"){
        include("./Pages/main/vanchuyen.php");
       }
       elseif($pivot=="lichsudonhang"){
        include("./Pages/main/lichsudonhang.php");
       }
       elseif($pivot=="xemdonhang"){
        include("./Pages/main/xemdonhang.php");
       }
       ?>
        
       
        