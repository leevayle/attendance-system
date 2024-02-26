<?php

// Check if ID number and role are received via POST request
if (isset($_POST['id_no'], $_POST['role'])) {
    // Retrieve ID number and role from POST data
    $id_no = $_POST['id_no'];
    $role = $_POST['role'];

    
require_once('conn.php');
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check database connection
    if ($conn->connect_error) {
        $response = array('status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error);
    } else {
        // Check if the new role is "user" and there are at least two admin users
        if ($role === 'user') {
            // Count the number of admin users
            $sql_count_admins = "SELECT COUNT(*) AS admin_count FROM biodata WHERE role = 'admin'";
            $result = $conn->query($sql_count_admins);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $admin_count = $row['admin_count'];
                if ($admin_count < 2) {
                    // If there are fewer than two admin users, do not update the role to "user"
                    $response = array('status' => 'error', 'message' => 'Cannot update role to "user" when there are less than two admin users.');
                    echo json_encode($response);
                    exit;
                }
            } else {
                // Error or no admin users found
                $response = array('status' => 'error', 'message' => 'Error counting admin users.');
                echo json_encode($response);
                exit;
            }
        }

        // Prepare and execute SQL query to update the role for the specified ID number
        $sql = "UPDATE biodata SET role = ? WHERE id_no = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $role, $id_no);
            if ($stmt->execute()) {
                // Role updated successfully
                $response = array('status' => 'success');
            } else {
                // Failed to update role
                $response = array('status' => 'error', 'message' => 'Failed to update role: ' . $conn->error);
            }
        } else {
            // Error preparing SQL statement
            $response = array('status' => 'error', 'message' => 'Error preparing SQL statement: ' . $conn->error);
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // ID number or role not received, handle error if needed
    $response = array('status' => 'error', 'message' => 'ID number or role not received.');
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>