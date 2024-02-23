<?php

// Check if ID number is received via POST request
if (isset($_POST['id_no'])) {
    // Retrieve ID number from POST data
    $id_no = $_POST['id_no'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendancesystemapp001";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get today's date
    $current_date = date("Y-m-d");

    // Check if there is an entry in the clock table for today's date, the provided ID, and time_out is not null
    $sql_check_entry = "SELECT * FROM clock WHERE id_no = '$id_no' AND date = '$current_date' AND time_out IS NOT NULL";
    $result = $conn->query($sql_check_entry);

    if ($result->num_rows > 0) {
        // Entry exists and time_out is filled, set outstatus to 'yes'
        echo "yes";
    } else {
        // Entry does not exist or time_out is not filled, set outstatus to 'no'
        echo "no";
    }

    // Close the database connection
    $conn->close();
} else {
    // ID number not received, handle error if needed
    echo "ID number not received.";
}

?>
