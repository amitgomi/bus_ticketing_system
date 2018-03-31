function logout() {
    $.ajax({
        type: "POST",
        url: 'ajax.php',
        data:{action:'log_out'},
        success:function(html) {
        alert(html);
        }
    });
}
function update_profile() {
    $.ajax({
        type: "POST",
        url: 'ajax.php',
        data:{action:'update_profile',
            user_name:document.getElementById('user_name').value,
            first_name:document.getElementById('first_name').value,
            last_name:document.getElementById('last_name').value,
            email_id:document.getElementById('email_id').value,
            phone_no:document.getElementById('phone_no').value

            },
        success:function(html) {
        alert(html);
        }
    }); 
}   

function register() {
    var x = document.getElementById('r_password').value;
    var y = document.getElementById('con_password').value;
    var user_name =document.getElementById('user_name').value;
    if(user_name.indexOf(' ') >= 0  || user_name.length==0){
        window.alert("invalid user_name");
        return;
    }
    else if(x!=y){
        window.alert("password and confirm password did not match");
        return;
    }
    
    if(! (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('email_id').value)))
    {
       return ;
    }
    
    $.ajax({
        type: "POST",
        url: 'ajax.php',
        data:{action:'register',
            user_name:document.getElementById('user_name').value,
            first_name:document.getElementById('first_name').value,
            last_name:document.getElementById('last_name').value,
            email_id:document.getElementById('email_id').value,
            phone_no:document.getElementById('phone_no').value,
            password:document.getElementById('r_password').value

            },
        success:function(html) {
        alert("done");
        }
    });
    //window.alert("invalid ");
     
}   