<?php 
    $hoten="";
    $namsinh="";
    $sohieu="";
    $donvi="";
    $trang="1";
    $id="";
    if(isset($_POST["hoten"])){$hoten = $_POST["hoten"];}
    if(isset($_POST["namsinh"])){$namsinh = $_POST["namsinh"];}
    if(isset($_POST["sohieu"])){$sohieu = $_POST["sohieu"];}
    if(isset($_POST["donvi"])){$donvi = $_POST["donvi"];}
    if(isset($_POST["trang"])){$trang = $_POST["trang"];}
    if(isset($_GET["id"])){$id = $_GET["id"];}
?>
<!-- Form -->
<div class="col-sm-12 col-md-12 col-lg-12">
    <button class="btn btn-primary" onclick = "window.location.href='index.php?form=<?php echo $form;?>&act=add'">Thêm bệnh nhân mới</button>
</div>
<div class="col-sm-12 col-md-12 col-lg-12">
    Nhập thông tin để tải dữ liệu Bệnh nhân:
        <form action="index.php?form=<?php echo $form?>" method="POST" class="form-inline" role="form">
        
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
        $sql = "select count(id) as tong from benhnhan where id > 0";
        if ($hoten != ""){$sql = $sql." and hoten ='$hoten'"; }
        if ($namsinh != ""){$sql = $sql." and namsinh ='$namsinh'"; }
        if ($sohieu != ""){$sql = $sql." and sohieu ='$sohieu'"; }
        if ($donvi != ""){$sql = $sql." and donvi ='$donvi'"; }
        $tbtong = mysqli_query($con,$sql);
        $rstong = mysqli_fetch_array($tbtong);
        $tong = $rstong["tong"];
        // Các thông số để phân trang
        $num = 10;
        $sotrang = ceil($tong/$num);
        $vitribatdau = ($trang-1)*$num;
        //Lấy dữ liệu trong cơ sở dữ liệu

        $sqlbenhnhan = "select benhnhan.id, benhnhan.hoten, benhnhan.namsinh, benhnhan.gioitinh, benhnhan.sohieu, benhnhan.chucvu, benhnhan.nhommau, donvi.tendv, chucvu.tenchucvu from benhnhan left join donvi on benhnhan.donvi = donvi.id left join chucvu on benhnhan.chucvu = chucvu.id where benhnhan.id > 0";
        if ($hoten != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.hoten ='$hoten'"; }
        if ($namsinh != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.namsinh ='$namsinh'"; }
        if ($sohieu != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.sohieu ='$sohieu'"; }
        if ($donvi != ""){$sqlbenhnhan = $sqlbenhnhan." and benhnhan.donvi ='$donvi'"; }
        $sqlbenhnhan = $sqlbenhnhan." order by donvi.khoi asc, donvi.tt, benhnhan.chucvu asc limit $vitribatdau,$num";
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
                    <tr class="danger">
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
                    <form action = "index.php?form=<?php echo $form?>" method="POST"> 
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
                <form action = "index.php?form=<?php echo $form?>" method="POST"> 
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