<?php
$id="";
if(isset($_GET["id"])){$id = $_GET["id"];}
$sql = "select benhnhan.hoten, benhnhan.namsinh, benhnhan.gioitinh, benhnhan.sohieu, phieukham.donvi, 
phieukham.chucvu, benhnhan.nhommau,phieukham.nam, phieukham.cannang, phieukham.chieucao, phieukham.huyetap,phieukham.mach,
phieukham.benhtiensu, phieukham.tuanhoan, phieukham.hohap, phieukham.tieuhoa, phieukham.tietnieu, phieukham.noitiet,
phieukham.thankinh, phieukham.xuongkhop, phieukham.taimuihong, phieukham.ranghammat, phieukham.mat, phieukham.mau,
phieukham.sieuam, phieukham.xqtimphoi, phieukham.nuoctieu, phieukham.phanloai, phieukham.cacbenhtat, phieukham.bacsy, 
phieukham.huongdieutri from phieukham left join benhnhan on phieukham.benhnhan = benhnhan.sohieu where phieukham.id = '$id'";
$tb = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($tb);
?>
<div class="col-sm-8 col-md-8 col-lg-8">
   <form action="include/phieukham/xuly.php?form=<?php echo $form;?>&id=<?php echo $id;?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <legend>Thông tin cơ bản</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Phiếu khám năm</label>
            <div class="col-sm-9">
                <input type="text" name="nam" class="form-control" value="<?php echo $rs["nam"]?>" placeholder="Năm">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Họ tên</label>
            <div class="col-sm-4">
                <input type="text" name="hoten" id="hoten" class="form-control" value="<?php echo $rs["hoten"]?>" placeholder="Họ tên">
            </div>
            <label for="" class="control-label col-sm-2">Số hiệu</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" value="<?php echo $rs["sohieu"]?>" placeholder="Số hiệu Công an" disabled>
                <input type="hidden" name="sohieu" value="<?php echo $rs["sohieu"]?>">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Năm sinh</label>
            <div class="col-sm-3">
                <input type="text" name="namsinh" id="namsinh" class="form-control" value="<?php echo $rs["namsinh"]?>" placeholder="Năm sinh">
            </div>
            <label for="" class="control-label col-sm-3">Giới tính</label>
           
            <div class="col-sm-3" style="padding:6px 0;">
                <input name="gioitinh" id="nam" type="radio" <?php if($rs["gioitinh"]=="Nam"){echo "checked='checked'";}?> value="Nam" /> Nam
                <input name="gioitinh" id="nu" type="radio" <?php if($rs["gioitinh"]=="Nữ"){echo "checked='checked'";}?> value="Nữ" /> Nữ
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Đơn vị</label>
            <div class="col-sm-3">
                <select name="donvi" id="donvi" class="form-control" placeholder="Đơn vị Công tác">
                    <?php
                        while ($rsdonvi = mysqli_fetch_array($tbdonvi)){
                    ?>
                            <option value="<?php echo $rsdonvi["id"];?>" <?php if($rs["donvi"] == $rsdonvi["id"]){echo "selected='selected'";}?>><?php echo $rsdonvi["tendv"];?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <label for="" class="control-label col-sm-3">Chức vụ</label>
            <div class="col-sm-3">
                <select name="chucvu" id="chucvu" class="form-control" placeholder="Chức vụ Công tác">
                    <?php
                        while ($rscv = mysqli_fetch_array($tbchucvu)){
                    ?>
                            <option value="<?php echo $rscv["id"];?>" <?php if($rs["chucvu"] == $rscv["id"]){echo "selected='selected'";}?>><?php echo $rscv["tenchucvu"];?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Cân nặng</label>
            <div class="col-sm-3">
                <input type="text" name="cannang" class="form-control" value="<?php echo $rs["cannang"]?>" placeholder="Cân nặng">
            </div>
            <label for="" class="control-label col-sm-3">Chiều cao</label>
            <div class="col-sm-3">
                <input type="text" name="chieucao" class="form-control" value="<?php echo $rs["chieucao"]?>" placeholder="Chiều cao">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Huyết áp</label>
            <div class="col-sm-3">
                <input type="text" name="huyetap" class="form-control" value="<?php echo $rs["huyetap"]?>" placeholder="Huyết áp">
            </div>
            <label for="" class="control-label col-sm-3">Mạch</label>
            <div class="col-sm-3">
                <input type="text" name="mach" class="form-control" value="<?php echo $rs["mach"]?>" placeholder="Mạch">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Nhóm máu</label>
            <div class="col-sm-3">
                <input type="text" name="nhommau" id="nhommau" class="form-control" value="<?php echo $rs["nhommau"]?>" placeholder="Nhóm máu">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tiền sử bệnh tật</label>
            <div class="col-sm-9">
                <input type="text" name="benhtiensu" class="form-control" value="<?php echo $rs["benhtiensu"]?>" placeholder="Tiền sử bệnh tật">
            </div>
        </div>
        <div class="form-group">
            <legend>Khám nội khoa</legend>
        </div>

        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tuần hoàn</label>
            <div class="col-sm-9">
                <input type="text" name="tuanhoan" class="form-control" value="<?php echo $rs["tuanhoan"]?>" placeholder="Tuần hoàn">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Hô hấp</label>
            <div class="col-sm-9">
                <input type="text" name="hohap" class="form-control" value="<?php echo $rs["hohap"]?>" placeholder="Hô hấp">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tiêu hóa</label>
            <div class="col-sm-9">
                <input type="text" name="tieuhoa" class="form-control" value="<?php echo $rs["tieuhoa"]?>" placeholder="Tiêu hóa">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Thận - Tiết niệu</label>
            <div class="col-sm-9">
                <input type="text" name="tietnieu" class="form-control" value="<?php echo $rs["tietnieu"]?>" placeholder="Thận - Tiết niệu">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Nội tiết</label>
            <div class="col-sm-9">
                <input type="text" name="noitiet" class="form-control" value="<?php echo $rs["noitiet"]?>" placeholder="Nội tiết">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tâm - Thần kinh</label>
            <div class="col-sm-9">
                <input type="text" name="thankinh" class="form-control" value="<?php echo $rs["thankinh"]?>" placeholder="Tâm - Thần kinh">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Cơ xương khớp</label>
            <div class="col-sm-9">
                <input type="text" name="xuongkhop" class="form-control" value="<?php echo $rs["xuongkhop"]?>" placeholder="Cơ xương khớp">
            </div>
        </div>
        <div class="form-group">
            <legend>Khám chuyên khoa</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tai - Mũi - Họng</label>
            <div class="col-sm-9">
                <input type="text" name="taimuihong" class="form-control" value="<?php echo $rs["taimuihong"]?>" placeholder="Tai - Mũi - Họng">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Răng - Hàm - Mặt</label>
            <div class="col-sm-9">
                <input type="text" name="ranghammat" class="form-control" value="<?php echo $rs["ranghammat"]?>" placeholder="Răng - Hàm - Mặt">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Mắt</label>
            <div class="col-sm-9">
                <input type="text" name="mat" class="form-control" value="<?php echo $rs["mat"]?>" placeholder="Mắt">
            </div>
        </div>
        <div class="form-group">
            <legend>Khám cận lâm sàng</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Xét nghiệm máu</label>
            <div class="col-sm-9">
                <input type="text" name="mau" class="form-control" value="<?php echo $rs["mau"]?>" placeholder="Xét nghiệm máu">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Siêu âm</label>
            <div class="col-sm-9">
                <input type="text" name="sieuam" class="form-control" value="<?php echo $rs["sieuam"]?>" placeholder="Siêu âm">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">X Quang tim phổi</label>
            <div class="col-sm-9">
                <input type="text" name="xqtimphoi" class="form-control" value="<?php echo $rs["xqtimphoi"]?>" placeholder="X Quang tim phổi">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">XN nước tiểu TP</label>
            <div class="col-sm-9">
                <input type="text" name="nuoctieu" class="form-control" value="<?php echo $rs["nuoctieu"]?>" placeholder="Xét nghiệm nước tiểu toàn phần">
            </div>
        </div>
        <div class="form-group">
            <legend>Kết luận</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Phân loại sức khỏe</label>
            <div class="col-sm-9">
                <select name="phanloai" class="form-control">
                        <option value="1" <?php if($rs["phanloai"]==1){echo "selected='selected'";}?>>Loại I</option>
                        <option value="2" <?php if($rs["phanloai"]==2){echo "selected='selected'";}?>>Loại II</option>
                        <option value="3" <?php if($rs["phanloai"]==3){echo "selected='selected'";}?>>Loại III</option>
                        <option value="4" <?php if($rs["phanloai"]==4){echo "selected='selected'";}?>>Loại IV</option>
                        <option value="5" <?php if($rs["phanloai"]==5){echo "selected='selected'";}?>>Loại V</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Các bệnh tật</label>
            <div class="col-sm-9">
                <input type="text" name="cacbenhtat" class="form-control" value="<?php echo $rs["cacbenhtat"]?>" placeholder="Các bệnh tật">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Bác sỹ kết luận</label>
            <div class="col-sm-9">
                <input type="text" name="bacsy" class="form-control" value="<?php echo $rs["bacsy"]?>" placeholder="Bác sỹ kết luận">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Hướng điều trị</label>
            <div class="col-sm-9">
                <select name="huongdieutri" class="form-control">
                        <option value="1" <?php if($rs["huongdieutri"] == "1"){echo "selected='selected'";}?>>Bệnh xá Công an tỉnh</option>
                        <option value="2"<?php if($rs["huongdieutri"] == "2"){echo "selected='selected'";}?>>Nơi ĐK khám chữa bệnh ban đầu</option>
                        <option value="3"<?php if($rs["huongdieutri"] == "3"){echo "selected='selected'";}?>>Bệnh viện 19.8</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary" name="sua">Cập nhật</button>
                <button type="submit" class="btn btn-danger" name="xoa" onclick="return confirm('Muốn xóa thật à?');">Xóa phiếu khám</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href = 'index.php?form=<?php echo $form;?>'">Quay lại</button>
                <!-- <a href = "javascript:history.back()">Back to previous page</a> -->
            </div>
        </div>
   </form>
</div>