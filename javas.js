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

function hover1(element) {
    element.setAttribute('src', 'img/amit1.png');
}

function unhover1(element) {
    element.setAttribute('src', 'img/amit.png');
}
function hover2(element) {
    element.setAttribute('src', 'img/vikash1.png');
}

function unhover2(element) {
    element.setAttribute('src', 'img/vikash.png');
}
function hover3(element) {
    element.setAttribute('src', 'img/shivansh1.png');
}

function unhover3(element) {
    element.setAttribute('src', 'img/shivansh.png');
}
function hover4(element) {
    element.setAttribute('src', 'img/sahil1.png');
}

function unhover4(element) {
    element.setAttribute('src', 'img/sahil.png');
}
function hover5(element) {
    element.setAttribute('src', 'img/rakshit1.png');
}

function unhover5(element) {
    element.setAttribute('src', 'img/rakshit.png');
}

