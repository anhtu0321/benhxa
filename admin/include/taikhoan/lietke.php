<?php
     $id="";
     if(isset($_GET["id"])){$id = $_GET["id"];}
?>
<div class="col-sm-4 col-md-4 col-lg-4">
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>TT</th>
                <th>Username</th>
                
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $i=0;
                while($rs = mysqli_fetch_array($tbusers)){
                    $i+=1;
                ?>
                <?php
                    if ($id == $rs["id"]){ echo "<tr class='success'>";
                    }else{echo "<tr>";}
                ?>
                    <td><?php echo $i; ?></td>
                    <td><a href="index.php?form=<?php echo $form;?>&id=<?php echo $rs["id"];?>"><?php echo $rs["username"]; ?></a></td>
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
<div class="col-sm-8 col-md-8 col-lg-8">
    <?php 
    if ($id !=""){
    ?>
    <form action="include/taikhoan/xuly.php?form=<?php echo $form?>&id=<?php echo $id;?>" method="POST" class="form-inline" role="form">
        <table class="table table-hover table-condensed ">
            <thead>
                <tr>
                    <th colspan="6">
                    <div class = "col-md-12 text-primary">
                        Phân quyền tài khoản
                    </div>
                    </th>
                </tr>
                <tr>
                    <th>Tên chức năng</th>
                    <th><div class="text-center">Xem</div></th>
                    <th><div class="text-center">Thêm</div></th>
                    <th><div class="text-center">Sửa</div></th>
                    <th><div class="text-center">Xóa</div></th>
                    <th><div class="text-center">Full</div></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($mangchucnang as $key => $value){
                    $sql = "select * from phanquyen where user = '$id' and form = '$value[id]'";
                    $tb = mysqli_query($con,$sql); $rs = mysqli_fetch_array($tb);
                ?>
                <tr>
                    <td>
                        <?php echo $value["tenmenu"];?>
                    </td>
                    <td align="center">
                    <?php if($rs["xem"] == 1){ ?>
                        <input type="checkbox" class="check<?php echo $key?>" value = "1" name="xem<?php echo $key?>" checked="checked">
                    <?php }else{ ?>
                        <input type="checkbox" class="check<?php echo $key?>" value = "1" name="xem<?php echo $key?>" >
                    <?php } ?>
                    </td>
                    <td align="center">
                    <?php if($rs["them"] == 1){ ?>
                        <input type="checkbox" class="check<?php echo $key?>" value = "1" name="them<?php echo $key?>" checked="checked">
                    <?php }else{ ?>
                        <input type="checkbox" class="check<?php echo $key?>" value = "1" name="them<?php echo $key?>" >
                    <?php } ?>
                    </td>
                    <td align="center">
                    <?php if($rs["sua"] == 1){ ?>
                        <input type="checkbox" class="check<?php echo $key?>" value = "1" name="sua<?php echo $key?>" checked="checked">
                    <?php }else{ ?>
                        <input type="checkbox" class="check<?php echo $key?>" value = "1" name="sua<?php echo $key?>" >
                    <?php } ?>
                    </td>
                    <td align="center">
                    <?php if($rs["xoa"] == 1){ ?>
                        <input type="checkbox" class="check<?php echo $key?>" value = "1" name="xoa<?php echo $key?>" checked="checked">
                    <?php }else{ ?>
                        <input type="checkbox" class="check<?php echo $key?>" value = "1" name="xoa<?php echo $key?>" >
                    <?php } ?>
                    </td>
                    <td align="center"><input type="checkbox" class="check<?php echo $key?>" onclick = "check(this);" ></td>      
                </tr>
                <?php
                }
                ?>
                
            </tbody>
        </table>
        <div align="center"><button type="submit" name="capnhat" class="btn btn-danger">Cập nhật</button></div>
    </form>
    <?php } ?>
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