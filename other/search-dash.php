<?php

require_once('conn.php'); // Include the file with database credentials

// Retrieve ID number sent via AJAX
$idNumber = isset($_POST['idNumber']) ? $_POST['idNumber'] : '';

if (!empty($idNumber)) {
    // Create a new MySQLi connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        // Handle connection error
        $errorMessage = 'Connection failed: ' . $conn->connect_error;
        echo json_encode(array('error' => $errorMessage));
    } else {
        // Log connection success
        error_log('Database connection successful');

        // Prepare and execute queries to fetch data from biodata and clock tables
        $biodataQuery = "SELECT f_name FROM biodata WHERE id_no = ?";
        $clockQuery = "SELECT time_in, time_out FROM clock WHERE id_no = ? AND date = CURDATE()";

        // Log SQL queries
        error_log('Biodata Query: ' . $biodataQuery);
        error_log('Clock Query: ' . $clockQuery);

        // Prepare statements
        $biodataStmt = $conn->prepare($biodataQuery);
        $clockStmt = $conn->prepare($clockQuery);

        // Bind parameters
        $biodataStmt->bind_param('s', $idNumber);
        $clockStmt->bind_param('s', $idNumber);

        // Execute queries
        $biodataStmt->execute();
        $clockStmt->execute();

        // Bind results
        $biodataStmt->bind_result($firstName);
        $clockStmt->bind_result($timeIn, $timeOut);

        // Fetch results
        $biodataStmt->fetch();
        $clockStmt->fetch();

        // Log fetched data
        error_log('First Name: ' . $firstName);
        error_log('Time In: ' . $timeIn);
        error_log('Time Out: ' . $timeOut);

        // Construct response array
        $response = array(
            'idNumber' => $idNumber,
            'firstName' => $firstName,
            'timeIn' => $timeIn,
            'timeOut' => $timeOut
        );

        // Send response as JSON
        header('Content-Type: application/json');
        echo json_encode($response);

        // Close statements and connection
        $biodataStmt->close();
        $clockStmt->close();
        $conn->close();
    }
} else {
    // Invalid or empty ID number received
    $errorMessage = 'Invalid ID number received.';
    echo json_encode(array('error' => $errorMessage));
}
?>
