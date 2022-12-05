function signin(){
    var password = document.getElementById("txtPassword").value ; 
    var user = document.getElementById("txtUser").value;
     if(user == ""){
        txtUser.border.color = red ;
        document.getElementById('thongbao').innerHTML = " Vui lòng điền tên đăng nhập " ;
      }  
      else if(password=="" ) {
            document.getElementById('thongbao').innerHTML = "Nhập mật khẩu " ;
          }else { 
                      document.getElementById('thongbao').innerHTML = "Đăng nhập thành công!";
                }
      
    }
   
