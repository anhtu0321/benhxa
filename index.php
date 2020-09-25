<?php 
session_start();
include("admin/config.php");
$sql = "select id, tenmuctin, thutu from muctin where trangthai = 1 order by thutu ASC";
$tbmuctin = mysqli_query($con,$sql);
$mangmuctin = array();
while($rsmuctin = mysqli_fetch_array($tbmuctin)){
    $mangmuctin[] = array('id' => $rsmuctin["id"], 'tenmuctin' => $rsmuctin["tenmuctin"], 'thutu' => $rsmuctin["thutu"]); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website nội bộ Công an tỉnh Hưng Yên</title>
</head>
<link rel="stylesheet" type="text/css" href="style/bootstrap341/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<body>
    
        <div class="container wraper">
            <?php include("include/banner.php");?>
            <?php include("include/menu.php");?>
            <?php include("include/main.php");?>
        </div>
            <div class="container-fluid">
        <?php include("include/footer.php");?>
</div>
 
</body>
<script src="style/bootstrap341/js/jquery.js"></script>
<script src="style/bootstrap341/js/popper.min.js"></script>
<script type="text/javascript" src="style/bootstrap341/js/bootstrap.min.js"></script>
<script type="text/javascript" src="style/myjs.js"></script>
</html>