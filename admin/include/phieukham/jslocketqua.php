<?php 
    include("../../config.php");
    $ht="";
    $sh="";
    if(isset($_POST["ht"])){$ht=$_POST["ht"];}
    if(isset($_POST["sh"])){$sh=$_POST["sh"];}
    if($ht==""){
        $sql="select benhnhan.id, benhnhan.hoten, benhnhan.sohieu, benhnhan.namsinh, benhnhan.gioitinh, benhnhan.donvi, benhnhan.chucvu, benhnhan.nhommau, donvi.tendv from benhnhan left join donvi on benhnhan.donvi = donvi.id where benhnhan.sohieu ='$sh'";
    }else{
        $sql = "select benhnhan.id, benhnhan.hoten, benhnhan.sohieu, benhnhan.namsinh, benhnhan.gioitinh, benhnhan.donvi, benhnhan.chucvu, benhnhan.nhommau, donvi.tendv from benhnhan left join donvi on benhnhan.donvi = donvi.id where benhnhan.hoten LIKE '%$ht%'";
        if ($sh !=""){$sql = $sql." and benhnhan.sohieu = '$sh'";}
    }
    $sql = $sql." order by donvi.khoi asc, donvi.tt asc";
    $tb = mysqli_query($con,$sql);
?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Họ tên</th>
            <th>Năm sinh</th>
            <th>Số hiệu</th>
            <th>Đơn vị</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($rs = mysqli_fetch_array($tb)){
        ?>
                <tr onclick = "loadData('<?php echo $rs['hoten']?>','<?php echo $rs['namsinh']?>','<?php echo $rs['gioitinh']?>','<?php echo $rs['sohieu']?>','<?php echo $rs['donvi']?>','<?php echo $rs['chucvu']?>','<?php echo $rs['nhommau']?>',)" class="tr">
                    <td><?php echo $rs["hoten"]?></td>
                    <td><?php echo $rs["namsinh"]?></td>
                    <td><?php echo $rs["sohieu"]?></td>
                    <td><?php echo $rs["tendv"]?></td>
                </tr>
        <?php
            }
        ?>
    </tbody>
</table>
