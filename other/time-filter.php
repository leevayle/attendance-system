<?php
require_once('conn.php'); // Include the file with database credentials
$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch work in and work out times from the company table
$sql = "SELECT work_in_time, work_out_time FROM company";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $workInTime = $row['work_in_time'];
    $workOutTime = $row['work_out_time'];

    // Send the work in and work out times as JSON response
    echo json_encode(array('workInTime' => $workInTime, 'workOutTime' => $workOutTime));
} else {
    // Handle errors or no data found
    echo json_encode(array('error' => 'Failed to fetch work times from the database.'));
}

$conn->close();
?>
