<?php
	$sqlnoibat = "select id, tieude, noidung, anh, ngaynhap from tintuc where noibat = 1 order by id DESC limit 6";
	$tbnoibat = mysqli_query($con,$sqlnoibat);
	$rsnoibat = mysqli_fetch_array($tbnoibat);
?>
<div class="col-sm-9 module-center">
			<div class="layout-top">
				<div class="col-sm-7 box-new">
					<div class="header-new">
						<h4><a href="index.php?view=chitiet&id=<?php echo $rsnoibat['id'];?>"><?php echo $rsnoibat["tieude"]; ?></a></h4>
						<img src="imguploads/<?php echo $rsnoibat['anh']?>"/>
					</div>
					<div class="info">
						<p>
							<?php 
                                $tomtat = substr($rsnoibat["noidung"], 0, 150);
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
				<div class="col-sm-5 list-new">
					<ul>
						<?php
							while($rsnoibat = mysqli_fetch_array($tbnoibat)){
						?>
								<li>
									<a href="index.php?view=chitiet&id=<?php echo $rsnoibat['id'];?>">
										<img src="imguploads/<?php echo $rsnoibat['anh']?>">
										<span><?php echo $rsnoibat["tieude"]; ?></span>
									</a>
								</li>
						<?php
							}
						?>
						
					</ul>
				</div>
			</div>
		</div>