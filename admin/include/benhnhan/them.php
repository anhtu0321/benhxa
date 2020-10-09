
<div class="col-sm-12 col-md-12 col-lg-12">
   <form action="include/benhnhan/xuly.php?form=<?php echo $form?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <legend>Thêm bệnh nhân</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Họ tên</label>
            <div class="col-sm-6">
                <input type="text" name="hoten" class="form-control" placeholder="Họ tên">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Năm sinh</label>
            <div class="col-sm-6">
                <input type="text" name="namsinh" class="form-control" placeholder="Năm sinh">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Giới tính</label>
            <div class="col-sm-6">
                <input name="gioitinh" type="radio" checked="checked" value="Nam" /> Nam
                <input name="gioitinh" type="radio" value="Nữ" /> Nữ
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Số hiệu CA</label>
            <div class="col-sm-6">
                <input type="text" name="sohieu" id="sohieu" class="form-control" placeholder="Số hiệu Công an">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Đơn vị</label>
            <div class="col-sm-6">
                <select name="donvi" class="form-control" placeholder="Đơn vị Công tác">
                    <?php
                        while ($rs = mysqli_fetch_array($tbdonvi)){
                    ?>
                            <option value="<?php echo $rs["id"];?>"><?php echo $rs["tendv"];?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Chức vụ</label>
            <div class="col-sm-6">
                <select name="chucvu" class="form-control" placeholder="Chức vụ Công tác">
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
            <label for="" class="control-label col-sm-3">Nhóm máu</label>
            <div class="col-sm-6">
                <input type="text" name="nhommau" class="form-control" placeholder="Nhóm máu">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-3">
                <button type="submit" class="btn btn-primary" name="them" onclick = "return validate();">Thêm bệnh nhân</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href = 'index.php?form=<?php echo $form;?>'">Quay lại</button>
            </div>
        </div>
   </form>
</div>