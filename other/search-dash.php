<?php
// Include the file with database credentials
require_once('conn.php');
error_reporting(E_ALL & ~E_NOTICE);

// Retrieve ID number sent via AJAX and sanitize
$idNumber = isset($_POST['idNumber']) ? htmlspecialchars($_POST['idNumber']) : '';

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    // Handle connection error
    $errorMessage = 'Connection failed: ' . $conn->connect_error;
    echo json_encode(array('success' => false, 'error' => $errorMessage));
    exit(); // Terminate script execution after sending response
}

// Prepare and execute query to fetch data from biodata table
$queryBiodata = "SELECT f_name, id_no FROM biodata WHERE id_no = ?";
$stmtBiodata = $conn->prepare($queryBiodata);

if (!$stmtBiodata) {
    // Handle query preparation error
    $errorMessage = 'Query preparation failed: ' . $conn->error;
    echo json_encode(array('success' => false, 'error' => $errorMessage));
    exit(); // Terminate script execution after sending response
}

// Bind parameters for biodata query
$stmtBiodata->bind_param('s', $idNumber);

// Execute biodata query
if (!$stmtBiodata->execute()) {
    // Handle query execution error
    $errorMessage = 'Query execution failed: ' . $stmtBiodata->error;
    echo json_encode(array('success' => false, 'error' => $errorMessage));
    exit(); // Terminate script execution after sending response
}

// Bind results for biodata query
$stmtBiodata->bind_result($fname, $id_no);

// Fetch result from biodata query
$stmtBiodata->fetch();

// Close biodata statement
$stmtBiodata->close();

// Check if biodata exists for the provided ID number
if ($id_no !== null) {
    // Prepare and execute query to fetch time_in and time_out from clock table
    $queryClock = "SELECT time_in, time_out FROM clock WHERE id_no = ? AND date = ?";
    $stmtClock = $conn->prepare($queryClock);

    if (!$stmtClock) {
        // Handle query preparation error
        $errorMessage = 'Query preparation failed: ' . $conn->error;
        echo json_encode(array('success' => false, 'error' => $errorMessage));
        exit(); // Terminate script execution after sending response
    }

    // Get today's date
    $todayDate = date('Y-m-d');

    // Bind parameters for clock query
    $stmtClock->bind_param('ss', $idNumber, $todayDate);

    // Execute clock query
    if (!$stmtClock->execute()) {
        // Handle query execution error
        $errorMessage = 'Query execution failed: ' . $stmtClock->error;
        echo json_encode(array('success' => false, 'error' => $errorMessage));
        exit(); // Terminate script execution after sending response
    }

    // Bind results for clock query
    $stmtClock->bind_result($time_in, $time_out);

    // Fetch result from clock query
    $stmtClock->fetch();

    // Close clock statement
    $stmtClock->close();

    // Return data if available
    $response = array('success' => true, 'data' => array(
        'id_no' => $id_no,
        'fname' => $fname,
        'time_in' => $time_in !== null ? $time_in : 'pending',
        'time_out' => $time_out !== null ? $time_out : 'pending'
    ));
    echo json_encode($response);
} else {
    // No biodata found for the provided ID number
    $errorMessage = 'User data not found.';
    echo json_encode(array('success' => false, 'error' => $errorMessage));
}

// Close connection
$conn->close();
?>
