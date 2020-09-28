<?php
     $id="";
     if(isset($_GET["id"])){$id = $_GET["id"];}
?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>TT</th>
                <th>Ký hiệu</th>
                <th>Tên đầy đủ</th>
                <th>Khối</th>
                <th>Trạng thái</th>
                <th>Thứ tự</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i=0;
                while($rs = mysqli_fetch_array($tbdonvi)){
                    $i+=1;
                ?>
                <?php
                    if ($id == $rs["id"]){ echo "<tr class='success'>";
                    }else{echo "<tr>";}
                ?>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $rs["tendv"]; ?></td>
                    <td><?php echo $rs["tendaydu"]; ?></td>
                    <td>
                        <?php 
                            switch ($rs["khoi"]){
                                case 1:
                                    echo "Ban Giám đốc";
                                    break;
                                case 2:
                                    echo "Khối Trực thuộc";
                                    break;
                                case 3:
                                    echo "Khối An ninh";
                                    break;
                                case 4:
                                    echo "Khối Cảnh sát";
                                    break;
                                case 5:
                                    echo "Khối huyện, TP";
                                    break;
                                default:
                                    break;
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            switch ($rs["trangthai"]){
                                case 0:
                                    echo "Không sử dụng";
                                    break;
                                case 1:
                                    echo "Sử dụng";
                                    break;
                                default:
                                    break;
                            }
                        ?>
                    </td>
                    <td><?php echo $rs["tt"]; ?></td>
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