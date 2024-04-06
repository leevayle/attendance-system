// leevayle@protonmail.com
const myValue2 = localStorage.getItem('profileUrl');
if (myValue2){
    document.getElementById('user-profile').src = myValue2;
}else{
    document.getElementById('user-profile').src = "images/ser.png";
}

//Initial theme of the page on load
document.addEventListener('DOMContentLoaded', ()=>{
    let initialtheme = localStorage.getItem("theme");
 
    if (initialtheme === 'masculine'){
     document.getElementById('stylesheet').href = "css/dash.css";
    }else{
     document.getElementById('stylesheet').href = "css/dash-f.css";
    }
 });
 

//fetch the table data
document.addEventListener('DOMContentLoaded', function() {
    // Load data from records.php when the page is loaded
    $.ajax({
        type: 'GET',
        url: 'records.php',
        dataType: 'html', // Expect HTML response
        cache: false, // Disable caching
        success: function(response) {
            // Display the fetched records in the graph1 div
            $('#graph1').html(response);
        },
        error: function(xhr, status, error) {
            // Handle any errors here
            console.error(error); // Log the error to the console for debugging
            alert('An error occurred while loading records. Please try again later.');
        }
    });
});

//filtering algorithm
$(document).ready(function() {
    // Fetch initial data
    $.ajax({
        url: 'table1.php',
        success: function(data) {
            $('#graph1').html(data);
            // Enable time filter after initial data load
            $('#early-late-filter').prop('disabled', false);
        },
        error: function(error) {
            console.error("Error fetching data:", error);
            alert("Error loading data.");
        }
    });

    // Fetch work in time
    $.ajax({
        url: 'time-filter.php', // Adjusted URL for work times script
        success: function(data) {
            var workInTime = data.workInTime;
            // Use workInTime in the filtering logic
        },
        error: function(error) {
            console.error("Error fetching work time:", error);
            alert("Error loading work time.");
        }
    });

    // Filter data on button click
    $('#applyfilters').click(function() {
        var dateFrom = $('#date-from').val();
        var dateTo = $('#date-to').val();
        var timeFilter = $('#early-late-filter').val();
        var idFilter = $('#id-no-filter').val();

        // Build filter query string based on selected filters
        var queryString = "";
        if (dateFrom) {
            queryString += "&date_from=" + dateFrom;
        }
        if (dateTo) {
            queryString += "&date_to=" + dateTo;
        }
        if (timeFilter) {
            queryString += "&time_filter=" + timeFilter;
        }
        if (idFilter) {
            queryString += "&id_no=" + idFilter;
        }

        // Send AJAX request with filters
        $.ajax({
            url: 'records.php?' + queryString, // Append query string to URL
            success: function(data) {
                $('#graph1').html(data);

                //notify user
               // successtext.textContent = "All selected filters applied";
               // success.style.display = "block";
               // showNotif();
            },
            error: function(error) {
                console.error("Error filtering data:", error);

                //notify user
                errortext.textContent = "Error filtering data";
                error.style.display = "block";
                showNotif();
            }
        });
    });

    // Clear filters on button click
    $('#disablefilters').click(function() {
        $('#date-from').val("");
        $('#date-to').val("");
        $('#early-late-filter').prop('selectedIndex', 0);
        $('#id-no-filter').val("");
        // Trigger another AJAX request to fetch all data without filters
        $('#applyfilters').click();

        //notify user
       // warningtext.textContent = "All filters removed";
       // warning.style.display = "block";
        //showNotif();
    });
});
setTimeout( ()=>{
    document.getElementById('disablefilters').click();
},500);


//printing
document.querySelectorAll('#printtable, #printtablemobile').forEach(element => {
    element.addEventListener('click', function() {
        // Retrieve company name from localStorage
        var companyName = localStorage.getItem('company');
        
        // Construct the window title
        var windowTitle = 'Attendance Records: printed by - ' + localStorage.getItem('user') + ' of ' + companyName;
        
        // Open a new window
        var printWindow = window.open('', '_blank');
        
        // Build HTML structure and write to print window
        printWindow.document.write(`
            <html>
            <head>
                <title>${windowTitle}</title>
                <link rel="stylesheet" href="css/print.css">
            </head>
            <body>
                <div id="tablediv">
                    ${document.getElementById('graph1').outerHTML}
                </div>
                
            </body>
            </html>
        `);
        
        // Set window title
        printWindow.document.title = windowTitle;
        
        // Trigger print after a short delay to ensure content is loaded
        setTimeout(function() {
            printWindow.print();
            printWindow.close(); // Close the print window after printing
        }, 500); // Adjust the delay as needed
    });
}); 



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