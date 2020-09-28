<?php
$id ="";
if(isset($_GET["id"])){$id = $_GET["id"];}
$sql = "select id, tendv, tendaydu, khoi, trangthai, tt from donvi where id = '$id'";
$tb = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($tb);
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <form action="include/donvi/xuly.php?form=<?php echo $form?>&id=<?php echo $id;?>" method="POST" class="form-horizontal" role="form">
            <div class="form-group">
                <legend>Thêm đơn vị</legend>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Ký hiệu đơn vị</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="tendv" value="<?php echo $rs["tendv"];?>">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Tên đầy đủ</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tendaydu" value="<?php echo $rs["tendaydu"];?>">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Khối</label>
                <div class="col-sm-3">
                    <select name="khoi" class="form-control">
                        <option value="1" <?php if($rs["khoi"]==1){echo "selected='selected'";}?>>Ban Giám đốc</option>
                        <option value="2" <?php if($rs["khoi"]==2){echo "selected='selected'";}?>>Trực thuộc</option>
                        <option value="3" <?php if($rs["khoi"]==3){echo "selected='selected'";}?>>An ninh</option>
                        <option value="4" <?php if($rs["khoi"]==4){echo "selected='selected'";}?>>Cảnh sát</option>
                        <option value="5" <?php if($rs["khoi"]==5){echo "selected='selected'";}?>>huyện, thành phố</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Thứ tự</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="tt" value="<?php echo $rs["tt"];?>">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Trạng thái</label>
                <div class="col-sm-3">
                    <select name="trangthai" class="form-control">
                        <option value="1" <?php if($rs["trangthai"]==1){echo "selected='selected'";}?>>Sử dụng</option>
                        <option value="0" <?php if($rs["trangthai"]==0){echo "selected='selected'";}?>>Không sử dụng</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" name="sua" class="btn btn-primary">Sửa Tài khoản</button>
                    <button type="submit" name="xoa" class="btn btn-primary" onclick="return confirm('Muốn xóa thật à?');">Xóa Tài khoản</button>
                </div>
            </div>
    </form>
</div>
