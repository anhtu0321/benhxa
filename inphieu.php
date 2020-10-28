<body onload="window.print();">
    <link rel="stylesheet" type="text/css" href="style/bootstrap341/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <?php
        include("admin/config.php");
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
            <p>
            - Phân loại sức khỏe: 
            <?php 
                switch($rs["phanloai"]){
                    case 1:
                        echo "Loại I";
                    break;
                    case 2:
                        echo "Loại II";
                    break;
                    case 3:
                        echo "Loại III";
                    break;
                    case 4:
                        echo "Loại IV";
                    break;
                    case 5:
                        echo "Loại V";
                    break;
                    default:
                }
            ?>
        </p>
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
</body>