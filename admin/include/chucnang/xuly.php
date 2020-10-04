<?php 
include("../../config.php");
session_start();
$form="";
$id="";
$tenmenu="";
$tenthumuc ="";
$thutu ="";
$trangthai ="";
if(isset($_GET["form"])){$form = $_GET["form"];}
if(isset($_GET["id"])){$id = $_GET["id"];}
if(isset($_POST["tenmenu"])){$tenmenu = $_POST["tenmenu"];}
if(isset($_POST["tenthumuc"])){$tenthumuc = $_POST["tenthumuc"];}
if(isset($_POST["thutu"])){$thutu = $_POST["thutu"];}
if(isset($_POST["trangthai"])){$trangthai = $_POST["trangthai"];}

// Lấy thông tin phân quyền
$sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
$tbphanquyen = mysqli_query($con,$sqlphanquyen);
$rsphanquyen = mysqli_fetch_array($tbphanquyen);

if(isset($_POST["them"])){
    if($rsphanquyen["them"] == 1){
        $sql = "insert into chucnang(tenmenu, tenthumuc, thutu, trangthai) values('$tenmenu','$tenthumuc','$thutu','$trangthai')";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        $sql = "update chucnang set tenmenu = '$tenmenu', tenthumuc = '$tenthumuc', thutu = '$thutu', trangthai = '$trangthai' where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        $sql = "delete from chucnang where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>