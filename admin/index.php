<?php 
    session_start();
    if($_SESSION["user_huye_id"] == ""){header("location: login.php");}
    else{
        include("config.php"); 
        $sql = "select * from chucnang order by thutu ASC";
        $tbchucnang = mysqli_query($con,$sql);
        $mangchucnang = array();
        while($rs = mysqli_fetch_array($tbchucnang)){
            $mangchucnang[] = array('id'=>$rs["id"],'tenmenu'=>$rs["tenmenu"],'tenthumuc'=>$rs["tenthumuc"],'thutu'=>$rs["thutu"],'trangthai'=>$rs["trangthai"]);
        }
    }
    
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị Website</title>
</head>
<link href="../style/bootstrap341/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="ckfinder/ckfinder.js" type="text/javascript"></script>
<body>
    <div class="container wraper">
        <div class="row">
            <?php include("include/banner.php"); ?>
            <?php include("include/menu.php"); ?>
            <?php include("include/main.php"); ?>
            <?php include("include/footer.php"); ?>
        </div>
    </div>
    
</body>
<script src="../style/bootstrap341/js/jquery.js"></script>
<script src="../style/bootstrap341/js/popper.min.js"></script>
<script type="text/javascript" src="../style/bootstrap341/js/bootstrap.min.js"></script>
<script type="text/javascript" src="css/myjs.js"></script>
</html>