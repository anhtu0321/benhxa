<?php
if(!isset($_GET["id"])){
    echo "Không xác định được tin cần đọc !";
}else{
$id = $_GET["id"];
$sql = "select tintuc.tieude, muctin.tenmuctin, muctin.id, tintuc.noidung, tintuc.anh, tintuc.ngaynhap from tintuc inner join muctin on tintuc.muctin = muctin.id where tintuc.id='$id'";
$tb = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($tb);
?>
<div class = "col-sm-12 chi-tiet-tin">
    <!-- tên mục tin -->
    <div class="col-sm-12 no-padding">
        <p class="tdmuctin"><a href="index.php?view=muctin&id=<?php echo $rs["id"];?>"><span class="glyphicon glyphicon-th"></span> <?php echo $rs["tenmuctin"];?></a></p>
        
    </div>  
    <!-- Tiêu đề tin -->
    <div class="col-sm-12 no-padding">
        <p class="tieude"><?php echo $rs["tieude"];?></p>
        <p class="ngaynhap">Đăng ngày: <?php echo $rs["ngaynhap"];?></p>
    </div>
    <!-- nội dung tin -->
    <div class="col-sm-12 no-padding">

        <?php echo $rs["noidung"];?>
        <hr/>
    </div>
    
    <!-- Tin cùng chuyên mục -->
<?php
$maxid = $id + 5;
$sqlcungmuc = "select id, tieude, muctin, ngaynhap from tintuc where muctin = '$rs[id]' and id <> '$id' and id <= $maxid order by id DESC limit 10";
$tbcungmuc = mysqli_query($con,$sqlcungmuc);
?>
    <div class="col-sm-12 no-padding tin-chuyen-muc">
        <p>
                Tin cùng chuyên mục
        </p>
        <ul>
            <?php
                while($rscungmuc = mysqli_fetch_array($tbcungmuc)){
            ?>
                    <li><a href="index.php?view=chitiet&id=<?php echo $rscungmuc['id'];?>"><?php echo $rscungmuc["tieude"];?></a><br></li>
            <?php
                }
            ?>
        </ul>

    </div>  
</div>
<?php
}
?>
