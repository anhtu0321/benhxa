<?php 
    $id="";
    if(isset($_GET["id"])){$id = $_GET["id"];}
    $sql = "select phieukham.id, phieukham.nam, phieukham.benhnhan, phieukham.cannang, phieukham.phanloai,  
    phieukham.bacsy, benhnhan.hoten, benhnhan.namsinh, donvi.tendv from phieukham left join benhnhan 
    on phieukham.benhnhan = benhnhan.sohieu left join donvi on phieukham.donvi = donvi.id where benhnhan.id = '$id'";
    $tb = mysqli_query($con,$sql);
?>
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
                while($rs = mysqli_fetch_array($tb)){$sothutu++;
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
<div class="col-sm-2 col-sm-push-10 text-right margin-bottom-5">
    <!-- <a href="javascript:history.back();">Quay lại</a> -->
    <button class="btn btn-sm btn-warning" onClick="history.go(-1);">Quay lại</button>

</div>