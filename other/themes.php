<?php
    require_once('conn.php');

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo '<script>window.location.href = "login.php";</script>';
    }

// Check if ID and theme data are received via POST request
if(isset($_POST['id']) && isset($_POST['theme'])) {
    $id = $_POST['id'];
    $theme = $_POST['theme'];

    // Sanitize the received data to prevent SQL injection
    $id = $conn->real_escape_string($id);
    $theme = $conn->real_escape_string($theme);

    // Update the biodata table with the received theme for the specified ID
    $sql = "UPDATE biodata SET theme = '$theme' WHERE id_no = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Theme updated successfully";
    } else {
        echo "Error updating theme: " . $conn->error;
    }
} else {
    echo "ID or theme data not received";
}

$conn->close();

?>