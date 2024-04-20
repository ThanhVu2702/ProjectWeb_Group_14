<?php
$mysqli=new mysqli("localhost","root","","webmysqli");
mysqli_set_charset($mysqli,"utf8");
if($mysqli->connect_errno){
    echo "Failed to connect to MySQL:" . $mysqli->connect_errno;
    exit();
}
?>