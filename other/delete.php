<?php

// Initialize response array
$response = array();

// Check if ID number is received via POST request
if (isset($_POST['id_no'])) {
    // Retrieve ID number from POST data
    $id_no = $_POST['id_no'];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendancesystemapp001";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $response['status'] = 'error';
        $response['message'] = 'Connection failed: ' . $conn->connect_error;
    } else {
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
                
                // Check if profile picture file exists and delete it
                $profile_picture_extensions = array('jpg', 'jpeg', 'png'); // Allowed extensions
                foreach ($profile_picture_extensions as $ext) {
                    $profile_picture_file = "images/profiles/" . $id_no . "." . $ext;
                    if (file_exists($profile_picture_file)) {
                        unlink($profile_picture_file);
                        $response['profile_picture_message'] = 'Profile picture deleted successfully.';
                        break; // Stop searching if file is found and deleted
                    }
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'User not found.';
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error deleting user: ' . $conn->error;
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

?>
