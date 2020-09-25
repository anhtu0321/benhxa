
<div class="col-sm-12 col-md-12 col-lg-12">
    
    <form action="include/chucnang/xuly.php?form=<?php echo $form?>" method="POST" class="form-inline" role="form">
    
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="tenmenu" id="" placeholder="Tên Menu">
        </div>
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="tenthumuc" placeholder="Tên Thư mục">
        </div>
        <div class="form-group form-group-sm">
            <input type="text" class="form-control" name="thutu" placeholder="Thứ tự">
        </div>
        <div class="form-group form-group-sm">
            <select name="trangthai" class="form-control">
                <option value="0">Không sử dụng</option>
                <option value="1" selected="selected">Sử dụng</option>
            </select>
        </div>
        <button type="submit" name="them" class="btn btn-primary">Thêm Chức năng</button>
    </form>
    
</div>
