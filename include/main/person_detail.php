<?php
    $id="";
    if(isset($_GET["id"])){$id = $_GET["id"];}
    $sql="select phieukham.nam, benhnhan.hoten, benhnhan.namsinh, benhnhan.gioitinh, benhnhan.sohieu, donvi.tendv, phieukham.cannang, 
    phieukham.chieucao, phieukham.huyetap, phieukham.mach, benhnhan.nhommau, phieukham.benhtiensu, phieukham.tuanhoan, 
    phieukham.hohap, phieukham.tieuhoa, phieukham.tietnieu, phieukham.noitiet, phieukham.thankinh, phieukham.xuongkhop, 
    phieukham.taimuihong, phieukham.ranghammat, phieukham.mat, phieukham.mau, phieukham.sieuam, phieukham.xqtimphoi, 
    phieukham.nuoctieu, phieukham.phanloai, phieukham.cacbenhtat, phieukham.bacsy, phieukham.nguoinhap, 
    phieukham.ngaynhap from phieukham left join benhnhan on phieukham.benhnhan = benhnhan.sohieu left join donvi 
    on phieukham.donvi = donvi.id where phieukham.id = '$id'";
    $tb = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($tb);
?>
<div class="phieu font-time">
    <div class="header-left">
        CÔNG AN TỈNH HƯNG YÊN</BR>
        <b>BỆNH XÁ CÔNG AN TỈNH</b>
    </div>
    <div class="header-right">
        <b>PHIẾU KHÁM SỨC KHỎE ĐỊNH KỲ</BR>
        NĂM <?php echo $rs["nam"];?>
        </b>
    </div>  
    <div class="xoa"></div>
    <div class="col-sm-12 coban">
        <p>- Họ và tên: <b><?php echo $rs["hoten"];?></b>, Năm sinh: <?php echo $rs["namsinh"];?>, Giới tính: <?php echo $rs["gioitinh"]?></p>
        <p>- Đơn vị đang công tác: <?php echo $rs["tendv"];?>, Số hiệu CA: <?php echo $rs["sohieu"];?></p>
        <p>- Cân nặng: <?php echo $rs["cannang"];?>, Chiều cao: <?php echo $rs["chieucao"];?></p>
        <p>- Huyết áp: <?php echo $rs["huyetap"];?>, Mạch: <?php echo $rs["mach"];?>, Nhóm máu: <?php echo $rs["nhommau"]?></p>
        <p>- Tiền sử bệnh tật: <?php echo $rs["benhtiensu"];?></p>
    </div>
    
    <table class="table table-condensed table-bordered tbphieu">
        <thead>
            <tr>
                <th width="78%">NỘI DUNG KHÁM</th>
                <th width="22%">Họ tên, chữ ký bác sỹ khám</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>1. Khám nội khoa:</b></td>
                <td></td>
            </tr>
            <tr>
                <td>- Tuần hoàn: <?php echo $rs["tuanhoan"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Hô hấp: <?php echo $rs["hohap"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Tiêu hóa: <?php echo $rs["tieuhoa"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Thận - Tiết niệu: <?php echo $rs["tietnieu"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Nội tiết: <?php echo $rs["noitiet"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Tâm - Thần kinh: <?php echo $rs["thankinh"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Cơ xương khớp: <?php echo $rs["xuongkhop"];?></td>
                <td></td>
            </tr>
            <tr>
                <td><b>2. Khám chuyên khoa:</b></td>
                <td></td>
            </tr>
            <tr>
                <td>- Tai - Mũi - Họng: <?php echo $rs["taimuihong"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Răng - Hàm - Mặt: <?php echo $rs["ranghammat"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Mắt: <?php echo $rs["mat"];?></td>
                <td></td>
            </tr>
            <tr>
                <td><b>3. Khám cận lâm sàng:</b></td>
                <td></td>
            </tr>
            <tr>
                <td>- Xét nghiệm máu: <?php echo $rs["mau"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Siêu âm: <?php echo $rs["sieuam"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Xquang tim phổi: <?php echo $rs["xqtimphoi"];?></td>
                <td></td>
            </tr>
            <tr>
                <td>- Xét nghiệm nước tiểu toàn phần: <?php echo $rs["nuoctieu"];?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="col-sm-12 coban">
        <p><b>4. Kết luận:</b></p>
        <p>- Phân loại sức khỏe: <?php echo $rs["phanloai"];?></p>
        <p>- Các bệnh tật (nếu có): <?php echo $rs["cacbenhtat"];?></p>
    </div>
    <div class="footer-left">
    </div>
    <div class="footer-right font-time">
        <i>Hưng Yên, ngày...... tháng...... năm <?php echo $rs["nam"]?></i><br/>
        <b>Bác sỹ kết luận</b>
        <br/>
        <br/>
        <br/>
        <br/>
        <b><?php echo $rs["bacsy"];?></b>
    </div>
</div>
<!-- XỬ LÝ TẠO FILE WORD     -->
<?php
$zip = new ZipArchive();
$filename_goc = 'phieugoc.docx';
$filename = 'phieu_down.docx';
// Copy một bản sao từ file gốc
copy($filename_goc, $filename);
// Mở file đã copy
if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    echo "Cannot open $filename :( "; die;
}
// Lấy nội dung text trong file
$xml = $zip->getFromName('word/document.xml');
 
// Dùng hàm str_replace để thay đổi text trong file
$xml = str_replace('nnnn', $rs["nam"], $xml);
$xml = str_replace('hoten', $rs["hoten"], $xml);
$xml = str_replace('sohieu', $rs["sohieu"], $xml);
$xml = str_replace('namsinh', $rs["namsinh"], $xml);
$xml = str_replace('gioitinh', $rs["gioitinh"], $xml);
$xml = str_replace('tendv', $rs["tendv"], $xml);
$xml = str_replace('chieucao', $rs["chieucao"], $xml);
$xml = str_replace('cannang', $rs["cannang"], $xml);
$xml = str_replace('huyetap', $rs["huyetap"], $xml);
$xml = str_replace('mach', $rs["mach"], $xml);
$xml = str_replace('nhnh', $rs["nhommau"], $xml);
$xml = str_replace('benhtiensu', $rs["benhtiensu"], $xml);
$xml = str_replace('tuanhoan', $rs["tuanhoan"], $xml);
$xml = str_replace('hohap', $rs["hohap"], $xml);
$xml = str_replace('tieuhoa', $rs["tieuhoa"], $xml);
$xml = str_replace('tietnieu', $rs["tietnieu"], $xml);
$xml = str_replace('noitiet', $rs["noitiet"], $xml);
$xml = str_replace('thankinh', $rs["thankinh"], $xml);
$xml = str_replace('xuongkhop', $rs["xuongkhop"], $xml);
$xml = str_replace('taimuihong', $rs["taimuihong"], $xml);
$xml = str_replace('ranghammat', $rs["ranghammat"], $xml);
$xml = str_replace('mmmm', $rs["mau"], $xml);
$xml = str_replace('mama', $rs["mat"], $xml);
$xml = str_replace('sieuam', $rs["sieuam"], $xml);
$xml = str_replace('xqtimphoi', $rs["xqtimphoi"], $xml);
$xml = str_replace('phanloai', $rs["phanloai"], $xml);
$xml = str_replace('cacbenhtat', $rs["cacbenhtat"], $xml);
$xml = str_replace('bacsy', $rs["bacsy"], $xml);
// Ghi lại nội dung đã được đổi vào file
if ($zip->addFromString('word/document.xml', $xml)) {  }
else { echo 'File not written.  Go back and add write permissions to this folder!'; }
 
//Đóng file
$zip->close();
?>
<div class="col-sm-10 text-right margin-top-5 margin-bottom-5">
    <button class="btn btn-sm btn-warning" onClick="history.go(-1);"><i class="glyphicon glyphicon-circle-arrow-left"></i> Quay lại</button>
    <a class="btn btn-sm btn-info" onclick = "window.open('inphieu.php?id=<?php echo $id;?>', 'windowChild', 'width=1000, height=800, top=30px, left=215px')" ><i class="glyphicon glyphicon-print"></i> In phiếu khám</a>
    <a class="btn btn-sm btn-success" href="<?php echo $filename;?>"><i class="glyphicon glyphicon-download-alt"></i> Tải File Word</a>
</div>
