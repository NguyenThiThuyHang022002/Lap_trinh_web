    // function kiểm tra tên đăng nhập
    function ChecktenDN(){
            // khai báo biến
                var tendn=document.forms['frmlogin']['username'].value;
                var f=true;
            //kiểm tra tên đăng nhập
                if(tendn==''){
                    alert("Tên đăng nhập không được rỗng");
                    return false;
                }
                else if(tendn.length<8){
                    alert("Tên đăng nhập phải từ 8 kí tự trở lên");
                    return false;
                }

                else if(!/^[a-zA-Z0-9]+$/.test(tendn)){
                    alert("Tên đăng nhập không chứa kí tự đặc biệt");
                    return false;
                }
                else{
                    return f;
                }
               
            }
            
    // function kiểm tra mật khẩu
    function Checkmatkhau(){
             // khai báo biến
                var matkhau=document.forms['frmlogin']['password'].value;
                var f=true;
            //kiểm tra mật khẩu
                 if(matkhau==''){
                    alert("Mật khẩu không được rỗng!");
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
                else if(!/^.*(?=.*[@$#!%*?&]+$)/.test(matkhau)){
                     alert("Mật khẩu phải có ít nhất một kí tự đặc biệt sau :!,@, #, $, %, &, *,?");
                   return false;
                }
                else{
                    return f;
                }

            }
        