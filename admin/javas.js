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



var num=0;
var str="std0";
function add_intermediate(){
    if(num==9)
        return ;
    num=num+1;
    var count=document.getElementById("count_intermediate");
    var node = document.createTextNode(num);
    count.removeChild(count.childNodes[0]);
    count.appendChild(node);
    var nstr=str+num;
    console.log(nstr);
    var station = document.getElementById(nstr);
    station.style.display = "block";

    var val=document.getElementById("st_num");
    val.value=num;
}

function rem_intermediate(){
    if(num==0)
        return ;
    var nstr=str+num;
    console.log(nstr);
    var station = document.getElementById(nstr);
    station.style.display = "none";
    num=num-1;
    var count=document.getElementById("count_intermediate");
    var node = document.createTextNode(num);
    count.removeChild(count.childNodes[0]);
    count.appendChild(node);

    var val=document.getElementById("st_num");
    val.value=num;
}




function required(){
    var fl=0;
    var empt = document.forms["form1"]["bus_no"].value;
    if (empt == ""){
        document.getElementById("bus_no_alert").style.display="block";
        fl=1;
    }
    else
        document.getElementById("bus_no_alert").style.display="none";
    var empt = document.forms["form1"]["driver_name"].value;
    if (empt == ""){
        document.getElementById("driver_alert").style.display="block";
        fl=1;
    }
    else
        document.getElementById("driver_alert").style.display="none";
    var empt = document.forms["form1"]["total_seats"].value;
    if (empt == ""){
        document.getElementById("total_seat_alert").style.display="block";
        fl=1;
    }
    else
        document.getElementById("total_seat_alert").style.display="none";

    var empt = document.forms["form1"]["st00"].value;
    var nfl=0;
    if (empt == ""){
        document.getElementById("source_alert").style.display="block";
        fl=1;
    }
    var empt = document.forms["form1"]["stt00"].value;
    if (empt == 0){
        document.getElementById("source_alert").style.display="block";
        fl=1;
        nfl=1;
    }
    if(nfl==0)
        document.getElementById("source_alert").style.display="none";

    var st="st0";
    var stt="stt0";
    var stf="stf0";
    for (var i = 1; i <= num; i++) {
        var nfl=0;
        var empt = document.forms["form1"][st+i].value;
        if (empt == ""){
            document.getElementById("int0"+i+"_alert").style.display="block";
            fl=1;
            nfl=1;
        }
        var empt = document.forms["form1"][stt+i].value;
        if (empt == 0){
            document.getElementById("int0"+i+"_alert").style.display="block";
            fl=1;
            nfl=1;
        }
        var empt = document.forms["form1"][stf+i].value;
        if (empt == null){
            document.getElementById("int0"+i+"_alert").style.display="block";
            fl=1;
            nfl=1;
        }
        if(nfl==0)
            document.getElementById("int0"+i+"_alert").style.display="none";
    }



    var empt = document.forms["form1"]["st0d"].value;
    var nfl=0;
    if (empt == ""){
        document.getElementById("int0d_alert").style.display="block";
        fl=1;
            nfl=1;
    }
    var empt = document.forms["form1"]["stt0d"].value;
    if (empt == 0){
        document.getElementById("int0d_alert").style.display="block";
        fl=1;
            nfl=1;
    }
    var empt = document.forms["form1"]["stf0d"].value;
    if (empt == null){
        document.getElementById("int0d_alert").style.display="block";
        fl=1;
            nfl=1;
    }
    if(nfl==0)
        document.getElementById("int0d_alert").style.display="none";

    if(fl==0){
        return true;
    }
    else{
        return false;
    }
}