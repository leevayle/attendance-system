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
        </script>';
    }
    
    // Query to count total rows in biodata table
    $countBiodataQuery = "SELECT COUNT(*) AS total FROM biodata";
    $countResult = $conn->query($countBiodataQuery);
    
    if ($countResult->num_rows > 0) {
        $countRow = $countResult->fetch_assoc();
        // Store total rows count in local storage
        echo '<script>
            localStorage.setItem("totalreg", ' . $countRow['total'] . ');
        </script>';
    }
    
    // Query to count total enrolled users
    $countEnrolledQuery = "SELECT COUNT(*) AS totalEnrolled FROM biodata WHERE enrolled = 'yes'";
    $enrolledResult = $conn->query($countEnrolledQuery);
    
    if ($enrolledResult->num_rows > 0) {
        $enrolledRow = $enrolledResult->fetch_assoc();
        // Store total enrolled users count in local storage
        echo '<script>
            localStorage.setItem("totalenrolled", ' . $enrolledRow['totalEnrolled'] . ');
        </script>';
    }
    
    // Redirect to dash.html
    echo '<script>
        window.location.href="dash.html";
    </script>';
    
    // Close connection
    $conn->close();
?>
