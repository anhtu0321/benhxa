<?php
$id = $_GET["id"];
$sql = "select username, fullname from users where id = '$id'";
$tb = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($tb);
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    
    <form action="include/taikhoan/xuly.php?form=<?php echo $form?>&id=<?php echo $id;?>" method="POST" class="form-inline" role="form">
    
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="username" value="<?php echo $rs["username"]?>" placeholder="Tài khoản">
        </div>
        <div class="form-group form-group-sm">
            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
        </div>
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="fullname" value="<?php echo $rs["fullname"]?>" placeholder="Họ tên">
        </div>

        <button type="submit" name="sua" class="btn btn-primary">Sửa Tài khoản</button>
        <button type="submit" name="xoa" class="btn btn-primary" onclick="return confirm('Muốn xóa thật à?');">Xóa Tài khoản</button>
        <div class="form-group form-group-sm">
            (Để trống mật khẩu để giữ nguyên mật khẩu cũ)
        </div>
    </form>
    
</div>