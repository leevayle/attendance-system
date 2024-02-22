// clock in and out var's
var now = document.getElementById('time').textContent;
document.getElementById('button1').addEventListener('click', ()=>{
    localStorage.setItem('ci', now);
});
