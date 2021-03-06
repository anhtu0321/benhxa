
<div class="col-sm-8 col-md-8 col-lg-8">
   <form action="include/phieukham/xuly.php?form=<?php echo $form?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <legend>Thông tin cơ bản</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Phiếu khám năm</label>
            <div class="col-sm-9">
                <input type="text" name="nam" class="form-control" value="<?php echo date("Y")?>" placeholder="Họ tên">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Họ tên</label>
            <div class="col-sm-4">
                <input type="text" name="hoten" id="hoten" class="form-control" placeholder="Họ tên">
            </div>
            <label for="" class="control-label col-sm-2">Số hiệu</label>
            <div class="col-sm-3">
                <input type="text" name="sohieu" id="sohieu" class="form-control" placeholder="Số hiệu Công an">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Năm sinh</label>
            <div class="col-sm-3">
                <input type="text" name="namsinh" id="namsinh" class="form-control" placeholder="Năm sinh">
            </div>
            <label for="" class="control-label col-sm-3">Giới tính</label>
           
            <div class="col-sm-3" style="padding:6px 0;">
                <input name="gioitinh" id="nam" type="radio" checked="checked" value="Nam" /> Nam
                <input name="gioitinh" id="nu" type="radio" value="Nữ" /> Nữ
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Đơn vị</label>
            <div class="col-sm-3">
                <select name="donvi" id="donvi" class="form-control" placeholder="Đơn vị Công tác">
                    <?php
                        while ($rs = mysqli_fetch_array($tbdonvi)){
                    ?>
                            <option value="<?php echo $rs["id"];?>"><?php echo $rs["tendv"];?></option>
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
                            <option value="<?php echo $rscv["id"];?>"><?php echo $rscv["tenchucvu"];?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Cân nặng</label>
            <div class="col-sm-3">
                <input type="text" name="cannang" class="form-control" placeholder="Cân nặng">
            </div>
            <label for="" class="control-label col-sm-3">Chiều cao</label>
            <div class="col-sm-3">
                <input type="text" name="chieucao" class="form-control" placeholder="Chiều cao">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Huyết áp</label>
            <div class="col-sm-3">
                <input type="text" name="huyetap" class="form-control" placeholder="Huyết áp">
            </div>
            <label for="" class="control-label col-sm-3">Mạch</label>
            <div class="col-sm-3">
                <input type="text" name="mach" class="form-control" placeholder="Mạch">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Nhóm máu</label>
            <div class="col-sm-3">
                <input type="text" name="nhommau" id="nhommau" class="form-control" placeholder="Nhóm máu">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tiền sử bệnh tật</label>
            <div class="col-sm-9">
                <input type="text" name="benhtiensu" class="form-control" placeholder="Tiền sử bệnh tật">
            </div>
        </div>
        <div class="form-group">
            <legend>Khám nội khoa</legend>
        </div>

        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tuần hoàn</label>
            <div class="col-sm-9">
                <input type="text" name="tuanhoan" class="form-control" placeholder="Tuần hoàn">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Hô hấp</label>
            <div class="col-sm-9">
                <input type="text" name="hohap" class="form-control" placeholder="Hô hấp">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tiêu hóa</label>
            <div class="col-sm-9">
                <input type="text" name="tieuhoa" class="form-control" placeholder="Tiêu hóa">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Thận - Tiết niệu</label>
            <div class="col-sm-9">
                <input type="text" name="tietnieu" class="form-control" placeholder="Thận - Tiết niệu">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Nội tiết</label>
            <div class="col-sm-9">
                <input type="text" name="noitiet" class="form-control" placeholder="Nội tiết">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tâm - Thần kinh</label>
            <div class="col-sm-9">
                <input type="text" name="thankinh" class="form-control" placeholder="Tâm - Thần kinh">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Cơ xương khớp</label>
            <div class="col-sm-9">
                <input type="text" name="xuongkhop" class="form-control" placeholder="Cơ xương khớp">
            </div>
        </div>
        <div class="form-group">
            <legend>Khám chuyên khoa</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Tai - Mũi - Họng</label>
            <div class="col-sm-9">
                <input type="text" name="taimuihong" class="form-control" placeholder="Tai - Mũi - Họng">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Răng - Hàm - Mặt</label>
            <div class="col-sm-9">
                <input type="text" name="ranghammat" class="form-control" placeholder="Răng - Hàm - Mặt">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Mắt</label>
            <div class="col-sm-9">
                <input type="text" name="mat" class="form-control" placeholder="Mắt">
            </div>
        </div>
        <div class="form-group">
            <legend>Khám cận lâm sàng</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Xét nghiệm máu</label>
            <div class="col-sm-9">
                <input type="text" name="mau" class="form-control" placeholder="Xét nghiệm máu">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Siêu âm</label>
            <div class="col-sm-9">
                <input type="text" name="sieuam" class="form-control" placeholder="Siêu âm">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">X Quang tim phổi</label>
            <div class="col-sm-9">
                <input type="text" name="xqtimphoi" class="form-control" placeholder="X Quang tim phổi">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">XN nước tiểu TP</label>
            <div class="col-sm-9">
                <input type="text" name="nuoctieu" class="form-control" placeholder="Xét nghiệm nước tiểu toàn phần">
            </div>
        </div>
        <div class="form-group">
            <legend>Kết luận</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Phân loại sức khỏe</label>
            <div class="col-sm-9">
                <select name="phanloai" class="form-control">
                        <option value="1">Loại I</option>
                        <option value="2">Loại II</option>
                        <option value="3">Loại III</option>
                        <option value="4">Loại IV</option>
                        <option value="5">Loại V</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Các bệnh tật</label>
            <div class="col-sm-9">
                <input type="text" name="cacbenhtat" class="form-control" placeholder="Các bệnh tật">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Bác sỹ kết luận</label>
            <div class="col-sm-9">
                <input type="text" name="bacsy" class="form-control" placeholder="Bác sỹ kết luận">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Hướng điều trị</label>
            <div class="col-sm-9">
                <select name="huongdieutri" class="form-control">
                        <option value="1">Bệnh xá Công an tỉnh</option>
                        <option value="2">Nơi ĐK khám chữa bệnh ban đầu</option>
                        <option value="3">Bệnh viện 19.8</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary" name="them" onclick ="return validate();">Thêm Phiếu khám</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href = 'index.php?form=<?php echo $form;?>'">Quay lại</button>
            </div>
        </div>
   </form>
</div>
<div class="col-sm-4 col-md-4 col-lg-4">
    <div id="thongbao"></div>
    <div id="showbenhnhan"></div>
</div>