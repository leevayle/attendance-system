<?php
require_once('conn.php');


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Error: Database connection failed";
    echo '<script>
    window.location.href="./fetch.php";
     
  </script>';
    exit();
}

// Function to update company name
function updateCompanyName($conn, $companyName) {
    $sql = "UPDATE company SET name = '$companyName' WHERE ref = '1'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>
        window.location.href="./fetch.php";
         
      </script>';
      
    } else {
        echo '<script>
        window.location.href="./fetch.php";
         
      </script>';
    }
}

// Function to update clock in time
function updateClockInTime($conn, $clockInTime) {
    $sql = "UPDATE company SET work_in_time = '$clockInTime' WHERE ref = '1'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>
        window.location.href="./fetch.php";
         
      </script>';
    } else {
        echo "Error updating clock in time: " . $conn->error;
        echo '<script>
        window.location.href="./fetch.php";
         
      </script>';
    }
}

// Function to update clock out time
function updateClockOutTime($conn, $clockOutTime) {
    $sql = "UPDATE company SET work_out_time = '$clockOutTime' WHERE ref = '1'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>
        window.location.href="./fetch.php";
         
      </script>';
    } else {
        echo "Error updating clock out time: " . $conn->error;
        echo '<script>
        window.location.href="./fetch.php";
         
      </script>';
    }
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check each field for data and update the company table accordingly
    if (!empty($_POST['company-name'])) {
        updateCompanyName($conn, $_POST['company-name']);
    }
    if (!empty($_POST['ci-time'])) {
        updateClockInTime($conn, $_POST['ci-time']);
    }
    if (!empty($_POST['co-time'])) {
        updateClockOutTime($conn, $_POST['co-time']);
    }
}

// Close connection
$conn->close();
?>
