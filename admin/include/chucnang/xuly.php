<?php 
include("../../config.php");
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

if(isset($_POST["them"])){
    $sql = "insert into chucnang(tenmenu, tenthumuc, thutu, trangthai) values('$tenmenu','$tenthumuc','$thutu','$trangthai')";
    mysqli_query($con,$sql);
    header("location: ../../index.php?form=".$form);
}
if(isset($_POST["sua"])){
    $sql = "update chucnang set tenmenu = '$tenmenu', tenthumuc = '$tenthumuc', thutu = '$thutu', trangthai = '$trangthai' where id = '$id'";
    mysqli_query($con,$sql);
    header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
}
if(isset($_POST["xoa"])){
    $sql = "delete from chucnang where id = '$id'";
    mysqli_query($con,$sql);
    header("location: ../../index.php?form=".$form);
}
?>