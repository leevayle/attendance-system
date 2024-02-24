<?php
// Check if ID number and role are received via POST request
if (isset($_POST['id_no'], $_POST['role'])) {
    // Retrieve ID number and role from POST data
    $id_no = $_POST['id_no'];
    $role = $_POST['role'];

    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendancesystemapp001";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to update role for the specified ID number
    $sql = "UPDATE biodata SET role = ? WHERE id_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $role, $id_no);
    if ($stmt->execute()) {
        // Role updated successfully
        $response = array('status' => 'success');
    } else {
        // Failed to update role
        $response = array('status' => 'error', 'message' => 'Failed to update role: ' . $conn->error);
    }

    // Close the database connection
    $conn->close();
} else {
    // ID number or role not received, handle error if needed
    $response = array('status' => 'error', 'message' => 'ID number or role not received.');
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
