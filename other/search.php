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

    // Prepare and execute SQL query to retrieve details from biodata table
    $sql = "SELECT f_name, l_name, email, gender, `role` FROM biodata WHERE id_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and return data as JSON
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        // No matching record found
        echo json_encode(array('error' => 'No matching record found.'));
    }

    // Close the database connection
    $conn->close();
} else {
    // ID number not received, handle error if needed
    echo json_encode(array('error' => 'ID number not received.'));
}

?>