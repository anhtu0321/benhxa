<?php 
    $nam="2020";
    $taimuihong="";
    $ranghammat="";
    $mat="";
    $trang="1";
    $id="";
    if(isset($_POST["nam"])){$nam = $_POST["nam"];}
    if(isset($_POST["taimuihong"])){$taimuihong = $_POST["taimuihong"];}
    if(isset($_POST["ranghammat"])){$ranghammat = $_POST["ranghammat"];}
    if(isset($_POST["mat"])){$mat = $_POST["mat"];}
    if(isset($_POST["trang"])){$trang = $_POST["trang"];}
    if(isset($_GET["id"])){$id = $_GET["id"];}
?>
<!-- Form -->
<div class="col-sm-12 col-md-12 col-lg-12">
    <p class="tdmuctin"><span class="glyphicon glyphicon-th"></span> Tra cứu thông tin Khám chuyên khoa</p>
    <form action="index.php?tab=ck" method="POST" role="form" class="form-horizontal">
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Năm</label>
            <div class="col-sm-3">
                <input type="text" name="nam" class="form-control" value="<?php echo $nam;?>" placeholder="Năm">
            </div>
            <label for="" class="control-label col-sm-2">Tai - Mũi - Họng</label>
            <div class="col-sm-3">
                <input type="text" name="taimuihong" class="form-control" value="<?php echo $taimuihong;?>" placeholder="Tai - Mũi - Họng">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Răng - Hàm - Mặt</label>
            <div class="col-sm-3">
                <input type="text" name="ranghammat" class="form-control" value="<?php echo $ranghammat;?>" placeholder="Răng - Hàm - Mặt">
            </div>
            <label for="" class="control-label col-sm-2">Mắt</label>
            <div class="col-sm-3">
                <input type="text" name="mat" class="form-control" value="<?php echo $mat;?>" placeholder="Mắt">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5 col-sm-push-2">
                <button type="submit" class="btn btn-success" name="taidulieu"><span class="glyphicon glyphicon-search"></span> Tra cứu</button>
            </div>
        </div>
        
    </form>
