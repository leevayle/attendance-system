//varriables
const password = document.getElementById('password');
const myValue1 = localStorage.getItem('profileUrl');


// displaying the profile pic
if (myValue1){
    document.getElementById('user-profile').src = myValue1;
}else{
    document.getElementById('user-profile').src = "images/ser.png";
}

// password peek
document.getElementById('checkbox').addEventListener('click', ()=>{
    var pass = document.getElementById('password');

    if (pass.type === 'text'){
        pass.type = 'password';

    } else{
        pass.type = 'text';
        setTimeout(()=>{
            pass.type = 'password';
        },2500);
    }
});

//automatically focus the username field on load
document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('fname').focus();
});

document.getElementById('clock-reports').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href="reports.html";
    },950);
});

document.getElementById('clock-out-reports').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href="clock-out.html";
    },950);
});

document.getElementById('nav-clock-in').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href="clock-in.html";
    },950);
});

document.getElementById('nav-dashboard').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href="fetch.php";
    },950);
});