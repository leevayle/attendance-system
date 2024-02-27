<?php
// Include the file with database credentials
require_once('conn.php');

// Retrieve ID number sent via AJAX
$idNumber = isset($_POST['idNumber']) ? $_POST['idNumber'] : '';

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    // Handle connection error
    $errorMessage = 'Connection failed: ' . $conn->connect_error;
    echo json_encode(array('error' => $errorMessage));
} else {
    // Prepare and execute query to fetch data from clock table
    $query = "SELECT fname, id_no, time_in, time_out FROM clock WHERE id_no = ? AND date = CURDATE()";
    $stmt = $conn->prepare($query);

    // Bind parameter
    $stmt->bind_param('s', $idNumber);

    // Execute query
    $stmt->execute();

    // Bind results
    $stmt->bind_result($fname, $id_no, $time_in, $time_out);

    // Fetch result
    $stmt->fetch();

    // Check if a record exists
    if ($fname !== null && $id_no !== null && $time_in !== null && $time_out !== null) {
        // Record exists, return data
        $response = array(
            'fname' => $fname,
            'id_no' => $id_no,
            'time_in' => $time_in,
            'time_out' => $time_out
        );
        echo json_encode($response);
    } else {
        // No record found, return error message
        $errorMessage = 'User has not clocked in today.';
        echo json_encode(array('error' => $errorMessage));
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