</div>
<!-- Nếu nút tải dữ liệu được click thì thực hiện -->
<?php 
if(isset($_POST["taidulieu"])){
    ?>
    <!-- Tính toán thông số để phân trang -->
    <?php 
        // Tính tổng số bản ghi
        $sql = "select distinct benhnhan from phieukham where id > 0";
        if ($nam != ""){$sql = $sql." and nam ='$nam'"; }
        if ($taimuihong != ""){$sql = $sql." and taimuihong like '%$taimuihong%'"; }
        if ($ranghammat != ""){$sql = $sql." and ranghammat like '%$ranghammat%'"; }
        if ($mat != ""){$sql = $sql." and mat like '%$mat%'"; }

        $tbtong = mysqli_query($con,$sql);
        $tong = mysqli_num_rows($tbtong);
        // Các thông số để phân trang
        $num = 10;
        $sotrang = ceil($tong/$num);
        $vitribatdau = ($trang-1)*$num;
        //Lấy dữ liệu trong cơ sở dữ liệu

        $sqlbenhnhan = "select distinct phieukham.benhnhan, benhnhan.id, benhnhan.hoten, benhnhan.namsinh, donvi.tendv, 
        chucvu.tenchucvu, donvi.khoi, donvi.tt, benhnhan.chucvu from phieukham left join benhnhan on phieukham.benhnhan = benhnhan.sohieu left join donvi on 
        benhnhan.donvi = donvi.id left join chucvu on benhnhan.chucvu = chucvu.id  
        where phieukham.id>0";
        if ($nam != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.nam = '$nam'"; }
        if ($taimuihong != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.taimuihong like '%$taimuihong%'"; }
        if ($ranghammat != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.ranghammat like '%$ranghammat%'"; }
        if ($mat != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.mat like '%$mat%'"; }
        $sqlbenhnhan = $sqlbenhnhan." order by donvi.khoi asc, donvi.tt asc, benhnhan.chucvu asc limit $vitribatdau,$num";
        $tbbenhnhan = mysqli_query($con, $sqlbenhnhan);
    ?>
    <!-- Hết -->
    <?php 
        if($tong > 0){
    ?>
    <!-- Hiển thị danh sách bệnh nhân -->
    <div class="thongbao">Tổng số: <span><?php echo $tong?></span> bệnh nhân</div>
    <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="default">
                <th>TT</th>
                <th>Họ tên</th>
                <th>Năm sinh</th>
                <th>Đơn vị</th>
                <th>Chức vụ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sothutu = 0;
                while($rs = mysqli_fetch_array($tbbenhnhan)){$sothutu++;
                ?>
                <tr>
                    <td><?php echo $sothutu; ?></td>
                    <td><?php echo $rs["hoten"]; ?></td>
                    <td><?php echo $rs["namsinh"]; ?></td>
                    <td><?php echo $rs["tendv"]; ?></td>
                    <td><?php echo $rs["tenchucvu"]; ?></td>
                    <td>
                        <a href="index.php?tab=person_list&id=<?php echo $rs["id"]?>">
                            Lịch sử khám
                        </a>
                    </td>
                </tr>
                <?php    
                }
            ?>
        </tbody>
    </table>
    </div>
    <!-- Hết -->
    <?php
        }else{
    ?>
        <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
            Không có kết quả phù hợp !
        </div>
    <?php
        }
    ?>
    <!-- Hiển thị trang -->
    <div class="col-sm-12 text-right">
        <ul class="pagination">
            <li>
                <form action = "index.php?tab=ck" method="POST"> 
                    <button type="submit" name="taidulieu"> First 
                        <input type="text" name = "trang" value ="1" hidden="true"> 
                        <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true">
                        <input type="text" name = "taimuihong" value ="<?php echo $taimuihong;?>" hidden="true"> 
                        <input type="text" name = "ranghammat" value ="<?php echo $ranghammat;?>" hidden="true"> 
                        <input type="text" name = "mat" value ="<?php echo $mat;?>" hidden="true"> 
                    </button>
                </form>
            </li>
            <?php 
            if($sotrang <= 10){$batdau=1;$ketthuc=$sotrang;}
            else {
                if($trang<5){$batdau=1;$ketthuc=10;}
                else if($trang+5 > $sotrang){$batdau=$sotrang-9;$ketthuc=$sotrang;}
                else{$batdau=$trang-4;$ketthuc=$trang+5;}
            }
            for($i=$batdau; $i<=$ketthuc; $i++){
                if($trang == $i){echo "<li class='disabled'>";}else{echo "<li>";}?>
                    <form action = "index.php?tab=ck" method="POST"> 
                        <button type="submit" name="taidulieu"> <?php echo $i;?> 
                            <input type="text" name = "trang" value ="<?php echo $i;?>" hidden="true"> 
                            <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true">
                            <input type="text" name = "taimuihong" value ="<?php echo $taimuihong;?>" hidden="true"> 
                            <input type="text" name = "ranghammat" value ="<?php echo $ranghammat;?>" hidden="true"> 
                            <input type="text" name = "mat" value ="<?php echo $mat;?>" hidden="true"> 
                        </button>
                    </form>
                </li>
            <?php 
            }
            ?>
            <li>
                <form action = "index.php?tab=ck" method="POST"> 
                    <button type="submit" name="taidulieu"> End 
                        <input type="text" name = "trang" value ="<?php echo $sotrang;?>" hidden="true"> 
                        <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true">
                        <input type="text" name = "taimuihong" value ="<?php echo $taimuihong;?>" hidden="true"> 
                        <input type="text" name = "ranghammat" value ="<?php echo $ranghammat;?>" hidden="true"> 
                        <input type="text" name = "mat" value ="<?php echo $mat;?>" hidden="true"> 
                    </button>
                </form>
            </li>
        </ul>
    </div>
<?php }?>