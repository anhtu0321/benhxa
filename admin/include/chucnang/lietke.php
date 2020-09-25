
<?php 
    
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <table class="table table-condensed table-hover">
        <thead>
            <tr class="danger">
                <th>TT</th>
                <th>ID</th>
                <th>Tên Menu</th>
                <th>Tên Thư mục</th>
                <th>Thứ tự</th>
                <th>Trạng thái</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($mangchucnang as $key => $value){ 
                ?>
                <?php
                    $id_check = "";
                    if(isset($id)){$id_check=$id;}
                    if ($id_check == $value["id"]){ echo "<tr class='success'>";
                    }else{echo "<tr>";}
                ?>
                    <td><?php echo ($key+1); ?></td>
                    <td><?php echo $value["id"]; ?></td>
                    <td><?php echo $value["tenmenu"]; ?></td>
                    <td><?php echo $value["tenthumuc"]; ?></td>
                    <td><?php echo $value["thutu"]; ?></td>
                    <td>
                        <?php 
                            if($value["trangthai"]==1){echo "Sử dụng";};
                            if($value["trangthai"]==0){echo "Không Sử dụng";};
                        ?>
                     </td>
                    <td>
                        <a href="index.php?form=<?php echo $form?>&act=edit&id=<?php echo $value["id"]?>">
                            <img src="img/b_edit.png">
                        </a>
                    </td>
                </tr>
                <?php   
                }
            ?>
        </tbody>
    </table>
</div>
