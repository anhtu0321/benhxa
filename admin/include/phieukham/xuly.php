<?php 
include("../../config.php");
session_start();
$form=""; $id=""; $nam="";
$hoten=""; $namsinh=""; $gioitinh=""; $sohieu= ""; $donvi= ""; $chucvu=""; $nhommau="";
$cannang=""; $chieucao=""; $huyetap=""; $mach=""; $benhtiensu=""; 
$tuanhoan= ""; $hohap=""; $tieuhoa= ""; $tietnieu=""; $noitiet=""; $thankinh=""; $xuongkhop=""; 
$taimuihong=""; $ranghammat=""; $mat= ""; 
$mau= ""; $sieuam=""; $xqtimphoi=""; $nuoctieu="";
$phanloai=""; $cacbenhtat=""; $bacsy=""; $nguoinhap= ""; $ngaynhap= date("Y-m-d"); 

if(isset($_GET["form"])){$form = $_GET["form"];}
if(isset($_GET["id"])){$id = $_GET["id"];}
if(isset($_POST["nam"])){$nam = $_POST["nam"];}
if(isset($_POST["hoten"])){$hoten = $_POST["hoten"];}
if(isset($_POST["namsinh"])){$namsinh = $_POST["namsinh"];}
if(isset($_POST["gioitinh"])){$gioitinh = $_POST["gioitinh"];}
if(isset($_POST["sohieu"])){$sohieu = $_POST["sohieu"];}
if(isset($_POST["donvi"])){$donvi = $_POST["donvi"];}
if(isset($_POST["chucvu"])){$chucvu = $_POST["chucvu"];}
if(isset($_POST["nhommau"])){$nhommau = $_POST["nhommau"];}
if(isset($_POST["cannang"])){$cannang = $_POST["cannang"];}
if(isset($_POST["chieucao"])){$chieucao = $_POST["chieucao"];}
if(isset($_POST["huyetap"])){$huyetap = $_POST["huyetap"];}
if(isset($_POST["mach"])){$mach = $_POST["mach"];}
if(isset($_POST["benhtiensu"])){$benhtiensu = $_POST["benhtiensu"];}
if(isset($_POST["tuanhoan"])){$tuanhoan = $_POST["tuanhoan"];}
if(isset($_POST["hohap"])){$hohap = $_POST["hohap"];}
if(isset($_POST["tieuhoa"])){$tieuhoa = $_POST["tieuhoa"];}
if(isset($_POST["tietnieu"])){$tietnieu = $_POST["tietnieu"];}
if(isset($_POST["noitiet"])){$noitiet = $_POST["noitiet"];}
if(isset($_POST["thankinh"])){$thankinh = $_POST["thankinh"];}
if(isset($_POST["xuongkhop"])){$xuongkhop = $_POST["xuongkhop"];}
if(isset($_POST["taimuihong"])){$taimuihong = $_POST["taimuihong"];}
if(isset($_POST["ranghammat"])){$ranghammat = $_POST["ranghammat"];}
if(isset($_POST["mat"])){$mat = $_POST["mat"];}
if(isset($_POST["mau"])){$mau = $_POST["mau"];}
if(isset($_POST["sieuam"])){$sieuam = $_POST["sieuam"];}
if(isset($_POST["xqtimphoi"])){$xqtimphoi = $_POST["xqtimphoi"];}
if(isset($_POST["nuoctieu"])){$nuoctieu = $_POST["nuoctieu"];}
if(isset($_POST["phanloai"])){$phanloai = $_POST["phanloai"];}
if(isset($_POST["cacbenhtat"])){$cacbenhtat = $_POST["cacbenhtat"];}
if(isset($_POST["bacsy"])){$bacsy = $_POST["bacsy"];}
if(isset($_SESSION["user_huye_name"])){$nguoinhap = $_SESSION["user_huye_name"];}

// Lấy thông tin phân quyền
    $sqlphanquyen = "select them, sua, xoa from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$form'";
    $tbphanquyen = mysqli_query($con,$sqlphanquyen);
    $rsphanquyen = mysqli_fetch_array($tbphanquyen);
// thực hiện thêm phiếu khám
if(isset($_POST["them"])){
    if($rsphanquyen["them"] == 1){
        $sql = "select hoten from benhnhan where sohieu = '$sohieu'";
        $tb = mysqli_query($con, $sql);
        if(mysqli_num_rows($tb)>0){
            $rs = mysqli_fetch_array($tb);
            if($rs["hoten"] == $hoten){
                $sql = "update benhnhan set namsinh = '$namsinh', gioitinh = '$gioitinh', donvi = '$donvi', chucvu = '$chucvu', nhommau = '$nhommau' where sohieu = '$sohieu'";
                mysqli_query($con,$sql);
                $sql = "insert into phieukham(nam,benhnhan,donvi,chucvu,cannang,chieucao,huyetap,mach,benhtiensu,tuanhoan,hohap,
                tieuhoa,tietnieu,noitiet,thankinh,xuongkhop,taimuihong,ranghammat,mat,mau,sieuam,xqtimphoi,nuoctieu,phanloai,
                cacbenhtat,bacsy,nguoinhap,ngaynhap) values('$nam','$sohieu','$donvi','$chucvu','$cannang','$chieucao','$huyetap','$mach','$benhtiensu','$tuanhoan','$hohap',
                '$tieuhoa','$tietnieu','$noitiet','$thankinh','$xuongkhop','$taimuihong','$ranghammat','$mat','$mau','$sieuam','$xqtimphoi','$nuoctieu','$phanloai',
                '$cacbenhtat','$bacsy','$nguoinhap','$ngaynhap')";
                mysqli_query($con,$sql);
                header("location: ../../index.php?form=".$form."&act=add");
            }else{ 
            ?>
                - Số hiệu Công an đã được sử dụng với tên bệnh nhân khác ! </br>
                - Bạn chỉ được phép sửa tên bệnh nhân trong phần Quản lý bệnh nhân !
                <!-- <a href="javascript:history.go(-1)">Quay lại</a>
                <a href="javascript:history.go(-1)">Back</a> -->
                <input type="button" value="Quay lại trang trước" onclick="window.history.go(-1)" />
            <?php
                }
            
        }else{
            $sql = "insert into benhnhan(hoten, namsinh, gioitinh, sohieu, donvi, chucvu, nhommau) values('$hoten','$namsinh','$gioitinh','$sohieu','$donvi','$chucvu','$nhommau')";
            mysqli_query($con,$sql);
            $sql = "insert into phieukham(nam,benhnhan,donvi,chucvu,cannang,chieucao,huyetap,mach,benhtiensu,tuanhoan,hohap,
            tieuhoa,tietnieu,noitiet,thankinh,xuongkhop,taimuihong,ranghammat,mat,mau,sieuam,xqtimphoi,nuoctieu,phanloai,
            cacbenhtat,bacsy,nguoinhap,ngaynhap) values('$nam','$sohieu','$donvi','$chucvu','$cannang','$chieucao','$huyetap','$mach','$benhtiensu','$tuanhoan','$hohap',
            '$tieuhoa','$tietnieu','$noitiet','$thankinh','$xuongkhop','$taimuihong','$ranghammat','$mat','$mau','$sieuam','$xqtimphoi','$nuoctieu','$phanloai',
            '$cacbenhtat','$bacsy','$nguoinhap','$ngaynhap')";
            mysqli_query($con,$sql);
            header("location: ../../index.php?form=".$form."&act=add");
        }
        
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
