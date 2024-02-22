function DisplayTime(){
    const now = new Date();

    var hours = now.getHours();
    const minutes = now.getMinutes();
    const sec = now.getSeconds();

    const ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12 || 12; //convert to 12 clock

    const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2,'0')}:${sec.toString().padStart(2,'0')} ${ampm}`;

    //date vars
    const month = now.toLocaleString('default', {month: 'long' });
    const day = now.getDate().toString().padStart(2, '0');
    const year = now.getFullYear();

    const formattedDate = `${month} ${day}, ${year}`;

    document.getElementById('time').textContent = formattedTime;
    document.getElementById('date').textContent = formattedDate;
    document.getElementById('date1').textContent = formattedDate;
};
setInterval(DisplayTime, 1000);

//opening other pages
const loading = document.getElementById('blur-back-100');

function Loading(){
    loading.style.display = 'flex';

    setTimeout(()=>{
        loading.style.opacity = '1';    
        },100);
    setTimeout(()=>{
    loading.style.opacity = '0';    
    },900);

    setTimeout(()=>{
        loading.style.display = 'none';
    },1000);
};

// Function to log out users
function LogOut(){
    Loading();
    setTimeout(()=>{
        window.location.href="login.php";
    },950);
};

function LogIn(){
    Loading();
    var role = localStorage.getItem("role");
    if (role=='user'){
        setTimeout(()=>{
            window.location.href="dash-u.html";
        },950); 
    }else{
        setTimeout(()=>{
            window.location.href="fetch.php";
        },950);
    }
    
};

function ClockIn(){
    Loading();
    var role = localStorage.getItem("role");
    if (role=='user'){
        setTimeout(()=>{
            window.location.href="dash-u.html";
        },950); 
    }else{
        setTimeout(()=>{
            window.location.href="fetch.php";
        },950);
    }
};

/*function SendData() {
    document.addEventListener("DOMContentLoaded", function() {
        // Flag to track whether the AJAX request is sent
        var ajaxSent = false;
    
        // Function to handle the AJAX request
        function sendAjaxRequest() {
            if (!ajaxSent) {
                // Retrieve values from localStorage
                var id_no = localStorage.getItem("idNo");
                var fname = localStorage.getItem("user");
                var lname = localStorage.getItem("lName");
    
                // Create an AJAX request
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "./clockin.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
                // Construct the data to be sent
                var data = "id_no=" + id_no + "&fname=" + fname + "&lname=" + lname;
    
                // Define what happens on successful data submission
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        console.log('Request successful');
                        // Redirect the user after successful submission if needed
                        // window.location.href = "success.html";
    
                        // Set ajaxSent flag to true
                        ajaxSent = true;
                    } else {
                        console.log('Request failed');
                        // Handle errors here if needed
                    }
                };
    
                // Send the request
                xhr.send(data);
            }
        }
    
        // Bind the event listener for triggering the AJAX request
    });
    
} */