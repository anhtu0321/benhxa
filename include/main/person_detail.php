<?php
    // $id="";
    // if(isset($_GET["id"])){$id = $_GET["id"];}
    // $sql="select phieukham.nam, benhnhan.hoten, benhnhan.namsinh, benhnhan.gioitinh, benhnhan.sohieu, donvi.tendv, phieukham.cannang, 
    // phieukham.chieucao, phieukham.huyetap, phieukham.mach, benhnhan.nhommau, phieukham.benhtiensu, phieukham.tuanhoan, 
    // phieukham.hohap, phieukham.tieuhoa, phieukham.tietnieu, phieukham.noitiet, phieukham.thankinh, phieukham.xuongkhop, 
    // phieukham.taimuihong, phieukham.ranghammat, phieukham.mat, phieukham.mau, phieukham.sieuam, phieukham.xqtimphoi, 
    // phieukham.nuoctieu, phieukham.phanloai, phieukham.cacbenhtat, phieukham.bacsy, phieukham.nguoinhap, 
    // phieukham.ngaynhap from phieukham left join benhnhan on phieukham.benhnhan = benhnhan.sohieu left join donvi 
    // on phieukham.donvi = donvi.id where phieukham.id = '$id'";
    // $tb = mysqli_query($con,$sql);
    // $rs = mysqli_fetch_array($tb);
?>
<!-- <div class="phieu font-time">
    <div class="header-left">
        CÔNG AN TỈNH HƯNG YÊN</BR>
        <b>BỆNH XÁ CÔNG AN TỈNH</b>
    </div>
    <div class="header-right">
        <b>PHIẾU KHÁM SỨC KHỎE ĐỊNH KỲ</BR>
        NĂM <?php //echo $rs["nam"];?>
        </b>
    </div>
               
    <div class="col-sm-12 coban">
        <p>- Họ và tên: <?php //echo $rs["hoten"];?>, Năm sinh: <?php //echo $rs["namsinh"];?></p>
    </div>

</div>
<button onclick="window.print();">In phiếu khám</button> -->
<?php
$zip = new ZipArchive();
 
$Title = 'TẠO REPORT MS WORD THEO MẪU CỐ ĐỊNH THẬT ĐƠN GIẢN VỚI PHP';
$Content1 = 'Tôi đã tạo được report word!';
$Content2 = 'Report tôi tạo rất đẹp!';
 
$filename_goc = 'testfile.docx';
$filename = 'testfile_down.docx';
// Copy một bản sao từ file gốc
copy($filename_goc, $filename);
 
// Mở file đã copy
if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    echo "Cannot open $filename :( "; die;
}
// Lấy nội dung text trong file
$xml = $zip->getFromName('word/document.xml');
 
// Dùng hàm str_replace để thay đổi text trong file
$xml = str_replace('aaa', $Title, $xml);
$xml = str_replace('bbb', $Content1, $xml);
$xml = str_replace('ccc', $Content2, $xml);
 
// Ghi lại nội dung đã được đổi vào file
if ($zip->addFromString('word/document.xml', $xml)) { echo 'File written!'; }
else { echo 'File not written.  Go back and add write permissions to this folder!'; }
 
//Đóng file
$zip->close();
 
header('Location: '.$filename);
?>