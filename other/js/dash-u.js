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


if (myValue2) {
    document.getElementById('user-profile').src = myValue2;
} else{
    document.getElementById('user-profile').src = "images/ser.png";
}

const enrol = localStorage.getItem("enrolled");
if (enrol == "yes") {
    document.getElementById('enrolled').src = "images/verified.png";
} else {
    
  document.getElementById('enrolled').src = "images/not verified.png";
}


document.addEventListener("DOMContentLoaded", function() {
    // Function to send ID number to clockfetch.php
    function sendIdToClockFetch() {
        // Retrieve ID number from local storage
        var id_no = localStorage.getItem("idNo");

        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the AJAX request
        xhr.open("POST", "clockfetch.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Define what happens when the AJAX request is complete
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful, save response to localStorage
                localStorage.setItem("instatus", xhr.responseText);
                console.log("instatus = " + xhr.responseText);
            } else {
                // Request failed, handle error if needed
                console.log("Request to clockfetch.php failed");
            }
        };

        // Send the AJAX request with the ID number as data
        xhr.send("id_no=" + id_no);
    }

    // Call the function to send ID number to clockfetch.php
    sendIdToClockFetch();
});

document.addEventListener("DOMContentLoaded", function() {
    // Function to send ID number to clockoutfetch.php
    function sendIdToClockFetch() {
        // Retrieve ID number from local storage
        var id_no = localStorage.getItem("idNo");

        // Create an XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define the AJAX request
        xhr.open("POST", "clockoutfetch.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Define what happens when the AJAX request is complete
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful, save response to localStorage as outstatus
                localStorage.setItem("outstatus", xhr.responseText);
                console.log("outstatus = " + xhr.responseText);
            } else {
                // Request failed, handle error if needed
                console.log("Request to clockoutfetch.php failed");
            }
        };

        // Send the AJAX request with the ID number as data
        xhr.send("id_no=" + id_no);
    }

    // Call the function to send ID number to clockoutfetch.php
    sendIdToClockFetch();
});




document.addEventListener('DOMContentLoaded', ()=>{

    setTimeout(()=>{
const instat = localStorage.getItem("instatus");
const outstat = localStorage.getItem("outstatus");

if (instat == "yes"){
    document.getElementById('clock-in-status').src = "images/icons/check.png";
    document.getElementById('bar1').style.background = "#039dcc";
}

if (outstat == "yes"){
    document.getElementById('clock-out-status').src = "images/icons/check.png";
    document.getElementById('bar2').style.background = "#039dcc";
}
    },950);
});