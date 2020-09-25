
<div class="col-sm-2 menu no-padding">
    <ul class="list-group"> 
    <?php 
        foreach ($mangchucnang as $key => $value){
            $tbxem = mysqli_query($con,"select xem from phanquyen where user = '$_SESSION[user_huye_id]' and form = '$value[id]'");
            $rsxem = mysqli_fetch_array($tbxem);
            if($value["trangthai"]==1 and $rsxem["xem"] == 1){
        ?>
            <a class="list-group-item list-group-item-info" href="index.php?form=<?php echo $value["id"]?>"><?php echo $value["tenmenu"]?></a>
        <?php
            }
        }
    ?>
    </ul>
</div>
