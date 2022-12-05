
    function signup(){
        var email = document.getElementById("txtEmail").value; 
        var password = document.getElementById("txtPassword").value ; 
        var confirm = document.getElementById("txtConfirm").value; 
        var user = document.getElementById("txtUser").value;
     
             if( user == "" ){
            document.getElementById('thongbao').innerHTML = " Vui lòng điền tên đăng nhập " ;
          }
             else if( email =="") {
                document.getElementById('thongbao').innerHTML = "Chưa nhập email "; 
              }
                       else if(password =="" ){
                          document.getElementById('thongbao').innerHTML = "Nhập mật khẩu " ;
                          document.getElementById('txtPassword').color = red ;
                        }  
                        else if(confirm == "" ){
                          document.getElementById('thongbao').innerHTML =  " Vui lòng nhập lại mật khẩu " ;
                        }
                        else if(password != confirm){
                          document.getElementById('thongbao').innerHTML = "Mật khẩu nhập lại phải trùng nhau"
                        }
                    
                        else { 
                          document.getElementById('thongbao').innerHTML = "Đăng ký thành công!";
    
                        }
          
        }
       
    