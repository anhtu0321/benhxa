<?php 
    $hoten="";
    $namsinh="";
    $sohieu="";
    $donvi="";
    $chucvu="";
    $nhommau="";
    $trang="1";
    $id="";
    if(isset($_POST["hoten"])){$hoten = $_POST["hoten"];}
    if(isset($_POST["namsinh"])){$namsinh = $_POST["namsinh"];}
    if(isset($_POST["sohieu"])){$sohieu = $_POST["sohieu"];}
    if(isset($_POST["donvi"])){$donvi = $_POST["donvi"];}
    if(isset($_POST["chucvu"])){$chucvu = $_POST["chucvu"];}
    if(isset($_POST["nhommau"])){$nhommau = $_POST["nhommau"];}
    if(isset($_POST["trang"])){$trang = $_POST["trang"];}
    if(isset($_GET["id"])){$id = $_GET["id"];}
?>
<!-- Form -->
<div class="col-sm-12 col-md-12 col-lg-12">
    <p class="tdmuctin"><span class="glyphicon glyphicon-th"></span> Tra cứu bệnh nhân</p>
        <form action="index.php?tab=person" method="POST" role="form" class="form-horizontal">
            <div class="form-group">
                <label for="" class="control-label col-sm-3">Họ tên</label>
                <div class="col-sm-3">
                    <input type="text" name="hoten" class="form-control" value="<?php echo $hoten;?>" placeholder="Họ tên">
                </div>
                <label for="" class="control-label col-sm-2">Số hiệu</label>
                <div class="col-sm-2">
                    <input type="text" name="sohieu" class="form-control" value="<?php echo $sohieu;?>" placeholder="Số hiệu Công an">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-3">Năm sinh</label>
                <div class="col-sm-2">
                    <input type="text" name="namsinh" id="namsinh" class="form-control" value="<?php echo $namsinh;?>" placeholder="Năm sinh">
                </div>
                <label for="" class="control-label col-sm-3">Đơn vị</label>
                <div class="col-sm-2">
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
            </div>
            <div class="form-group">
                
                <label for="" class="control-label col-sm-3">Chức vụ</label>
                <div class="col-sm-3">
                    <select name="chucvu" id="chucvu" class="form-control" placeholder="Chức vụ Công tác">
                        <option value="">----- Tất cả -----</option>
                        <?php
                            while ($rscv = mysqli_fetch_array($tbchucvu)){
                        ?>
                                <option value="<?php echo $rscv["id"];?>" <?php if($rscv["id"]==$chucvu){echo "selected='selected'";}?>><?php echo $rscv["tenchucvu"];?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <label for="" class="control-label col-sm-2">Nhóm máu</label>
                <div class="col-sm-2">
                    <input type="text" name="nhommau" id="nhommau" class="form-control" value="<?php echo $nhommau;?>" placeholder="Nhóm máu">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5 col-sm-push-3">
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
        $sql = "select count(id) as tong from benhnhan where id > 0";
        if ($hoten != ""){$sql = $sql." and hoten like '%$hoten%'"; }
        if ($namsinh != ""){$sql = $sql." and namsinh ='$namsinh'"; }
        if ($sohieu != ""){$sql = $sql." and sohieu ='$sohieu'"; }
        if ($donvi != ""){$sql = $sql." and donvi ='$donvi'"; }
        if ($chucvu != ""){$sql = $sql." and chucvu ='$chucvu'"; }
        if ($nhommau != ""){$sql = $sql." and nhommau ='$nhommau'"; }
        $tbtong = mysqli_query($con,$sql);
        $rstong = mysqli_fetch_array($tbtong);
        $tong = $rstong["tong"];
        // Các thông số để phân trang
        $num = 10;
        $sotrang = ceil($tong/$num);
        $vitribatdau = ($trang-1)*$num;
        //Lấy dữ liệu trong cơ sở dữ liệu

        $sqlbenhnhan = "select benhnhan.id, benhnhan.hoten, benhnhan.namsinh, benhnhan.gioitinh, benhnhan.sohieu, benhnhan.chucvu, benhnhan.nhommau, donvi.tendv, chucvu.tenchucvu from benhnhan left join donvi on benhnhan.donvi = donvi.id left join chucvu on benhnhan.chucvu = chucvu.id where benhnhan.id > 0";
        if ($hoten != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.hoten like '%$hoten%'"; }
        if ($namsinh != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.namsinh ='$namsinh'"; }
        if ($sohieu != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.sohieu ='$sohieu'"; }
        if ($donvi != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.donvi ='$donvi'"; }
        if ($chucvu != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.chucvu ='$chucvu'"; }
        if ($nhommau != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.nhommau ='$nhommau'"; }
        $sqlbenhnhan = $sqlbenhnhan." order by donvi.khoi asc, donvi.tt asc, benhnhan.chucvu asc limit $vitribatdau,$num";
        $tbbenhnhan = mysqli_query($con, $sqlbenhnhan);
    ?>
    <!-- Hết -->
    <?php 
        if($tong > 0){
    ?>
    <!-- Hiển thị danh sách bệnh nhân -->
    <div class="col-sm-12 col-md-12 col-lg-12 margin-top-10">
        <table class="table table-condensed table-hover">
            <thead>
                <tr class="success">
                    <th>TT</th>
                    <th>Họ tên</th>
                    <th>Năm sinh</th>
                    <th>Giới tính</th>
                    <th><div class="text-center">Số hiệu</div></th>
                    <th><div class="text-center">Đơn vị</div></th>
                    <th><div class="text-center">Chức vụ</div></th>
                    <th><div class="text-center">Nhóm máu</div></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sothutu = 0;
                    while($rs = mysqli_fetch_array($tbbenhnhan)){$sothutu++;
                    ?>
                    <?php
                        if ($id == $rs["id"]){ echo "<tr class='success'>";
                        }else{echo "<tr>";}
                    ?>
                        <td><?php echo $sothutu; ?></td>
                        <td><?php echo $rs["hoten"]; ?></td>
                        <td><?php echo $rs["namsinh"]; ?></td>
                        <td><?php echo $rs["gioitinh"]; ?></td>
                        <td align="center"><?php echo $rs["sohieu"]; ?></td>
                        <td align="center"><?php echo $rs["tendv"]; ?></td>
                        <td align="center"><?php echo $rs["tenchucvu"]; ?></td>
                        <td align="center"><?php echo $rs["nhommau"]; ?></td>
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
                <form action = "index.php?tab=person" method="POST"> 
                    <button type="submit" name="taidulieu"> First 
                        <input type="text" name = "trang" value ="1" hidden="true"> 
                        <input type="text" name = "hoten" value ="<?php echo $hoten;?>" hidden="true"> 
                        <input type="text" name = "namsinh" value ="<?php echo $namsinh;?>" hidden="true"> 
                        <input type="text" name = "sohieu" value ="<?php echo $sohieu;?>" hidden="true"> 
                        <input type="text" name = "donvi" value ="<?php echo $donvi;?>" hidden="true"> 
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
                    <form action = "index.php?tab=person" method="POST"> 
                        <button type="submit" name="taidulieu"> <?php echo $i;?> 
                            <input type="text" name = "trang" value ="<?php echo $i;?>" hidden="true"> 
                            <input type="text" name = "hoten" value ="<?php echo $hoten;?>" hidden="true"> 
                            <input type="text" name = "namsinh" value ="<?php echo $namsinh;?>" hidden="true"> 
                            <input type="text" name = "sohieu" value ="<?php echo $sohieu;?>" hidden="true"> 
                            <input type="text" name = "donvi" value ="<?php echo $donvi;?>" hidden="true"> 
                        </button>
                    </form>
                </li>
            <?php 
            }
            ?>
            <li>
                <form action = "index.php?tab=person" method="POST"> 
                    <button type="submit" name="taidulieu"> End 
                        <input type="text" name = "trang" value ="<?php echo $sotrang;?>" hidden="true"> 
                        <input type="text" name = "hoten" value ="<?php echo $hoten;?>" hidden="true"> 
                        <input type="text" name = "namsinh" value ="<?php echo $namsinh;?>" hidden="true"> 
                        <input type="text" name = "sohieu" value ="<?php echo $sohieu;?>" hidden="true"> 
                        <input type="text" name = "donvi" value ="<?php echo $donvi;?>" hidden="true"> 
                    </button>
                </form>
            </li>
        </ul>
    </div>
<?php }?>