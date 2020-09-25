<?php
	if(!isset($_GET["view"])){
		$view = "";
	}else{
		$view = $_GET["view"];
	}
?>
<div class="row">
    <div class="module-left main-left">
		<?php 
			if($view == "chitiet"){
				include("include/chitiettin.php");
			}else if($view == "muctin"){
				include("include/muctin.php");
			}else if($view == "bcn"){
				include("include/dsbaocaongay.php");
			}else if($view == "pmmt"){
				include("include/dspmmaytinh.php");
			}
			else{
				include("include/main/center-left.php");
				include("include/main/center-right.php");
				include("include/main/khauhieu.php");
				include("include/main/box-tin.php");
			}
		?>
    </div>
    <div class="no-padding main-right">
		<?php
			include("include/main/right.php");
		?>
    </div>
</div>
