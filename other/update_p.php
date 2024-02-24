<?php
// Check if ID number and password are received via POST request
if (isset($_POST['id_no'], $_POST['password'])) {
    // Retrieve ID number and password from POST data
    $id_no = $_POST['id_no'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendancesystemapp001";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check database connection
    if ($conn->connect_error) {
        $response = array('status' => 'error', 'message' => 'Database connection failed: ' . $conn->connect_error);
    } else {
        // Prepare and execute SQL query to update hashed password for the specified ID number
        $sql = "UPDATE biodata SET password = ? WHERE id_no = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $id_no);
        if ($stmt->execute()) {
            // Password updated successfully
            $response = array('status' => 'success');
        } else {
            // Failed to update password
            $response = array('status' => 'error', 'message' => 'Failed to update password: ' . $conn->error);
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // ID number or password not received, handle error if needed
    $response = array('status' => 'error', 'message' => 'ID number or new password not received.');
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
