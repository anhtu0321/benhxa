<?php
	$sqltinmoi = "select id, tieude, noidung, anh, ngaynhap from tintuc order by id DESC limit 10";
	$tbtinmoi = mysqli_query($con,$sqltinmoi);
?>
<div class="col-sm-3 module-center">  
            <div class="border tin-moi">
                <div class="title">
                    <a>Tin mới nhất</a>
                </div>
                <div class="tin-moi-body">
                    <ul>
                        <?php
                            while($rstinmoi = mysqli_fetch_array($tbtinmoi)){
                        ?>
                                <li><a href="index.php?view=chitiet&id=<?php echo $rstinmoi['id'];?>"><?php echo $rstinmoi["tieude"];?></a><br></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
		</div>