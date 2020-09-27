
<div class="col-sm-12 col-md-12 col-lg-12">
    <form action="include/donvi/xuly.php?form=<?php echo $form?>" method="POST" class="form-horizontal" role="form">
            <div class="form-group">
                <legend>Thêm đơn vị</legend>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Ký hiệu đơn vị</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="tendv" placeholder="Input field">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Tên đầy đủ</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tendaydu" placeholder="Input field">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Khối</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="khoi" placeholder="Input field">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Thứ tự</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="tt" placeholder="Input field">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 no-padding">Trạng thái</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="trangthai" placeholder="Input field">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Thêm đơn vị</button>
                </div>
            </div>
    </form>
    
</div>
