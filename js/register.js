function Checkregister(){
    var hoten=document.forms['frmregister']['name'].value;
    var tendn=document.forms['frmregister']['username'].value;
    var matkhau=document.forms['frmregister']['password'].value;
    var matkhau2=document.forms['frmregister']['xnpassword'].value;
    var email=document.forms['frmregister']['email'].value;
    var dthoai=document.forms['frmregister']['sodienthoai'].value;
    var diachi=document.forms['frmregister']['diachi'].value; 
    var t=true;

    //kiểm tra họ và tên
    // if(hoten==''||hoten.length<5||!/^[a-zA-Z0-9]+$/.test(hoten)){
    //     alert("Họ và tên không được trống, là chuỗi kí tự có ít nhất 5 kí tự và không chứa kí tự đặc biệt!");
    //     return false;
    // }
    // //Kiểm tra tên đăng nhập
    if(tendn==''||tendn.length<8||!/^[a-zA-Z0-9]+$/.test(tendn)){
        alert('Tên đăng nhập không được trống, là chuỗi kí tự có ít nhất 8 kí tự và không chứa kí tự đặc biệt!');
        return false;
    }

    //Kiểm tra mật khẩu
    if(matkhau==''){
        alert("Mật khẩu không được rỗng"); 
       return false;
    }
    else if(matkhau.length<8){ 
        alert("Mật khẩu phải từ 8 kí tự trở lên");
       return false;
    }
    else if(!/^.*(?=.*[0-9])/.test(matkhau)){
        alert("Mật khẩu phải có ít nhất một số");
       return false;
    }
    else if(!/^.*(?=.*[A-Z])/.test(matkhau)){
         alert("Mật khẩu phải có ít nhất một chữ hoa");
       return false;
    }
    else if(!/^.*(?=.*[a-z])/.test(matkhau)){
        alert("Mật khẩu phải có ít nhất một chữ thường");
       return false;
    }
    else if(!/^.*(?=.*[@$#!%*?&])/.test(matkhau)){
         alert("Mật khẩu phải có ít nhất một kí tự đặc biệt sau :!,@, #, $, %, &, *,?");
       return false;
    }
    
    //kiểm tra  xác nhận mật khẩu
     else if(matkhau2==''|| matkhau2!=matkhau){
        alert("Mật khẩu nhập lại không đúng");
        return false;
    }

    // //kiểm tra email
     else if(email==''|| !/^[a-zA-Z0-9.!#%&$*+/=?^_|{}~-]+@[a-zA-Z0-9]+)*$/.test(email)){
        alert("Chưa đúng dạng email!");
        return false;
    }
    // //kiểm tra số điện thoại
     else if(dthoai==''||/^{0-9}{10}$/.test(dthoai)){
        alert("Số điện thoại dạng số có 10 kí tự số");
        return false;
    }
    // //kiểm tra địa chỉ
   else if(diachi==''){
        alert("Địa chỉ không được trống");
        return false;
    }
    return t;
}





