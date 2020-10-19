<?php
    $tab = "";
    if(isset($_GET["tab"])){$tab = $_GET["tab"];}
    $sql = "select id, tendv from donvi order by khoi asc, tt asc";
    $tbdonvi= mysqli_query($con,$sql);
    $sql = "select id, tenchucvu from chucvu order by capdo asc, id asc";
    $tbchucvu= mysqli_query($con,$sql);
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 wraper">
            <?php 
                if($tab == "person"){ include("include/main/person.php");}
                if($tab == "person_list"){ include("include/main/person_list.php");}
                if($tab == "person_detail"){ include("include/main/person_detail.php");}
                if($tab == "cb"){ include("include/main/cb.php");}
                if($tab == "nk"){ include("include/main/nk.php");}
                if($tab == "ck"){ include("include/main/ck.php");}
                if($tab == "ls"){ include("include/main/ls.php");}
                if($tab == "kl"){ include("include/main/kl.php");}
                if($tab == "th"){ include("include/main/th.php");}
                // if($tab == "person"){ include("include/main/person.php");}
                if($tab == ""){ include("include/main/home.php");}
            ?>
        </div>
    </div>
</div>