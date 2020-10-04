<?php 
include("../../config.php");
session_start();
$form = "";
$id = "";
$tendv = "";
$tendaydu = "";
$khoi = "";
$tt = "";
$trangthai = "";

if(isset($_GET["form"])){$form = $_GET["form"];}
if(isset($_GET["id"])){$id = $_GET["id"];}
if(isset($_POST["tendv"])){$tendv = $_POST["tendv"];}
if(isset($_POST["tendaydu"])){$tendaydu = $_POST["tendaydu"];}
if(isset($_POST["khoi"])){$khoi = $_POST["khoi"];}
if(isset($_POST["tt"])){$tt = $_POST["tt"];}
if(isset($_POST["trangthai"])){$trangthai = $_POST["trangthai"];}

// Lấy thông tin phân quyền
$sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
$tbphanquyen = mysqli_query($con,$sqlphanquyen);
$rsphanquyen = mysqli_fetch_array($tbphanquyen);

if(isset($_POST["them"])){
    if($rsphanquyen["them"] == 1){
        $sql = "insert into donvi(tendv, tendaydu, khoi, trangthai, tt ) values('$tendv','$tendaydu','$khoi','$trangthai','$tt')";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        $sql = "update donvi set tendv = '$tendv', tendaydu = '$tendaydu', khoi = '$khoi', trangthai = '$trangthai', tt = '$tt' where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        $sql = "delete from donvi where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
