<?php 
    $nam=date("Y");
    if(isset($_POST["nam"])){$nam = $_POST["nam"];}
?>
<!-- Form -->
<div class="col-sm-12 col-md-12 col-lg-12">
    <p class="tdmuctin"><span class="glyphicon glyphicon-th"></span> Thống kê cán bộ cao cấp</p>
    <form action="index.php?tab=tkcc" method="POST" role="form" class="form-horizontal">
        <div class="form-group">
            <label for="" class="control-label col-sm-2">Năm</label>
            <div class="col-sm-3">
                <input type="text" name="nam" class="form-control" value="<?php echo $nam;?>" placeholder="Năm">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5 col-sm-push-2">
                <button type="submit" class="btn btn-success" name="taidulieu"><span class="glyphicon glyphicon-search"></span> Thống kê</button>
            </div>
        </div> 
    </form>
    <p class="border-bottom"></p>
</div>
<!-- Nếu nút tải dữ liệu được click thì thực hiện -->
<?php 
if(isset($_POST["taidulieu"])){
    ?>
    <!-- Tính toán thông số để phân trang -->
    <?php 
        //Lấy dữ liệu trong cơ sở dữ liệu
        $sqlbenhnhan = "select phieukham.id, phieukham.nam, phieukham.benhnhan, phieukham.sieuam, phieukham.mau, 
        phieukham.xqtimphoi, phieukham.nuoctieu, phieukham.cacbenhtat, phieukham.phanloai, phieukham.huongdieutri,  
        phieukham.bacsy, benhnhan.hoten, benhnhan.namsinh, benhnhan.sohieu, benhnhan.nhommau, donvi.tendv from benhnhan left join phieukham 
        on phieukham.benhnhan = benhnhan.sohieu and phieukham.nam = '$nam' left join donvi on benhnhan.donvi = donvi.id left join chucvu on 
        benhnhan.chucvu = chucvu.id where chucvu.capdo <=4";
        // if ($nam != ""){$sqlbenhnhan = $sqlbenhnhan." and phieukham.nam = '$nam'"; }
        $sqlbenhnhan = $sqlbenhnhan." order by donvi.khoi asc, donvi.tt asc, benhnhan.chucvu asc";
        $tbbenhnhan = mysqli_query($con, $sqlbenhnhan);
    ?>
    <!-- Hết -->
   
    <!-- Hiển thị danh sách bệnh nhân -->
    <div class="thongke font-time-tk">
        <div class="thongke-header">
            
            DANH SÁCH CÁN BỘ CAO CẤP KHÁM SỨC KHỎE ĐỊNH KỲ NĂM <?php echo $nam;?>
        </div>  
        <table class="table table-condensed table-bordered tbphieu">
            <thead>
                <tr>
                    <th rowspan="2" width="2%">TT</th>
                    <th rowspan="2" width="13%">Họ và tên</th>
                    <th rowspan="2" width="4%">Năm sinh</th>
                    <th rowspan="2" width="4%">Đơn vị</th>
                    <th rowspan="2" width="5%">Số hiệu</th>
                    <th rowspan="2" width="4%">Nhóm máu</th>
                    <th colspan="2" width="5%">CLS</th>
                    <th rowspan="2" width="18%">Kết quả khám</th>
                    <th rowspan="2" width="18%">Bệnh cần theo dõi</th>
                    <th colspan="5" width="12%">Phân loại sức khỏe</th>
                    <th colspan="3" width="15%">Hướng điều trị</th>
                </tr>
                <tr>
                    <th>SA</th>
                    <th>Máu</th>
                    <th>I</th>
                    <th>II</th>
                    <th>III</th>
                    <th>IV</th>
                    <th>V</th>
                    <th>Bệnh xá</th>
                    <th>Nơi ĐK KCB BĐ</th>
                    <th>BV 19.8</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stt=0;
                $dakham=0; $loai1=0; $loai2=0; $loai3=0; $loai4=0; $loai5=0;
                while($rs = mysqli_fetch_array($tbbenhnhan)){ 
                    $stt+=1;
                    if($rs["benhnhan"]!=""){$dakham+=1;}
                    switch($rs["phanloai"]){
                        case 1:
                            $loai1+=1;
                            break;
                        case 2:
                            $loai2+=1;
                            break;
                        case 3:
                            $loai3+=1;
                            break;
                        case 4:
                            $loai4+=1;
                            break;
                        case 5:
                            $loai5+=1;
                            break;
                        default:
                    }
                ?>
                <tr>
                    <td align="center"><?php echo $stt;?></td>
                    <td><?php echo $rs["hoten"];?></td>
                    <td><?php echo $rs["namsinh"];?></td>
                    <td><?php echo $rs["tendv"];?></td>
                    <td><?php echo $rs["sohieu"];?></td>
                    <td align="center"><?php echo $rs["nhommau"];?></td>
                    <td align="center"><?php if($rs["sieuam"] !=""){echo "x";}?></td>
                    <td align="center"><?php if($rs["mau"] !=""){echo "x";}?></td>
                    <td><?php echo $rs["mau"]."<br/>".$rs["sieuam"]."<br/>".$rs["xqtimphoi"]."<br/>".$rs["nuoctieu"];?></td>
                    <td><?php echo $rs["cacbenhtat"];?></td>
                    <td align="center"><?php if($rs["phanloai"] =="1"){echo "x";} ?></td>
                    <td align="center"><?php if($rs["phanloai"] =="2"){echo "x";} ?></td>
                    <td align="center"><?php if($rs["phanloai"] =="3"){echo "x";} ?></td>
                    <td align="center"><?php if($rs["phanloai"] =="4"){echo "x";} ?></td>
                    <td align="center"><?php if($rs["phanloai"] =="5"){echo "x";} ?></td>
                    <td align="center"><?php if($rs["huongdieutri"] =="1"){echo "x";}?></td>
                    <td align="center"><?php if($rs["huongdieutri"] =="2"){echo "x";}?></td>
                    <td align="center"><?php if($rs["huongdieutri"] =="3"){echo "x";}?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <div class="col-sm-12 coban">
            <p><b>Tổng hợp:</b></p>
            <p>- Tổng số: <?php echo $stt;?></p>
            <p>- Khám: <?php echo $dakham; if($stt>0){ echo ", đạt ".round($dakham/$stt*100,2)." %";}?> </p>
            <p>- Vắng: <?php echo $stt-$dakham; if($stt>0){ echo ", chiếm ".round(($stt-$dakham)/$stt*100,2)." %";}?> % </p>
            <p>- Loại I: <?php echo $loai1;?></p>
            <p>- Loại II: <?php echo $loai2;?></p>
            <p>- Loại III: <?php echo $loai3;?></p>
            <p>- Loại IV: <?php echo $loai4;?></p>
            <p>- Loại V: <?php echo $loai5;?></p>
        </div>
        <div class="footer-left">
        </div>
        <div class="footer-right font-time">
        </div>
    </div>
    <!-- Hết -->
    <div class="col-sm-10 text-right margin-top-5 margin-bottom-5">
        <button class="btn btn-sm btn-warning" onClick="history.go(-1);"><i class="glyphicon glyphicon-circle-arrow-left"></i> Quay lại</button>
        <a class="btn btn-sm btn-info" onclick = "window.open('inthongke.php?nam=<?php echo $nam;?>', 'windowChild', 'width=1200, height=800, top=30px, left=75px')" ><i class="glyphicon glyphicon-print"></i> In phiếu khám</a>
        <!-- <a class="btn btn-sm btn-success" href="#"><i class="glyphicon glyphicon-download-alt"></i> Tải File Word</a> -->
    </div>

<?php }?>