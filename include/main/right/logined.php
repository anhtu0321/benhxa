<form class="form-horizontal">
    <div class="form-group form-group-sm margin-bottom-5">
        <div class="col-sm-12 margin-bottom-5 margin-left-5">
            <?php
                echo "<span style = 'font-weight: normal'>Welcome</span> <span class='user'>".$_SESSION["user_huye_full_name"]."</span><br>";
            ?>
        </div>
        <div class="col-sm-12 margin-bottom-5 margin-left-5 no-bold">
            <a href="index.php?view=bcn">Xem báo cáo ngày</a>
        </div>
        <div class="col-sm-12 margin-bottom-5 margin-left-5 no-bold">
            <a data-toggle="modal" href='#doimatkhau'>Đổi mật khẩu</a>
        </div>
        <div class="col-sm-12 margin-bottom-5 margin-left-5 no-bold">    
            <a href="thoat.php">Thoát</a>
        </div>
        
        
        
        
    </div>
</form>

<!-- Hộp modal Đổi mật khẩu -->
<div class="modal fade" id="doimatkhau">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden ="true">&times;</span>
                    </button>
                    <div class="modal-title"><h4><b>ĐỔI MẬT KHẨU</b><h4></div>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col=md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2">Tài khoản: <span style="color:blue;"><? echo $_SESSION["user_huye_full_name"];?></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="right">Mật khẩu cũ: &nbsp;</td>
                                        <td><input type="password" name="oldpass" id="oldpass" size="20"/></td>
                                    </tr>
                                    <tr>
                                        <td align="right">Mật khẩu mới: &nbsp;</td>
                                        <td><input type="password" name="newpass" id="newpass" size="20" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Nhập lại mật khẩu: &nbsp;</td>
                                        <td><input type="password" name="renewpass" id="renewpass" size="20" />&nbsp;</td>
                                    </tr>
                                    <tr>
                                    <td colspan="2" height="50px" align="center"><div id="tbdoipass"></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" height="50px" align="center"><button type="button" class="btn btn-primary" name="doimatkhau" onclick="xlDoiMatKhau();"><span class="glyphicon glyphicon-edit"></span> Cập nhật</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>	
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Đóng lại</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hết Hộp modal Đổi mật khẩu -->
