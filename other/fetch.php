<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendancesystemapp001";
    
    // Connection to MySQL server
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo '<script>
        window.location.href="dash.html";
        </script>';
    }
    
    // Query to fetch company details
    $fetchCompanyQuery = "SELECT name, work_in_time, work_out_time FROM company WHERE ref = '1'";
    $companyResult = $conn->query($fetchCompanyQuery);
    
    if ($companyResult->num_rows > 0) {
        $companyRow = $companyResult->fetch_assoc();
        // Store company details in local storage
        echo '<script>
            localStorage.setItem("company", "' . $companyRow['name'] . '");
            localStorage.setItem("in-time", "' . $companyRow['work_in_time'] . '");
            localStorage.setItem("out-time", "' . $companyRow['work_out_time'] . '");
            window.location.href="dash.html";
        </script>';
    } else {
        echo '<script>
            window.location.href="dash.html";
        </script>';
    }
    
    // Close connection
    $conn->close();
?>
