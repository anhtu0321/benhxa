<?php 
    $nam="";
    $hoten="";
    $namsinh="";
    $sohieu="";
    $donvi="";
    $phanloai="";
    $bacsy="";
    $trang="1";
    $id="";
    if(isset($_POST["nam"])){$nam = $_POST["nam"];}
    if(isset($_POST["hoten"])){$hoten = $_POST["hoten"];}
    if(isset($_POST["namsinh"])){$namsinh = $_POST["namsinh"];}
    if(isset($_POST["sohieu"])){$sohieu = $_POST["sohieu"];}
    if(isset($_POST["donvi"])){$donvi = $_POST["donvi"];}
    if(isset($_POST["phanloai"])){$phanloai = $_POST["phanloai"];}
    if(isset($_POST["bacsy"])){$bacsy = $_POST["bacsy"];}
    if(isset($_POST["trang"])){$trang = $_POST["trang"];}
    if(isset($_GET["id"])){$id = $_GET["id"];}
?>
<!-- Form -->
<div class="col-sm-12 col-md-12 col-lg-12">
    <button class="btn btn-primary" onclick = "window.location.href='index.php?form=<?php echo $form;?>&act=add'">Thêm phiếu khám</button>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
    Nhập thông tin để tải dữ liệu Phiếu khám:
        <form action="index.php?form=<?php echo $form?>" method="POST" class="form-inline" role="form">
            <div class="form-group">
                <label>Phiếu Năm: </label>
                <input type="text" name="nam" class="form-control" size="5" value="<?php echo $nam;?>" placeholder="Năm">
            </div>
            <div class="form-group">
                <label>Họ tên: </label>
                <input type="text" name="hoten" class="form-control" size="13" value="<?php echo $hoten;?>" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <label>Năm sinh: </label>
                <input type="text" name="namsinh" class="form-control" size="5" value="<?php echo $namsinh;?>" placeholder="Năm sinh">
            </div>
            <div class="form-group">
                <label>Số hiệu: </label>
                <input type="text" name="sohieu" class="form-control" size="5" value="<?php echo $sohieu;?>" placeholder="Số hiệu">
            </div>
            <div class="form-group">
                <label>Đơn vị: </label>
                <select name="donvi" class="form-control" placeholder="Đơn vị Công tác">
                    <option value="">----- Tất cả -----</option>
                    <?php
                        while ($rs = mysqli_fetch_array($tbdonvi)){
                    ?>
                            <option value="<?php echo $rs["id"];?>" <?php if($rs["id"]==$donvi){echo "selected='selected'";}?>><?php echo $rs["tendv"];?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Phân loại sức khỏe: </label>
                <input type="text" name="phanloai" class="form-control" size="10" value="<?php echo $phanloai;?>" placeholder="Phân loại">
            </div>
            <div class="form-group">
                <label>Bác sỹ kết luận: </label>
                <input type="text" name="bacsy" class="form-control" size="15" value="<?php echo $bacsy;?>" placeholder="Bác sỹ kết luận">
            </div>
            <button type="submit" class="btn btn-success" name="taidulieu">Tải dữ liệu Bệnh nhân</button>
        </form>
        
</div>
<!-- Nếu nút tải dữ liệu được click thì thực hiện -->
<?php 
if(isset($_POST["taidulieu"])){
    ?>
    <!-- Tính toán thông số để phân trang -->
    <?php 
        // Tính tổng số bản ghi
        $sql = "select count(phieukham.id) as tong from phieukham left join benhnhan on phieukham.benhnhan = benhnhan.sohieu where phieukham.id > 0";
        if ($nam != ""){$sql = $sql." and phieukham.nam ='$nam'"; }
        if ($hoten != ""){$sql = $sql." and benhnhan.hoten ='$hoten'"; }
        if ($namsinh != ""){$sql = $sql." and benhnhan.namsinh ='$namsinh'"; }
        if ($sohieu != ""){$sql = $sql." and phieukham.benhnhan ='$sohieu'"; }
        if ($donvi != ""){$sql = $sql." and phieukham.donvi ='$donvi'"; }
        if ($phanloai != ""){$sql = $sql." and phieukham.phanloai ='$phanloai'"; }
        if ($bacsy != ""){$sql = $sql." and phieukham.bacsy ='$bacsy'"; }
        $tbtong = mysqli_query($con,$sql);
        $rstong = mysqli_fetch_array($tbtong);
        $tong = $rstong["tong"];
        // Các thông số để phân trang
        $num = 10;
        $sotrang = ceil($tong/$num);
        $vitribatdau = ($trang-1)*$num;
        //Lấy dữ liệu trong cơ sở dữ liệu

        $sqlphieukham = "select phieukham.id, phieukham.nam, phieukham.phanloai, phieukham.bacsy, benhnhan.hoten, benhnhan.namsinh, benhnhan.sohieu, donvi.tendv, chucvu.tenchucvu from phieukham left join benhnhan on phieukham.benhnhan = benhnhan.sohieu left join donvi on phieukham.donvi = donvi.id left join chucvu on phieukham.chucvu = chucvu.id where benhnhan.id > 0";
        if ($nam != ""){$sqlphieukham = $sqlphieukham." and phieukham.nam ='$nam'"; }
        if ($hoten != ""){$sqlphieukham = $sqlphieukham." and benhnhan.hoten ='$hoten'"; }
        if ($namsinh != ""){$sqlphieukham = $sqlphieukham." and benhnhan.namsinh ='$namsinh'"; }
        if ($sohieu != ""){$sqlphieukham = $sqlphieukham." and phieukham.benhnhan ='$sohieu'"; }
        if ($donvi != ""){$sqlphieukham = $sqlphieukham." and phieukham.donvi ='$donvi'"; }
        if ($phanloai != ""){$sqlphieukham = $sqlphieukham." and phieukham.phanloai ='$phanloai'"; }
        if ($bacsy != ""){$sqlphieukham = $sqlphieukham." and phieukham.bacsy ='$bacsy'"; }
        $sqlphieukham = $sqlphieukham." order by donvi.khoi asc, donvi.tt, benhnhan.chucvu asc limit $vitribatdau,$num";
        $tbpk = mysqli_query($con, $sqlphieukham);
    ?>
    <!-- Hết -->
    <?php 
        if($tong > 0){
    ?>
    <!-- Hiển thị danh sách bệnh nhân -->
        <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
            <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <th>TT</th>
                <th>Năm</th>
                <th>Họ tên</th>
                <th>Năm sinh</th>
                <th>Số hiệu</th>
                <th>Đơn vị</th>
                <th>Chức vụ</th>
                <th>Phân loại</th>
                <th>Bác sỹ kết luận</th>
                <th></th>
            </tr>
        </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        while($rs = mysqli_fetch_array($tbpk)){$i++;
                        ?>
                        <?php
                            if ($id == $rs["id"]){ echo "<tr class='success'>";
                            }else{echo "<tr>";}
                        ?>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rs["nam"]; ?></td>
                            <td><?php echo $rs["hoten"]; ?></td>
                            <td><?php echo $rs["namsinh"]; ?></td>
                            <td><?php echo $rs["sohieu"]; ?></td>
                            <td><?php echo $rs["tendv"]; ?></td>
                            <td><?php echo $rs["tenchucvu"]; ?></td>
                            <td><?php echo $rs["phanloai"]; ?></td>
                            <td><?php echo $rs["bacsy"]; ?></td>
                            <td>
                                <a href="index.php?form=<?php echo $form?>&act=edit&id=<?php echo $rs["id"]?>">
                                    <img src="img/b_edit.png">
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
                <form action = "index.php?form=<?php echo $form?>" method="POST"> 
                    <button type="submit" name="taidulieu"> First 
                        <input type="text" name = "trang" value ="1" hidden="true"> 
                        <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true"> 
                        <input type="text" name = "hoten" value ="<?php echo $hoten;?>" hidden="true"> 
                        <input type="text" name = "namsinh" value ="<?php echo $namsinh;?>" hidden="true"> 
                        <input type="text" name = "sohieu" value ="<?php echo $sohieu;?>" hidden="true"> 
                        <input type="text" name = "donvi" value ="<?php echo $donvi;?>" hidden="true"> 
                        <input type="text" name = "phanloai" value ="<?php echo $phanloai;?>" hidden="true"> 
                        <input type="text" name = "bacsy" value ="<?php echo $bacsy;?>" hidden="true"> 
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
                    <form action = "index.php?form=<?php echo $form?>" method="POST"> 
                        <button type="submit" name="taidulieu"> <?php echo $i;?> 
                            <input type="text" name = "trang" value ="1" hidden="true"> 
                            <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true"> 
                            <input type="text" name = "hoten" value ="<?php echo $hoten;?>" hidden="true"> 
                            <input type="text" name = "namsinh" value ="<?php echo $namsinh;?>" hidden="true"> 
                            <input type="text" name = "sohieu" value ="<?php echo $sohieu;?>" hidden="true"> 
                            <input type="text" name = "donvi" value ="<?php echo $donvi;?>" hidden="true"> 
                            <input type="text" name = "phanloai" value ="<?php echo $phanloai;?>" hidden="true"> 
                            <input type="text" name = "bacsy" value ="<?php echo $bacsy;?>" hidden="true"> 
                        </button>
                    </form>
                </li>
            <?php 
            }
            ?>
            <li>
                <form action = "index.php?form=<?php echo $form?>" method="POST"> 
                    <button type="submit" name="taidulieu"> End 
                        <input type="text" name = "trang" value ="1" hidden="true"> 
                        <input type="text" name = "nam" value ="<?php echo $nam;?>" hidden="true"> 
                        <input type="text" name = "hoten" value ="<?php echo $hoten;?>" hidden="true"> 
                        <input type="text" name = "namsinh" value ="<?php echo $namsinh;?>" hidden="true"> 
                        <input type="text" name = "sohieu" value ="<?php echo $sohieu;?>" hidden="true"> 
                        <input type="text" name = "donvi" value ="<?php echo $donvi;?>" hidden="true"> 
                        <input type="text" name = "phanloai" value ="<?php echo $phanloai;?>" hidden="true"> 
                        <input type="text" name = "bacsy" value ="<?php echo $bacsy;?>" hidden="true"> 
                    </button>
                </form>
            </li>
        </ul>
    </div>
<?php }?>