// leevayle@protonmail.com
// Prevent right
document.getElementById('usernamedash').innerHTML = localStorage.getItem("user");
document.getElementById('company-name').innerHTML = localStorage.getItem("company");
document.getElementById('totalreg').textContent = localStorage.getItem("totalreg");
const totalemployees = localStorage.getItem("totalreg");
const totalpresent = localStorage.getItem("totalclocks");
document.getElementById('totalenrolled').textContent = (totalemployees-totalpresent);

document.getElementById('totalclocks').textContent = localStorage.getItem("totalclocks");
document.getElementById('totallate').textContent = localStorage.getItem("totallate");
document.getElementById('totalontime').textContent = localStorage.getItem("totalontime");


document.getElementById('p1').addEventListener('contextmenu',(event)=>{event.preventDefault()});

document.getElementById('blur-back-100').addEventListener('contextmenu',(event)=>{event.preventDefault()});

//Success notif
document.getElementById('apply-filters').addEventListener('click',()=>{
    successtext.textContent = 'Working...';
    success.style.display = 'block';
    showNotif();
});




//navigation actions...both pc and mobile
var idNo = localStorage.getItem('idNo');

const dash = "fetch.php?idNo="+ idNo;
const clockin = "clock-in.html";
const reports = "reports.html";
const clockout = "clock-out.html";
const register = "register.php";


const myValue = localStorage.getItem('profileUrl');
if (myValue){
    document.getElementById('user-profile').src = myValue;
}else{
    document.getElementById('user-profile').src = "images/ser.png";
}

// Get references to the textboxes
const searchInput1 = document.getElementById('search2');
const searchInput2 = document.getElementById('search-dash-top');

// Add event listeners for focus events
searchInput1.addEventListener('focus', () => {
    // Clear the value of the second textbox
    searchInput2.value = '';
});

searchInput2.addEventListener('focus', () => {
    // Clear the value of the first textbox
    searchInput1.value = '';
});



const thisstatus = localStorage.getItem('thisstatus');
if (thisstatus == "yes"){
    document.getElementById('profile-status').style.background = 'lime';
}else{
    document.getElementById('profile-status').style.background = 'red';
}
//refresh dash immediately after load  //Goofy way of updating the clock status color
document.addEventListener('DOMContentLoaded', () => {
    if (!sessionStorage.getItem('buttonClicked')) {
        document.getElementById('refreshbtn').click();
        sessionStorage.setItem('buttonClicked', true);
    }
});


//Initial theme of the page on load
document.addEventListener('DOMContentLoaded', ()=>{
   let initialtheme = localStorage.getItem("theme");

   if (initialtheme === 'masculine'){
    document.getElementById('stylesheet').href = "css/dash.css";
   }else{
    document.getElementById('stylesheet').href = "css/dash-f.css";
   }
});

//theme changes
document.getElementById('feminine').addEventListener('click', ()=>{
    var styles = document.getElementById('stylesheet');
    localStorage.setItem("theme",`feminine`);
    console.log('Theme 2 activated');
    styles.href = "css/dash-f.css";
});
document.getElementById('masculine').addEventListener('click', ()=>{
    var styles = document.getElementById('stylesheet');
    localStorage.setItem("theme",`masculine`);
    console.log('Theme 1 activated');
    styles.href = "css/dash.css";
}); // I need an ajax that updates the database with the theme



document.getElementById('register').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = register;
    },950);
});
document.getElementById('nav-dashboard').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = dash;
    },950);
});
document.getElementById('dash-phone').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = dash;
    },950);
});

document.getElementById('nav-clock-in').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = clockin;
    },950);
});
document.getElementById('clock-in-phone').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = clockin;
    },950);
});

document.getElementById('clock-reports').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = reports;
    },950);
});
document.getElementById('clock-reports-phone').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = reports;
    },950);
});

document.getElementById('nav-clock-out').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = clockout;
    },950);
});
document.getElementById('clock-out-phone-dash').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = clockout;
    },950);
});

document.getElementById('notificationsbtn').addEventListener('click', ()=>{
    setTimeout(()=>{
    
        infotext.textContent = "No new notifications";
        info.style.display = "block";
        showNotif();
    }, 30);
});
document.getElementById('refreshbtn').addEventListener('click', ()=>{
    setTimeout(()=>{
    
        successtext.textContent = "Refreshing dahboard";
        success.style.display = "block";
        showNotif();
    }, 30);
    setTimeout(()=>{
        window.location.href = dash;
    },1000);
});

// settings btn
const set = document.getElementById('settings-back');
document.getElementById('settingsbtn').addEventListener('click', ()=>{
    
    set.style.right = (set.style.right === '-500px' || set.style.right === '') ? '10px' : '';
});
document.getElementById('settings-close').addEventListener('click', ()=>{
     set.style.right = '-500px';
});