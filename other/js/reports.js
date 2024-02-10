// leevayle@protonmail.com


//navigation actions...clock out for reports page
document.getElementById('reports-clock-out-phone').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href="clock-out.html";
    },950);
});
document.getElementById('clock-out-reports').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href="clock-out.html";
    },950);
});
document.getElementById('register-reports').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href="register.php";
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
        window.location.href="dash.html";
    },950);
});