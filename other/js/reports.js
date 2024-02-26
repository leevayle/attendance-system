// leevayle@protonmail.com
const myValue2 = localStorage.getItem('profileUrl');
if (myValue2){
    document.getElementById('user-profile').src = myValue2;
}else{
    document.getElementById('user-profile').src = "images/ser.png";
}

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



//filter by from and to date
$(document).ready(function() {
    // Function to filter table rows based on date range
    function filterTableByDateRange() {
        // Get the "from" and "to" dates from the input fields
        var fromDate = new Date($('#date-from').val());
        var toDate = new Date($('#date-to').val());

        // Loop through each table row starting from the second row (index 1)
        $('table tr:gt(0)').each(function() {
            var rowDateStr = $(this).find('td:eq(5)').text(); // Assuming the date is in the 6th column (index 5)

            // Convert the row date string to a Date object
            var rowDate = new Date(rowDateStr);

            // Check if the row date falls within the specified range
            if (rowDate >= fromDate && rowDate <= toDate) {
                $(this).show(); // Show the row if it's within the range
            } else {
                $(this).hide(); // Otherwise, hide the row
            }
        });
    }

    // Call the filter function when the "from" or "to" date inputs change
    $('.filter-date-reports').on('change', filterTableByDateRange);
});

//filter by id no
$(document).ready(function() {
    // Function to filter table rows based on ID number
    function filterTableById() {
        // Get the ID number filter value
        var idNumber = $('#id-no-filter').val().trim().toLowerCase();

        // Loop through each table row starting from the second row (index 1)
        $('table tr:gt(0)').each(function() {
            var rowId = $(this).find('td:eq(0)').text().trim().toLowerCase(); // Assuming the ID number is in the first column (index 0)

            // Check if the row ID matches the filter value or if the filter value is empty
            if (rowId.includes(idNumber) || idNumber === '') {
                $(this).show(); // Show the row if it matches the filter or if the filter is empty
            } else {
                $(this).hide(); // Otherwise, hide the row
            }
        });
    }

    // Call the filter function when the ID number filter input changes
    $('#id-no-filter').on('input', filterTableById);
});


 // filter bu time
$(document).ready(function() {
    var workInTime; // Variable to store the fetched work in time
    
    // Function to fetch work in time from PHP
    function fetchWorkInTime() {
        $.ajax({
            type: 'GET',
            url: 'time-filter.php',
            dataType: 'json',
            success: function(response) {
                workInTime = response.workInTime;

                // Call the filterTableByTime function initially
                filterTableByTime();
            },
            error: function(xhr, status, error) {
                console.error('Error fetching work in time:', error);
                // Handle errors or display error message to the user
            }
        });
    }

    // Function to filter table rows based on selected filter option
    function filterTableByTime() {
        var timeFilter = $('#early-late-filter').val(); // Get selected time filter option

        // Loop through each table row starting from the second row (index 1)
        $('table tr:gt(0)').each(function() {
            var rowTimeIn = $(this).find('td:eq(3)').text().trim(); // Assuming time in is in the fourth column (index 3)

            // Compare the row time in with the fetched work in time and filter accordingly
            if (timeFilter === 'early' && rowTimeIn < workInTime) {
                $(this).show(); // Show the row for early check-ins
            } else if (timeFilter === 'late' && rowTimeIn >= workInTime) {
                $(this).show(); // Show the row for late check-ins
            } else {
                $(this).hide(); // Hide the row if it doesn't match the filter
            }
        });
    }

    // Call the fetchWorkInTime function when the document is ready to fetch work in time initially
    fetchWorkInTime();

    // Call the filterTableByTime function when the time filter select element changes
    $('#early-late-filter').on('change', function() {
        filterTableByTime(); // Re-filter the table when the time filter changes
    });
});

// Engaging and disengaging the filters all at once
$(document).ready(function() {
    // Function to filter table rows based on date range
    function filterTableByDateRange() {
        
    }

    // Function to filter table rows based on ID number
    function filterTableById() {
        // Your existing code for filtering by ID number
    }

    // Function to filter table rows based on time
    function filterTableByTime() {
        // Your existing code for filtering by time
    }


    // Bind click event to disable all filters
    $('#disablefilters').on('click', function() {
        // Show all rows and reset filter inputs
        $('table tr').show();
        $('.filter-date-reports').val('');
        $('#id-no-filter').val('');
        $('#early-late-filter').val('Time filter');
    });
});
document.addEventListener('DOMContentLoaded', ()=>{
    
    setTimeout( ()=>{
        document.getElementById('disablefilters').click();
    },500)
});

//printing
document.getElementById('printtable').addEventListener('click', function() {
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Print Table</title><link rel="stylesheet" href="css/dash.css"><link rel="stylesheet" href="print.css"></head><body>');
    printWindow.document.write('<div id="tablediv">'); // Start printing from this div
    printWindow.document.write(document.getElementById('graph1').outerHTML); // Print the table
    printWindow.document.write('</div>'); // End of printing
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
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