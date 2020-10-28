<?php 
    session_start();
    if($_SESSION["user_huye_id"] == ""){header("location: login.php");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHẦN MỀM QUẢN LÝ HỒ SƠ C1</title>
</head>
<link rel="stylesheet" type="text/css" href="style/bootstrap341/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<body>
    <?php include("admin/config.php");?>
    <?php include("include/banner.php");?>
   
    <?php include("include/menu.php");?>
   
    <?php include("include/main.php");?>
    <?php include("include/footer.php");?>
</body>
<script src="style/bootstrap341/js/jquery.js"></script>
<script src="style/bootstrap341/js/popper.min.js"></script>
<script type="text/javascript" src="style/bootstrap341/js/bootstrap.min.js"></script>
<script type="text/javascript" src="style/myjs.js"></script>
</html>