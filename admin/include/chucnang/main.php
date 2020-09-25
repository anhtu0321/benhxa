

<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ CHỨC NĂNG
</div>
<?php 
    $act = "";
    if(isset($_GET["act"])){$act = $_GET["act"];}
    if ($act == "edit"){
        include("sua.php");
    }else{
        include("them.php");
    }
    include("lietke.php");
?>