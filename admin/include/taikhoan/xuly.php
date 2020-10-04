<?php 
include("../../config.php");
session_start();
$form = "";
$id = "";
$username = "";
$password = "";
$fullname = "";

if(isset($_GET["form"])){$form = $_GET["form"];}
if(isset($_GET["id"])){$id = $_GET["id"];}
if(isset($_POST["username"])){$username = $_POST["username"];}
if(isset($_POST["password"])){$password = $_POST["password"];}
if(isset($_POST["fullname"])){$fullname = $_POST["fullname"];}

// Lấy thông tin phân quyền
$sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
$tbphanquyen = mysqli_query($con,$sqlphanquyen);
$rsphanquyen = mysqli_fetch_array($tbphanquyen);

if(isset($_POST["them"])){
    if($rsphanquyen["them"] == 1){
        $sql = "insert into users(username, password, fullname) values('$username','$password','$fullname')";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["sua"])){
    if($rsphanquyen["sua"]== 1){
        if($password == ""){
            $sql = "update users set username = '$username', fullname = '$fullname' where id = '$id'";
        }else{
            $sql = "update users set username = '$username', fullname = '$fullname', password = '$password' where id = '$id'";
        }
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["xoa"])){
    if($rsphanquyen["xoa"]== 1){
        $sql = "delete from users where id = '$id'";
        mysqli_query($con,$sql);
        header("location: ../../index.php?form=".$form);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
if(isset($_POST["capnhat"])){
    if($rsphanquyen["sua"]== 1){
        $sql = "select id from chucnang order by thutu ASC";
        $tb = mysqli_query($con,$sql);$i=0;
        $xem=0;
        $them=0;
        $sua=0;
        $xoa=0;
        while($rs = mysqli_fetch_array($tb)){
            if(isset($_POST["xem".$i])){$xem = $_POST["xem".$i];}else{$xem=0;}
            if(isset($_POST["them".$i])){$them = $_POST["them".$i];}else{$them=0;}
            if(isset($_POST["sua".$i])){$sua = $_POST["sua".$i];}else{$sua=0;}
            if(isset($_POST["xoa".$i])){$xoa = $_POST["xoa".$i];}else{$xoa=0;}
            $sql1 = "select 1 from phanquyen where user = '$id' and form ='$rs[id]'";
            $tb1 = mysqli_query($con,$sql1);
            if(mysqli_num_rows($tb1)>0){
                $sql = "update phanquyen set xem = '$xem',them = '$them',sua = '$sua',xoa = '$xoa' where user = '$id' and form = '$rs[id]'";
            }else{
                $sql = "insert into phanquyen(user,form, xem, them, sua, xoa) values('$id', '$rs[id]','$xem','$them','$sua','$xoa')";
            }
            mysqli_query($con,$sql); 
            $i++;
        }
        header("location: ../../index.php?form=".$form."&act=edit&id=".$id);
    }else{
        header("location: ../../index.php?form=".$form."&false=false");
    }
}
?>
