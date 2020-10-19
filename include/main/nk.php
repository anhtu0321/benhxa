<?php 
    $tuanhoan="";
    $hohap="";
    $tieuhoa="";
    $tietnieu="";
    $noitiet="";
    $thankinh="";
    $xuongkhop="";
    $trang="1";
    $id="";
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
            <label for="" class="control-label col-sm-2">Tuần hoàn</label>
            <div class="col-sm-3">
                <input type="text" name="tuanhoan" class="form-control" value="<?php echo $tuanhoan;?>" placeholder="Tuần hoàn">
            </div>
            <label for="" class="control-label col-sm-2">Hô hấp</label>
            <div class="col-sm-3">
                <input type="text" name="hohap" class="form-control" value="<?php echo $hohap;?>" placeholder="Hô hấp">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Tiêu hóa</label>
            <div class="col-sm-3">
                <input type="text" name="tieuhoa" class="form-control" value="<?php echo $tieuhoa;?>" placeholder="Tiêu hóa">
            </div>
            <label for="" class="control-label col-sm-2">Thận - Tiết niệu</label>
            <div class="col-sm-3">
                <input type="text" name="tietnieu" class="form-control" value="<?php echo $tietnieu;?>" placeholder="Thận - Tiết niệu"> 
            </div>
        </div>
        <div class="form-group">
            
            <label for="" class="control-label col-sm-2">Nội tiết</label>
            <div class="col-sm-3">
                <input type="text" name="noitiet" class="form-control" value="<?php echo $noitiet;?>" placeholder="Nội tiết"> 
            </div>
            <label for="" class="control-label col-sm-2">Tâm - Thần kinh</label>
            <div class="col-sm-3">
                <input type="text" name="thankinh" class="form-control" value="<?php echo $thankinh;?>" placeholder="Tâm - Thần kinh">
            </div>
        </div>
        <div class="form-group">

            <label for="" class="control-label col-sm-2">Cơ - Xương khớp</label>
            <div class="col-sm-3">
                <input type="text" name="xuongkhop" class="form-control" value="<?php echo $xuongkhop;?>" placeholder="Cơ - Xương khớp">
            </div>
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

        $sqlphieu = "select phieukham.id, phieukham.nam, phieukham.benhnhan, phieukham.cannang, phieukham.phanloai,  
        phieukham.bacsy, benhnhan.hoten, benhnhan.namsinh, donvi.tendv from phieukham left join benhnhan 
        on phieukham.benhnhan = benhnhan.sohieu left join donvi on phieukham.donvi = donvi.id where phieukham.id > 0";
        if ($tuanhoan != ""){$sqlphieu = $sqlphieu." and tuanhoan like '%$tuanhoan%'"; }
        if ($hohap != ""){$sqlphieu = $sqlphieu." and hohap like '%$hohap%'"; }
        if ($tieuhoa != ""){$sqlphieu = $sqlphieu." and tieuhoa like '%$tieuhoa%'"; }
        if ($tietnieu != ""){$sqlphieu = $sqlphieu." and tietnieu like '%$tietnieu%'"; }
        if ($noitiet != ""){$sqlphieu = $sqlphieu." and noitiet like '%$noitiet%'"; }
        if ($thankinh != ""){$sqlphieu = $sqlphieu." and thankinh like '%$thankinh%'"; }
        if ($xuongkhop != ""){$sqlphieu = $sqlphieu." and xuongkhop like '%$xuongkhop%'"; }
        $sqlphieu = $sqlphieu." order by donvi.khoi asc, donvi.tt, benhnhan.chucvu asc limit $vitribatdau,$num";
        $tbphieu = mysqli_query($con, $sqlphieu);
    ?>
    <!-- Hết -->
    <?php 
        if($tong > 0){
    ?>
    <!-- Hiển thị danh sách bệnh nhân -->
    <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="default">
                <th>TT</th>
                <th>Năm</th>
                <th>Họ tên</th>
                <th>Năm sinh</th>
                <th><div class="text-center">Số hiệu</div></th>
                <th><div class="text-center">Đơn vị</div></th>
                <th><div class="text-center">Cân nặng</div></th>
                <th><div class="text-center">Phanloai</div></th>
               
                <th><div class="text-center">Bác sỹ Kết luận</div></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sothutu = 0;
                while($rs = mysqli_fetch_array($tbphieu)){$sothutu++;
                ?>
                <tr>
                    <td><?php echo $sothutu; ?></td>
                    <td><?php echo $rs["nam"]; ?></td>
                    <td><?php echo $rs["hoten"]; ?></td>
                    <td><?php echo $rs["namsinh"]; ?></td>
                   
                    <td align="center"><?php echo $rs["benhnhan"]; ?></td>
                    <td align="center"><?php echo $rs["tendv"]; ?></td>
                    <td align="center"><?php echo $rs["cannang"]; ?></td>
                    <td align="center"><?php echo $rs["phanloai"]; ?></td>
                
                    <td align="center"><?php echo $rs["bacsy"]; ?></td>
                    <td>
                        <a href="index.php?tab=person_detail&id=<?php echo $rs["id"]?>">
                            Chi tiết
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