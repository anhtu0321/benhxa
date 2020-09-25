
<div class="col-sm-12 col-md-12 col-lg-12">
    
    <form action="include/taikhoan/xuly.php?form=<?php echo $form?>" method="POST" class="form-inline" role="form">
    
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="username" id="" placeholder="Tên Tài khoản">
        </div>
        <div class="form-group form-group-sm">
            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
        </div>
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="fullname" placeholder="Họ tên">
        </div>

        <button type="submit" name="them" class="btn btn-primary">Thêm Tài khoản</button>
    </form>
    
</div>
