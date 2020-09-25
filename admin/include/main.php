
<div class="col-sm-10 main">
    <div class="row">
        <?php 
            if(!isset($_GET["form"])){

            }else{
                $form = $_GET["form"];
                foreach ($mangchucnang as $key => $value){
                    if($form == $value["id"] && $value["trangthai"] == 1){
                        include($value["tenthumuc"]."/main.php");
                    }
                }
            }
            
        ?>
    </div>
</div>
