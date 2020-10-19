<?php 
    $nam="2020";
    $tuanhoan="";
    $hohap="";
    $tieuhoa="";
    $tietnieu="";
    $noitiet="";
    $thankinh="";
    $xuongkhop="";
    $trang="1";
    $id="";
    if(isset($_POST["nam"])){$nam = $_POST["nam"];}
    if(isset($_POST["tuanhoan"])){$tuanhoan = $_POST["tuanhoan"];}
    if(isset($_POST["hohap"])){$hohap = $_POST["hohap"];}
    if(isset($_POST["tieuhoa"])){$tieuhoa = $_POST["tieuhoa"];}
    if(isset($_POST["tietnieu"])){$tietnieu = $_POST["tietnieu"];}
    if(isset($_POST["noitiet"])){$noitiet = $_POST["noitiet"];}
    if(isset($_POST["thankinh"])){$thankinh = $_POST["thankinh"];}
    if(isset($_POST["xuongkhop"])){$xuongkhop = $_POST["xuongkhop"];}
    if(isset($_POST["trang"])){$trang = $_POST["trang"];}
    if(isset($_GET["id"])){$id = $_GET["id"];}
?>
<!-- Form -->
<div class="col-sm-12 col-md-12 col-lg-12">
    <p class="tdmuctin"><span class="glyphicon glyphicon-th"></span> Tra cứu thông tin Khám nội khoa</p>
    <form action="index.php?tab=nk" method="POST" role="form" class="form-horizontal">
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Năm</label>
            <div class="col-sm-3">
                <input type="text" name="nam" class="form-control" value="<?php echo $nam;?>" placeholder="Năm">
            </div>
            <label for="" class="control-label col-sm-2">Tuần hoàn</label>
            <div class="col-sm-3">
                <input type="text" name="tuanhoan" class="form-control" value="<?php echo $tuanhoan;?>" placeholder="Tuần hoàn">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Hô hấp</label>
            <div class="col-sm-3">
                <input type="text" name="hohap" class="form-control" value="<?php echo $hohap;?>" placeholder="Hô hấp">
            </div>
            <label for="" class="control-label col-sm-2">Tiêu hóa</label>
            <div class="col-sm-3">
                <input type="text" name="tieuhoa" class="form-control" value="<?php echo $tieuhoa;?>" placeholder="Tiêu hóa">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Thận - Tiết niệu</label>
            <div class="col-sm-3">
                <input type="text" name="tietnieu" class="form-control" value="<?php echo $tietnieu;?>" placeholder="Thận - Tiết niệu"> 
            </div>
            <label for="" class="control-label col-sm-2">Nội tiết</label>
            <div class="col-sm-3">
                <input type="text" name="noitiet" class="form-control" value="<?php echo $noitiet;?>" placeholder="Nội tiết"> 
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Tâm - Thần kinh</label>
            <div class="col-sm-3">
                <input type="text" name="thankinh" class="form-control" value="<?php echo $thankinh;?>" placeholder="Tâm - Thần kinh">
            </div>
            <label for="" class="control-label col-sm-2">Cơ - Xương khớp</label>
            <div class="col-sm-3">
                <input type="text" name="xuongkhop" class="form-control" value="<?php echo $xuongkhop;?>" placeholder="Cơ - Xương khớp">
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
        $sql = "select count(id) as tong from phieukham where id > 0";
        if ($nam != ""){$sql = $sql." and nam ='$nam'"; }
        if ($tuanhoan != ""){$sql = $sql." and tuanhoan like '%$tuanhoan%'"; }
        if ($hohap != ""){$sql = $sql." and hohap like '%$hohap%'"; }
        if ($tieuhoa != ""){$sql = $sql." and tieuhoa like '%$tieuhoa%'"; }
        if ($tietnieu != ""){$sql = $sql." and tietnieu like '%$tietnieu%'"; }
        if ($noitiet != ""){$sql = $sql." and noitiet like '%$noitiet%'"; }
        if ($thankinh != ""){$sql = $sql." and thankinh like '%$thankinh%'"; }
        if ($xuongkhop != ""){$sql = $sql." and xuongkhop like '%$xuongkhop%'"; }

        $tbtong = mysqli_query($con,$sql);
        $rstong = mysqli_fetch_array($tbtong);
        $tong = $rstong["tong"];
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
        if ($tuanhoan != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.tuanhoan like '%$tuanhoan%'"; }
        if ($hohap != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.hohap like '%$hohap%'"; }
        if ($tieuhoa != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.tieuhoa like '%$tieuhoa%'"; }
        if ($tietnieu != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.tietnieu like '%$tietnieu%'"; }
        if ($noitiet != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.noitiet like '%$noitiet%'"; }
        if ($thankinh != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.thankinh like '%$thankinh%'"; }
        if ($xuongkhop != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.xuongkhop like '%$xuongkhop%'"; }
        $sqlbenhnhan = $sqlbenhnhan." order by donvi.khoi asc, donvi.tt asc, benhnhan.chucvu asc limit $vitribatdau,$num";
        $tbbenhnhan = mysqli_query($con, $sqlbenhnhan);
    ?>
    <!-- Hết -->
    <?php 
        if($tong > 0){
    ?>
    <!-- Hiển thị danh sách bệnh nhân -->
    <div class="thongbao">Tổng số: <?php echo $tong?> bệnh nhân</div>
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
                <form action = "index.php?tab=nk" method="POST"> 
                    <button type="submit" name="taidulieu"> First 
                        <input type="text" name = "trang" value ="1" hidden="true"> 
                        <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true">
                        <input type="text" name = "tuanhoan" value ="<?php echo $tuanhoan;?>" hidden="true"> 
                        <input type="text" name = "hohap" value ="<?php echo $hohap;?>" hidden="true"> 
                        <input type="text" name = "tieuhoa" value ="<?php echo $tieuhoa;?>" hidden="true"> 
                        <input type="text" name = "tietnieu" value ="<?php echo $tietnieu;?>" hidden="true"> 
                        <input type="text" name = "noitiet" value ="<?php echo $noitiet;?>" hidden="true"> 
                        <input type="text" name = "thankinh" value ="<?php echo $thankinh;?>" hidden="true"> 
                        <input type="text" name = "xuongkhop" value ="<?php echo $xuongkhop;?>" hidden="true">
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
                    <form action = "index.php?tab=nk" method="POST"> 
                        <button type="submit" name="taidulieu"> <?php echo $i;?> 
                            <input type="text" name = "trang" value ="<?php echo $i;?>" hidden="true"> 
                            <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true">
                            <input type="text" name = "tuanhoan" value ="<?php echo $tuanhoan;?>" hidden="true"> 
                            <input type="text" name = "hohap" value ="<?php echo $hohap;?>" hidden="true"> 
                            <input type="text" name = "tieuhoa" value ="<?php echo $tieuhoa;?>" hidden="true"> 
                            <input type="text" name = "tietnieu" value ="<?php echo $tietnieu;?>" hidden="true"> 
                            <input type="text" name = "noitiet" value ="<?php echo $noitiet;?>" hidden="true"> 
                            <input type="text" name = "thankinh" value ="<?php echo $thankinh;?>" hidden="true"> 
                            <input type="text" name = "xuongkhop" value ="<?php echo $xuongkhop;?>" hidden="true"> 
                        </button>
                    </form>
                </li>
            <?php 
            }
            ?>
            <li>
                <form action = "index.php?tab=nk" method="POST"> 
                    <button type="submit" name="taidulieu"> End 
                        <input type="text" name = "trang" value ="<?php echo $sotrang;?>" hidden="true"> 
                        <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true">
                        <input type="text" name = "tuanhoan" value ="<?php echo $tuanhoan;?>" hidden="true"> 
                        <input type="text" name = "hohap" value ="<?php echo $hohap;?>" hidden="true"> 
                        <input type="text" name = "tieuhoa" value ="<?php echo $tieuhoa;?>" hidden="true"> 
                        <input type="text" name = "tietnieu" value ="<?php echo $tietnieu;?>" hidden="true"> 
                        <input type="text" name = "noitiet" value ="<?php echo $noitiet;?>" hidden="true"> 
                        <input type="text" name = "thankinh" value ="<?php echo $thankinh;?>" hidden="true"> 
                        <input type="text" name = "xuongkhop" value ="<?php echo $xuongkhop;?>" hidden="true">
                    </button>
                </form>
            </li>
        </ul>
    </div>
<?php }?>