
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Trang chủ</a></li>
                
<!-- Duyet csdl de lay menu -->
<?php 
    foreach($mangmuctin as $key => $value){
?>
        <li><a href="index.php?view=muctin&id=<?php echo $value['id'];?>"><?php echo $value['tenmuctin'];?></a></li>
<?php
    }
?>                  
<!-- Het -->
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Phần mềm ứng dụng <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://10.19.3.123/guinhanvb">PM gửi nhận văn bản</a></li>
                            <li><a href="http://10.19.3.123/phuongtien">PM Quản lý phương tiện</a></li>
                            <li><a href="http://10.19.3.123/taisan">PM quản lý tài sản</a></li>
                            <li><a href="http://10.19.3.123/congviec">PM quản lý công việc</a></li>
                            <li><a href="http://10.19.3.123/phanloaivv">PM phân loại vụ việc</a></li>
                            <li><a href="http://10.19.3.123/congvan">PM Văn thư</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?view=pmmt">Phần mềm máy tính</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
       

    </div>
</div>
