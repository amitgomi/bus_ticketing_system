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