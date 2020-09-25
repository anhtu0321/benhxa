<?php 
foreach($mangmuctin as $value){
    if($value["thutu"] != '1'){
        $sql = "select id, tieude, noidung, anh, ngaynhap from tintuc where muctin = '$value[id]' order by id DESC limit 5";
        $tbtintuc = mysqli_query($con,$sql);
        $rstintuc = mysqli_fetch_array($tbtintuc);
    
?>
    <div class="col-sm-12 box">
        <div class="col-sm-12 no-padding border margin-right-5 margin-bottom-5">
            <div class="col-sm-12 title">
                <a href="index.php?view=muctin&id=<?php echo $value['id'];?>"><?php echo $value["tenmuctin"];?></a>
            </div>

            <div class="col-sm-12 no-padding box-tin-body">
                <div class="col-sm-12 no-padding box-body-main">
                    <div class="col-sm-3 margin-bottom-5 box-body-left">
                        <a href="index.php?view=chitiet&id=<?php echo $rstintuc['id'];?>"><img src="imguploads/<?php echo $rstintuc['anh']?>"></a>
                    </div>
                    <div class="col-sm-9 box-body-right">
                        <p class="right-title"><a href="index.php?view=chitiet&id=<?php echo $rstintuc['id'];?>"><?php echo $rstintuc["tieude"];?></a><span class="ngay"> (18/05/2020)</span> </p>
                        <p class="right-info">
                            <?php 
                                $tomtat = substr($rstintuc["noidung"], 0, 300);
                                $arr_noidung = explode(' ', $tomtat);
                                array_pop($arr_noidung);
                                $intomtat = "";
                                foreach($arr_noidung as $value){
                                    $intomtat = $intomtat." ".$value;
                                }
                                $intomtat = $intomtat."...";
                                echo $intomtat;
                            ?>
                        </p>
                    </div> 
                </div>
                <div class="col-sm-12 body-bottom">
                    <?php 
                    while($rstintuc = mysqli_fetch_array($tbtintuc)){
                    ?>
                        <p class="p-link">
                            <a href="index.php?view=chitiet&id=<?php echo $rstintuc['id'];?>"><?php echo $rstintuc["tieude"];?></a>
                            <span class="ngay"> (<?php echo $rstintuc["ngaynhap"];?>)</span>
                        </p>
                    <?php
                    }
                    ?>        
                    		
                    
                </div>
            </div>
        </div>
    </div>
<?php  
    }
}
?>



