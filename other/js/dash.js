// leevayle@protonmail.com
// Prevent right
document.getElementById('usernamedash').innerHTML = localStorage.getItem("user");


document.getElementById('p1').addEventListener('contextmenu',(event)=>{event.preventDefault()});

document.getElementById('blur-back-100').addEventListener('contextmenu',(event)=>{event.preventDefault()});

//Success notif
document.getElementById('apply-filters').addEventListener('click',()=>{
    successtext.textContent = 'Working...';
    success.style.display = 'block';
    showNotif();
});




//navigation actions...both pc and mobile
const dash = "dash.html";
const clockin = "clock-in.html";
const reports = "reports.html";
const clockout = "clock-out.html";
const register = "register.php";


const myValue = localStorage.getItem('profileUrl');

if (myValue === null || myValue === undefined) {
    document.getElementById('user-profile').src = "images/ser.png";
} else {

  document.getElementById('user-profile').src = myValue;
}


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

// settings btn
const set = document.getElementById('settings-back');
document.getElementById('settingsbtn').addEventListener('click', ()=>{
    
    set.style.right = (set.style.right === '-500px' || set.style.right === '') ? '10px' : '';
});
document.getElementById('settings-close').addEventListener('click', ()=>{
     set.style.right = '-500px';
});



document.getElementById('clock-out-phone-reports').addEventListener('click', ()=>{
    Loading();
    setTimeout(()=>{
        window.location.href = clockout;
    },950);
});

