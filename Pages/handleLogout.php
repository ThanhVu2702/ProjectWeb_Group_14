<?php 
session_start();
unset($_SESSION['nameUser']);
session_destroy();
header('Location:http://localhost/DoAnWeb2-main%20(1)/DoAnWeb2-main/index.php');
?>
