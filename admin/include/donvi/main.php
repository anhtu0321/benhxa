<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ ĐƠN VỊ
</div>
<?php 
    $sql = "select id, tendv, tendaydu, khoi, tt from donvi where trangthai = 1 order by khoi ASC, tt ASC";
    $tbdonvi = mysqli_query($con,$sql);
    $act = "";
    if(isset($_GET["act"])){$act = $_GET["act"];}
    if ($act == "edit"){
        include("sua.php");
    }else{
        include("them.php");
    }
    include("lietke.php");
?>

