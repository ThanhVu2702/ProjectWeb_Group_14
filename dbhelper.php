<?php
function execute($sql){
    require('Admin/config/config.php');
    mysqli_query($mysqli,$sql);
    require('Admin/config/Close_connect.php');
}
function ReSultExecute($sql){
    include('Admin/config/config.php');
    $resultSet=mysqli_query($mysqli,$sql) or die('Error:'.mysqli_error($mysqli));
   $list=[];
   while($row=mysqli_fetch_array($resultSet,1)){
     $list[]=$row;
   }
require_once('Admin/config/Close_connect.php');
return $list;
}
?>