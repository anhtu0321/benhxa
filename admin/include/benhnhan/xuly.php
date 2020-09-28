<?php 
include("../../config.php");
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

if(isset($_POST["them"])){
    $sql = "insert into donvi(tendv, tendaydu, khoi, trangthai, tt ) values('$tendv','$tendaydu','$khoi','$trangthai','$tt')";
    mysqli_query($con,$sql);
    header("location: ../../index.php?form=".$form);
}
if(isset($_POST["sua"])){
    $sql = "update donvi set tendv = '$tendv', tendaydu = '$tendaydu', khoi = '$khoi', trangthai = '$trangthai', tt = '$tt' where id = '$id'";
    mysqli_query($con,$sql);
    header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
}
if(isset($_POST["xoa"])){
    $sql = "delete from donvi where id = '$id'";
    mysqli_query($con,$sql);
    header("location: ../../index.php?form=".$form);
}
?>
