
<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ PHIẾU KHÁM SỨC KHỎE ĐỊNH KỲ
</div>
<?php
    // $sql = "select benhnhan.id, benhnhan.hoten, benhnhan.namsinh, benhnhan.gioitinh, benhnhan.sohieu, benhnhan.chucvu, benhnhan.nhommau, donvi.tendv, chucvu.tenchucvu from benhnhan left join donvi on benhnhan.donvi = donvi.id left join chucvu on benhnhan.chucvu = chucvu.id order by benhnhan.id desc limit 10";
    // $tbbenhnhan= mysqli_query($con,$sql);
    $sql = "select id, tendv from donvi order by khoi asc, tt asc";
    $tbdonvi= mysqli_query($con,$sql);
    $sql = "select id, tenchucvu from chucvu order by capdo asc, id asc";
    $tbchucvu= mysqli_query($con,$sql);
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
        include("lietke.php");
    }else if($act == "add"){
        include("them.php");
        include("lietke.php");
    }else{
        include("locketqua.php");
    }
    // include("lietke.php");
?>