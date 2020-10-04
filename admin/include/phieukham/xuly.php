<?php 
include("../../config.php");
session_start();
$form=""; $id=""; $hoten=""; $namsinh=""; $gioitinh=""; $sohieu= ""; $donvi= ""; $chucvu=""; $nhommau="";
if(isset($_GET["form"])){$form = $_GET["form"];}
if(isset($_GET["id"])){$id = $_GET["id"];}
if(isset($_POST["hoten"])){$hoten = $_POST["hoten"];}
if(isset($_POST["namsinh"])){$namsinh = $_POST["namsinh"];}
if(isset($_POST["gioitinh"])){$gioitinh = $_POST["gioitinh"];}
if(isset($_POST["sohieu"])){$sohieu = $_POST["sohieu"];}
if(isset($_POST["donvi"])){$donvi = $_POST["donvi"];}
if(isset($_POST["chucvu"])){$chucvu = $_POST["chucvu"];}
if(isset($_POST["nhommau"])){$nhommau = $_POST["nhommau"];}

if(isset($_SESSION["user_huye_name"])){$nguoinhap = $_SESSION["user_huye_name"];}

if(isset($_GET["filename"])){$filename = $_GET["filename"];}

// Lấy thông tin phân quyền
    $sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
    $tbphanquyen = mysqli_query($con,$sqlphanquyen);
    $rsphanquyen = mysqli_fetch_array($tbphanquyen);
// thực hiện thêm bệnh nhân
if(isset($_POST["them"])){
    if($rsphanquyen["them"] == 1){
        $sql = "insert into benhnhan(hoten, namsinh, gioitinh, sohieu, donvi, chucvu, nhommau) values('$hoten','$namsinh','$gioitinh','$sohieu','$donvi','$chucvu','$nhommau')";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form."&act=add");
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        $sql = "update benhnhan set hoten = '$hoten', namsinh = '$namsinh', gioitinh = '$gioitinh',sohieu = '$sohieu',donvi = '$donvi', chucvu = '$chucvu', nhommau = '$nhommau' where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        $sql = "delete from benhnhan where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
