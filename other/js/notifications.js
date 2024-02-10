//notifications
const success = document.getElementById('success');
var successtext = document.getElementById('success-text');
const closesuccess = document.getElementById('closesuccess');
const info = document.getElementById('info');
var infotext = document.getElementById('info-text');
const closeinfo = document.getElementById('closeinfo');
const error = document.getElementById('error');
var errortext = document.getElementById('error-text');
const closeerror = document.getElementById('closeerror');
const warning = document.getElementById('warning');
var warningtext = document.getElementById('warning-text');
const closewarning = document.getElementById('closewarning');
const notifycont = document.getElementById('notify-cont');


//overall animation
function showNotif(){
    navigator.vibrate([50,0,0,50]);
    notifycont.style.top = '0px';
    setTimeout(()=>{
        hideNotif();
    },3000)
};

//hide the notification container
function hideNotif(){ 
    notifycont.style.top = '-150px';
    setTimeout(()=>{
        success.style.display = 'none';
        info.style.display = 'none';
        warning.style.display = 'none';
        error.style.display = 'none';
    },500);
};


//closing notifications
closesuccess.addEventListener('click',hideNotif);
closeinfo.addEventListener('click',hideNotif);
closewarning.addEventListener('click',hideNotif);
closeerror.addEventListener('click',hideNotif);