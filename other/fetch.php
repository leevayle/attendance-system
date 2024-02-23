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

    // Query to count total rows in clock table where the date matches today's date
    $today = date("Y-m-d");
    $countClockQuery = "SELECT COUNT(*) AS totalClocks FROM clock WHERE date = '$today'";
    $clockResult = $conn->query($countClockQuery);
    
    if ($clockResult->num_rows > 0) {
        $clockRow = $clockResult->fetch_assoc();
        // Store total clocks count in local storage
        echo '<script>
            localStorage.setItem("totalclocks", ' . $clockRow['totalClocks'] . ');
        </script>';
    }

    // Query to fetch default work-in time from company table
    $fetchWorkInQuery = "SELECT work_in_time FROM company WHERE ref = '1'";
    $workInResult = $conn->query($fetchWorkInQuery);
    
    if ($workInResult->num_rows > 0) {
        $workInRow = $workInResult->fetch_assoc();
        $defaultWorkInTime = $workInRow['work_in_time'];
    } else {
        die("Default work-in time not found in company table.");
    }
    
    // Query to count the number of employees who are late
    $countLateQuery = "SELECT COUNT(*) AS totalLate FROM clock WHERE date = '$today' AND time_in > '$defaultWorkInTime'";
    $lateResult = $conn->query($countLateQuery);
    
    if ($lateResult->num_rows > 0) {
        $lateRow = $lateResult->fetch_assoc();
        $totalLate = $lateRow['totalLate'];
        
        // Store total late employees count in local storage
        echo '<script>
            localStorage.setItem("totallate", ' . $totalLate . ');
        </script>';
    } else {
        echo "No employees were late today.";
    }

    // Query to count the number of employees who arrived early or on time
    $countOnTimeQuery = "SELECT COUNT(*) AS totalOnTime FROM clock WHERE date = '$today' AND time_in <= '$defaultWorkInTime'";
    $onTimeResult = $conn->query($countOnTimeQuery);
    
    if ($onTimeResult->num_rows > 0) {
        $onTimeRow = $onTimeResult->fetch_assoc();
        $totalOnTime = $onTimeRow['totalOnTime'];
        
        // Store total early/on-time employees count in local storage
        echo '<script>
            localStorage.setItem("totalontime", ' . $totalOnTime . ');
        </script>';
    } else {
        echo "No employees arrived early or on time today.";
    }
    
    // Redirect to dash.html
    echo '<script>
        window.location.href="dash.html";
    </script>';
    
    // Close connection
    $conn->close();
?>
