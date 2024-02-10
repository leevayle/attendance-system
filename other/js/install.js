//written by kinanga  -> leevayle@protonmail.com


document.addEventListener("DOMContentLoaded", function() {
    const Bar = document.getElementById("loading");

    Bar.style.width = '0%';

    setTimeout( ()=>{
        Bar.style.width = '18%';
    },1500);

    setTimeout( ()=>{
        Bar.style.width = '38%';
    },6500);

    setTimeout( ()=>{
        Bar.style.width = '78%';
    },15000);

    setTimeout( ()=>{
        Bar.style.width = '85%';
    },18000);
    setTimeout( ()=>{
        Bar.style.width = '92%';
    },25500);

    setTimeout( ()=>{
        Bar.style.width = '100%';
        document.getElementById('link').style.display = 'none';
        document.getElementById('link2').style.display = 'block';       

    },30000);
}); 