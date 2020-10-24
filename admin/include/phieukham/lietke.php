<?php
     $id="";
     if(isset($_GET["id"])){$id = $_GET["id"];}
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>TT</th>
                <th>Năm</th>
                <th>Họ tên</th>
                <th>Năm sinh</th>
                <th>Số hiệu</th>
                <th>Đơn vị</th>
                <th>Chức vụ</th>
                <th>Phân loại</th>
                <th>Bác sỹ kết luận</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i=0;
                while($rs = mysqli_fetch_array($tbphieukham)){
                    $i+=1;
                ?>
                <?php
                    if ($id == $rs["id"]){ echo "<tr class='success'>";
                    }else{echo "<tr>";}
                ?>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rs["nam"]; ?></td>
                    <td><?php echo $rs["hoten"]; ?></td>
                    <td><?php echo $rs["namsinh"]; ?></td>
                    <td><?php echo $rs["sohieu"]; ?></td>
                    <td><?php echo $rs["tendv"]; ?></td>
                    <td><?php echo $rs["tenchucvu"]; ?></td>
                    <td>
                        <?php 
                        switch ($rs["phanloai"]){
                            case 1:
                                echo "loại I";
                                break;
                            case 2:
                                echo "loại II";
                                break;
                            case 3:
                                echo "loại III";
                                break;
                            case 4:
                                echo "loại IV";
                                break;
                            case 5:
                                echo "loại V";
                                break;
                            default:
                        }
                        ?>
                    </td>
                    <td><?php echo $rs["bacsy"]; ?></td>
                    <td>
                        <a href="index.php?form=<?php echo $form?>&act=edit&id=<?php echo $rs["id"]?>">
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

<script>
function check(obj){
    var classs = obj.className;
    
    var elements = document.getElementsByClassName(classs);
    if(obj.checked == true){
        for( var i = 0; i< elements.length -1; i++){
            elements[i].checked = true;
        }
    }else{
        for( var i = 0; i< elements.length -1; i++){
            elements[i].checked = false;
        }
    }
    
}
</script>