<?php
$id = $_GET["id"];
$sql = "select hoten, namsinh, gioitinh, sohieu, donvi, chucvu, nhommau from benhnhan where id = '$id'";
$tb = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($tb);
?>
<div class="col-sm-12 col-md-12 col-lg-12">
   <form action="include/benhnhan/xuly.php?form=<?php echo $form;?>&id=<?php echo $id;?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <legend>Thêm bệnh nhân</legend>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Họ tên</label>
            <div class="col-sm-6">
                <input type="text" name="hoten" class="form-control" value="<?php echo $rs["hoten"];?>" placeholder="Họ tên">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Năm sinh</label>
            <div class="col-sm-6">
                <input type="text" name="namsinh" class="form-control" value="<?php echo $rs["namsinh"];?>" placeholder="Năm sinh">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Giới tính</label>
            <div class="col-sm-6">
                <input name="gioitinh" type="radio" <?php if($rs["gioitinh"]=="Nam"){echo "checked='checked'";}?> value="Nam" /> Nam
                <input name="gioitinh" type="radio" <?php if($rs["gioitinh"]=="Nữ"){echo "checked='checked'";}?> value="Nữ" /> Nữ
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Số hiệu CA</label>
            <div class="col-sm-6">
                <input type="text" name="sohieu" class="form-control" value="<?php echo $rs["sohieu"];?>" placeholder="Số hiệu Công an">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Đơn vị</label>
            <div class="col-sm-6">
                <select name="donvi" class="form-control" placeholder="Đơn vị Công tác">
                    <?php
                        while ($rsdv = mysqli_fetch_array($tbdonvi)){
                    ?>
                            <option value="<?php echo $rsdv["id"];?>" <?php if($rs["donvi"] == $rsdv["id"]){echo "selected='selected'";}?>><?php echo $rsdv["tendv"];?></option>
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
                            <option value="<?php echo $rscv["id"];?>" <?php if($rs["chucvu"] == $rscv["id"]){echo "selected='selected'";}?>><?php echo $rscv["tenchucvu"];?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-3">Nhóm máu</label>
            <div class="col-sm-6">
                <input type="text" name="nhommau" class="form-control" value="<?php echo $rs["nhommau"];?>" placeholder="Nhóm máu">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-3">
                <button type="submit" class="btn btn-primary" name="sua">Cập nhật</button>
                <button type="submit" class="btn btn-danger" name="xoa" onclick="return confirm('Muốn xóa thật à?');">Xóa bệnh nhân</button>
                <button type="button" class="btn btn-warning" onclick="window.location.href = 'index.php?form=<?php echo $form;?>'">Quay lại</button>
            </div>
        </div>
   </form>
</div>