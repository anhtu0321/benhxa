<?php
    $trang = 1;
    $id = "";
    if(isset($_GET["id"])){$id=$_GET["id"];}  
    if(isset($_POST["trang"])){$trang = $_POST["trang"];}
        // Tính tổng số bản ghi
        $sql = "select count(id) as tong from phanmem" ;
        $tbtong = mysqli_query($con,$sql);
        $rstong = mysqli_fetch_array($tbtong);
        $tong = $rstong["tong"];
        // Các thông số để phân trang
        $num = 20;
        $sotrang = ceil($tong/$num);
        $vitribatdau = ($trang-1)*$num;
        // lấy cơ sở dữ liệu
        $sql = "select id,tieude,file from phanmem order by id DESC limit $vitribatdau,$num";
        $tb = mysqli_query($con,$sql);
    ?>
        <div class="col-sm-12 muctin no-padding chi-tiet-tin">
            <div class="col-sm-12 no-padding">
                <p class="tdmuctin"><a href="index.php?view=pmmt"><span class="glyphicon glyphicon-th">   </span> PHẦN MỀM MÁY TÍNH</a></p>
            <?php 
                $i=0;
                while($rs = mysqli_fetch_array($tb)){ $i+=1;
            ?>
                    <div class = "col-sm-12 margin-bottom-5">
                        <div class ="col-sm-12 no-padding">
                            <p class="tieude">
                                <a href="pmuploads/<?php echo $rs['file'];?>">
                                     - <?php echo $rs['tieude'];?>
                                </a>
                            </p>
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
                    <form action = "index.php?view=bcn" method="POST"> 
                        <button type="submit"> First 
                            <input type="text" name = "trang" value ="1" hidden="true">  
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
                        <form action = "index.php?view=bcn" method="POST"> 
                            <button type="submit"> <?php echo $i;?> 
                                <input type="text" name = "trang" value ="<?php echo $i;?>" hidden="true">  
                            </button>
                        </form>
                    </li>
                <?php }?>
                <li>
                    <form action = "index.php?view=bcn" method="POST"> 
                        <button type="submit"> End 
                            <input type="text" name = "trang" value ="<?php echo $sotrang;?>" hidden="true"> 
                        </button>
                    </form>
                </li>
            </ul>
        </div>
