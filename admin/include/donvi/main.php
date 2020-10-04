<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ ĐƠN VỊ
</div>
<?php 
    $sql = "select id, tendv, tendaydu, khoi, trangthai, tt from donvi order by khoi ASC, tt ASC";
    $tbdonvi = mysqli_query($con,$sql);
    $form = "";
    $act = "";
    $false = "";
    if(isset($_GET["form"])){$form = $_GET["form"];}
    if(isset($_GET["act"])){$act = $_GET["act"];}
    if(isset($_GET["false"])){$false = $_GET["false"];}
    if($false == "false"){
        include("false.php");
    }
    if ($act == "edit"){
        include("sua.php");
    }else{
        include("them.php");
    }
    include("lietke.php");
?>

