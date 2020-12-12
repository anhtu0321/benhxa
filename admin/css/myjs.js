
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

/********************************* XỬ LÝ SỰ KIỆN NHẬP HỌ TÊN, SỐ HIỆU TRONG FORM THÊM PHIẾU KHÁM *****************/
var hoten = document.getElementById("hoten");
var sohieu = document.getElementById("sohieu");
if(sohieu){sohieu.addEventListener("keyup",delaylocbenhnhan);}
if(hoten){hoten.addEventListener("keyup",delaylocbenhnhan);}
function delaylocbenhnhan(){
	if(hoten.delay){clearTimeout(hoten.delay);}
	hoten.delay = setTimeout(locketqua,300);
}
function locketqua(){
	http.open("post","include/phieukham/jslocketqua.php",true);
	http.onreadystatechange = xllocketqua;
	var formData = new FormData();
	var ht = hoten.value;
	var sh = sohieu.value;	
	formData.append("ht",ht);
	formData.append("sh",sh);
	http.send(formData);
}

function xllocketqua(){
	if(http.readyState == 4 & http.status == 200){
		document.getElementById("showbenhnhan").innerHTML = http.responseText;
		/*history.back();
		 hostory.go(-1);*/
	}
}
function loadData(hoten, namsinh, gioitinh, sohieu, donvi, chucvu, nhommau){
	document.getElementById("hoten").value = hoten;
	document.getElementById("namsinh").value = namsinh;
	document.getElementById("sohieu").value = sohieu;
	document.getElementById("chucvu").value = chucvu;
	document.getElementById("donvi").value = donvi;
	document.getElementById("nhommau").value = nhommau;
	var nam = document.getElementById("nam");
	var nu = document.getElementById("nu")
	if(nam.value == gioitinh){
		nam.checked = 'checked';
	}else{nu.checked = 'checked';}
}
/********************************* XỬ LÝ KIỂM TRA SỐ HIỆU KHÔNG ĐƯỢC TRỐNG *****************/
function validate(){
	if(sohieu.value == ""){
		alert("Số hiệu không được phép để trống !");
		return false;
	}else{
		return true;
	}
}
