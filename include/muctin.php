<?php
    $id = $_GET["id"];
    if(isset($_POST["trang"])){$trang = $_POST["trang"];}else{$trang = 1;}

    // Tính tổng số bản ghi
    if(isset($_POST["muctin"])){$muctin = $_POST["muctin"];
        $sql = "select count(id) as tong from tintuc where muctin = '$muctin'" ;
        $muctin_post = $muctin;
    }else{
        $sql = "select count(id) as tong from tintuc where muctin = '$id'" ;
        $muctin_post = $id;
    }
    $tbtong = mysqli_query($con,$sql);
    $rstong = mysqli_fetch_array($tbtong);
    $tong = $rstong["tong"];
    // Các thông số để phân trang
    $num = 10;
    $sotrang = ceil($tong/$num);
    $vitribatdau = ($trang-1)*$num;
    // lấy cơ sở dữ liệu
    $sql = "select id,tieude,noidung,anh,ngaynhap from tintuc where muctin = '$id' order by id DESC limit $vitribatdau,$num";
    $tb = mysqli_query($con,$sql);
    $sqlmt = "select id,tenmuctin from muctin where id = '$id' ";
    $tbmt = mysqli_query($con,$sqlmt);
    $rsmt = mysqli_fetch_array($tbmt);
?>
<div class="col-sm-12 muctin no-padding chi-tiet-tin">
    <div class="col-sm-12 no-padding">
        <p class="tdmuctin"><a href="index.php?view=muctin&id=<?php echo $rsmt["id"];?>"><span class="glyphicon glyphicon-th"></span> <?php echo $rsmt["tenmuctin"];?></a></p>
    <?php 
        $i=0;
        while($rs = mysqli_fetch_array($tb)){ $i+=1;
    ?>
            <div class = "col-sm-12 margin-bottom-5">

                <div class="col-sm-3 hinhanh no-padding">
                    <img src = "imguploads/<?php echo $rs['anh'] ?>" width="100%"/>
                </div>
                <div class ="col-sm-9">
                    <p class="tieude"><a href="index.php?view=chitiet&id=<?php echo $rs['id'];?>"><?php echo $rs['tieude']?></a></p>
                    <p class="tomtat">
                        <?php 
                            $tomtat = substr($rs["noidung"], 0, 300);
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
                    <p class="ngaydang"><span class = "glyphicon glyphicon-time"></span> <?php echo $rs['ngaynhap']?></p>
                </div>
            </div>
    <?php
        }
    ?>
    </div>
</div>

<!-- Hiển thị trang -->
<div class="col-sm-12 text-right">
    <ul class="pagination">
        <li>
            <form action = "index.php?view=muctin&id=<?php echo $id ?>" method="POST"> 
                <button type="submit"> First 
                    <input type="text" name = "trang" value ="1" hidden="true"> 
                    <input type="text" name = "muctin" value ="<?php echo $muctin_post; ?>" hidden="true">  
                </button>
            </form>
        </li>
        <?php
        if($sotrang <= 10){$batdau=1;$ketthuc=$sotrang;}
        else {
            if($trang<5){$batdau=1;$ketthuc=10;}
            else if($trang+5 > $sotrang){$batdau=$sotrang-9;$ketthuc=$sotrang;}
            else{$batdau=$trang-4;$ketthuc=$trang+5;}
        }
        for($i=$batdau; $i<=$ketthuc; $i++){?>
            <?php if($trang == $i){echo "<li class='disabled'>";}else{echo "<li>";}?>
                <form action = "index.php?view=muctin&id=<?php echo $id ?>" method="POST"> 
                    <button type="submit"> <?php echo $i;?> 
                        <input type="text" name = "trang" value ="<?php echo $i;?>" hidden="true"> 
                        <input type="text" name = "muctin" value ="<?php echo $muctin_post;?>" hidden="true"> 
                    </button>
                </form>
            </li>
        <?php }?>
        <li>
            <form action = "index.php?view=muctin&id=<?php echo $id ?>" method="POST"> 
                <button type="submit"> End 
                    <input type="text" name = "trang" value ="<?php echo $sotrang;?>" hidden="true"> 
                    <input type="text" name = "muctin" value ="<?php echo $muctin_post;?>" hidden="true"> 
                </button>
            </form>
        </li>
    </ul>
</div>