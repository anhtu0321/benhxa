<?php
date_default_timezone_get("Asia/Ho_Chi_Minh");
$server = "localhost";
$user = "root";
$pass = "tuanninh1";
$database = "benhxa";
$con = mysqli_connect($server,$user,$pass);
mysqli_select_db($con,$database);
mysqli_set_charset($con, 'UTF8');
?>