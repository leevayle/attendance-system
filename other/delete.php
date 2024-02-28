<?php

// Initialize response array
$response = array();

// Check if ID number is received via POST request
if (isset($_POST['id_no'])) {
    // Retrieve ID number from POST data
    $id_no = $_POST['id_no'];

    require_once('conn.php');

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $response['status'] = 'error';
        $response['message'] = 'Connection failed: ' . $conn->connect_error;
    } else {
        // Prepare SQL query to check the role of the user being deleted
        $sql_get_role = "SELECT role FROM biodata WHERE id_no = ?";
        $stmt = $conn->prepare($sql_get_role);
        $stmt->bind_param("s", $id_no);
        $stmt->execute();
        $stmt->store_result();

        // Check if user exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($role);
            $stmt->fetch();

            // Check if the user being deleted is an admin
            if ($role == 'admin') {
                // Prepare SQL query to count the number of admins
                $sql_count_admin = "SELECT COUNT(*) AS admin_count FROM biodata WHERE role = 'admin'";
                $result = $conn->query($sql_count_admin);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $admin_count = $row['admin_count'];

                    // Check conditions for deleting admin user
                    if ($admin_count > 1) {
                        // If there are more than one admins, proceed with deletion
                        delete_user($conn, $id_no, $response);
                    } else {
                        // Cannot delete the only admin user
                        $response['status'] = 'error';
                        $response['message'] = 'Cannot delete the only admin user.';
                    }
                } else {
                    // Error counting admin users
                    $response['status'] = 'error';
                    $response['message'] = 'Error counting admin users: ' . $conn->error;
                }
            } else {
                // For non-admin users, proceed with deletion
                delete_user($conn, $id_no, $response);
            }
        } else {
            // User not found
            $response['status'] = 'error';
            $response['message'] = 'User not found.';
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // ID number not received
    $response['status'] = 'error';
    $response['message'] = 'ID number not received.';
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Function to delete user
function delete_user($conn, $id_no, &$response) {
    // Prepare SQL query to delete user from biodata table
    $sql_delete_user = "DELETE FROM biodata WHERE id_no = ?";
    $stmt = $conn->prepare($sql_delete_user);
    $stmt->bind_param("s", $id_no);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            // User deleted successfully
            $response['status'] = 'success';
            $response['message'] = 'User deleted successfully.';
        } else {
            // User not found
            $response['status'] = 'error';
            $response['message'] = 'User not found.';
        }
    } else {
        // Error deleting user
        $response['status'] = 'error';
        $response['message'] = 'Error deleting user: ' . $conn->error;
    }
}
?>
