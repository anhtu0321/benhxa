<?php
$id="";
if(isset($_GET["id"])){$id = $_GET["id"];}
$sql = "select tenmenu, tenthumuc, thutu, trangthai from chucnang where id = '$id'";
$tb = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($tb);
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    
    <form action="include/chucnang/xuly.php?form=<?php echo $form?>&id=<?php echo $id;?>" method="POST" class="form-inline" role="form">
    
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="tenmenu" value="<?php echo $rs["tenmenu"]?>" placeholder="Tên Menu">
        </div>
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="tenthumuc" value="<?php echo $rs["tenthumuc"]?>" placeholder="Tên Thư mục">
        </div>
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="thutu" value="<?php echo $rs["thutu"]?>" placeholder="Thứ tự">
        </div>
        <div class="form-group form-group-sm">
            <select name="trangthai" class="form-control">
            <?php
                if($rs["trangthai"]==1){
                ?>
                    <option value="0">Không sử dụng</option>
                    <option value="1" selected="selected">Sử dụng</option>
                <?php
                }else{
            ?>
                <option value="0" selected="selected">Không sử dụng</option>
                <option value="1">Sử dụng</option>
                <?php 
                }
                ?>
            </select>
        </div>
        <button type="submit" name="sua" class="btn btn-primary">Sửa Chức năng</button>
        <button type="submit" name="xoa" class="btn btn-primary" onclick="return confirm('Muốn xóa thật à?');">Xóa Chức năng</button>
    </form>
    
</div>