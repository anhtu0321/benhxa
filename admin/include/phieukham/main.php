
<div class="col-sm-12 col-md-12 col-lg-12 title">
    QUẢN LÝ PHIẾU KHÁM SỨC KHỎE ĐỊNH KỲ
</div>
<?php
    $sql = "select phieukham.id, phieukham.nam, phieukham.phanloai, phieukham.bacsy, benhnhan.hoten, benhnhan.namsinh, benhnhan.sohieu, donvi.tendv, chucvu.tenchucvu from phieukham left join benhnhan on phieukham.benhnhan = benhnhan.sohieu left join donvi on phieukham.donvi = donvi.id left join chucvu on phieukham.chucvu = chucvu.id order by phieukham.id desc limit 10";
    $tbphieukham= mysqli_query($con,$sql);
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