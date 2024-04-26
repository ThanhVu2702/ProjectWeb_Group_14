<?php 
session_start();
unset($_SESSION['nameUser']);
session_destroy();
header('Location:http://localhost:8080/%C4%90%E1%BB%93%20%C3%81n%20Web2/index.php');
?>
