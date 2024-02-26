<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Africa/Nairobi');

require_once('conn.php');

// Connection to MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo '<script>window.location.href = "login.php";</script>';
}

// Get the values from the AJAX request
$id_no = $_POST['id_no'] ?? '';

// Get the current date and time
$current_date = date("Y-m-d");
$current_time = date("H:i:s");

// Update the time_out field for the matching row
$sql_update = "UPDATE clock SET time_out = '$current_time' WHERE id_no = '$id_no' AND date = '$current_date'";

if ($conn->query($sql_update) === TRUE) {
    echo "Time out recorded successfully.";
    echo '<script>window.location.href = "login.php";</script>';
} else {
    echo "Error updating record: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
