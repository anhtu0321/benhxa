<?
	include("../admin/config.php");
	session_start();
	$oldpass = $_POST["oldpass"];
	$newpass = $_POST["newpass"];
	$nguoinhap = $_SESSION["user_huye_name"];
	$sql = "select password from users where username = '$nguoinhap'";
	$tb = mysql_query($sql); $rs = mysql_fetch_array($tb); 
	if($rs["password"] == $oldpass){
		$sql = "update users set password = '$newpass' where username = '$nguoinhap'";
		mysql_query($sql);
		echo "<span style='color:red'>Đổi mật khẩu thành công !</span>";
	}
	else{
		echo "<span style='color:red'>Mật khẩu cũ không đúng !</span>";
	}
?>
