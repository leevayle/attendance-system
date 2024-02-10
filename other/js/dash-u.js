document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById('username').innerHTML = localStorage.getItem("user")+ " " +localStorage.getItem("lName");
    document.getElementById('email').innerHTML = localStorage.getItem("email");

    const clockin = "clock-in.html";
    const clockout = "clock-out.html";

    document.getElementById('clock-in-phone').addEventListener('click', ()=>{
        Loading();
        setTimeout(()=>{
            window.location.href = clockin;
        },950);
    });

    document.getElementById('clock-out-phone-dash').addEventListener('click', ()=>{
        Loading();
        setTimeout(()=>{
            window.location.href = clockout;
        },950);
    });
});
const myValue2 = localStorage.getItem('profileUrl');


if (myValue2 === null || myValue2 === undefined) {
    document.getElementById('user-profile').src = "images/ser.png";
} else {
    
  document.getElementById('user-profile').src = myValue2;
}