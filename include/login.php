<?php 
    session_start();
    include("../admin/config.php");
    $username = $_POST["un"];
    $password = $_POST["pw"];
    $sql = "select * from users where (username = '$username') and (password = '$password')";
    $tb = mysqli_query($con,$sql);
    $num = mysqli_num_rows($tb);
    if($num == 0){
        include("main/right/logouted.php");
        echo "Đăng nhập không thành công !";
    }else{
         $rs = mysqli_fetch_array($tb);
         $_SESSION["user_huye_id"] = $rs["id"];
         $_SESSION["user_huye_name"] = $rs["username"];
         $_SESSION["user_huye_full_name"] = $rs["fullname"];
         include("main/right/logined.php");
    }
?>