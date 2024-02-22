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
                   // window.location.href = "clock-in.html";

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
    document.getElementById("clock-out-button").addEventListener("click", sendAjaxRequest);
});
