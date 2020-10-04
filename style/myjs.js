
/* KHAI BÁO HTTP ĐỂ SỬ DỤNG AJAX*/
	function createObj(){
		if(navigator.appName == "Microsoft Internet Explorer"){
			obj = new ActiveXObject("Microsoft.XMLHTTP");
		} else {
			obj = new XMLHttpRequest();
		}
		return obj;
	}
	var http = createObj();
/********************************* XỬ LÝ LOGIN, XỬ LÝ ĐỔI MẬT KHẨU*****************/
	function login(){
		http.open("post","include/login.php",true);
		http.onreadystatechange = xllogin;
		var formData = new FormData();
		var un = document.getElementById("user").value;
		var pw = document.getElementById("pass").value;	
		formData.append("un",un);
		formData.append("pw",pw);
		http.send(formData);
	}
	function xllogin(){
		if(http.readyState == 4 & http.status == 200){
			document.getElementById("show").innerHTML = http.responseText;
			/*history.back();
			 hostory.go(-1);*/
		}
	}
	function xlDoiMatKhau(){
		http.open("post","include/xldoimatkhau.php",true);
		http.onreadystatechange = xldoimatkhauprosess;
		var formData = new FormData();
		var oldpass = document.getElementById("oldpass").value;
		var newpass = document.getElementById("newpass").value;
		var renewpass = document.getElementById("renewpass").value;
		if(oldpass != "" & newpass != "" & newpass == renewpass){
			formData.append("oldpass",oldpass);
			formData.append("newpass",newpass);
			formData.append("renewpass",renewpass);
			http.send(formData);
			document.getElementById("oldpass").value="";
			document.getElementById("newpass").value="";
			document.getElementById("renewpass").value="";
		} else if(oldpass ==""){alert("Bạn chưa nhập mật khẩu cũ !");
		} else if(newpass ==""){alert("Mật khẩu mới không được trống !");
		} else if(newpass != renewpass){alert("Nhập lại mật khẩu mới không đúng !");
		}
	}
	function xldoimatkhauprosess(){
		if(http.readyState == 4 & http.status == 200){
			document.getElementById("tbdoipass").innerHTML = http.responseText;
		}
	}
/********************************* XỬ LÝ SỰ KIỆN NHẬP HỌ TÊN, SỐ HIỆU TRONG FORM THÊM PHIẾU KHÁM *****************/
var hoten = document.getElementById("hoten");
hoten.addEventListener("keyup",locbenhnhan);
function locbenhnhan(){
	if(hoten.delay){clearTimeout(hoten.delay);}
	hoten.delay = setTimeout(alet,1000);
}
function alet(){
	alert("hoang van tu");
}