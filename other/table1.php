<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendancesystemapp001";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get today's date
$current_date = date("Y-m-d");

// Fetch the first 5 entries of today from the clock table
$sql = "SELECT id_no, fname, lname, time_in, time_out FROM clock WHERE date = ? LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $current_date);
$stmt->execute();
$result = $stmt->get_result();

// Store the results in an array
$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

// Close the database connection
$stmt->close();
$conn->close();

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($rows);
?>
