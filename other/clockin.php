<?php


date_default_timezone_set('Africa/Nairobi');

require_once('conn.php');

// Connection to MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo '<script>window.location.href = "login.php";</script>';
}

// Get the values from the AJAX request
$id_no = $_POST['id_no'] ?? '';
$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'] ?? '';

// Check the role of the user in the biodata table
$sql_check_role = "SELECT role FROM biodata WHERE id_no = '$id_no'";
$result_check_role = $conn->query($sql_check_role);

if ($result_check_role->num_rows > 0) {
    $row = $result_check_role->fetch_assoc();
    $role = $row["role"];

    // Perform the insert operation if role is found
    // Get the current date and time
    $current_date = date("Y-m-d");
    $current_time = date("H:i:s");

    // Check if a row with the same id_no and date already exists
    $sql_check_duplicate = "SELECT * FROM clock WHERE id_no = '$id_no' AND date = '$current_date'";
    $result_check_duplicate = $conn->query($sql_check_duplicate);

    if ($result_check_duplicate->num_rows == 0) {
        // If no matching row exists, insert a new row into the clock table
        $sql_insert = "INSERT INTO clock (id_no, fname, lname, date, time_in) VALUES ('$id_no', '$fname', '$lname', '$current_date', '$current_time')";

        if ($conn->query($sql_insert) !== TRUE) {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
             // Exit if there's an error inserting into the database
        }
    } else {
        // If a matching row exists, do nothing
        echo "You have already clocked in for today.";
        echo '<script>window.location.href = "login.php";</script>';
        
    }

   
} else {
    // Redirect to a default page if user role not found
    
    header("location:login.php");
     // Ensure script terminates after redirection
}
 // Redirect based on user role using JavaScript
 if ($role == "user") {
    echo 'success!';
    echo '<script>window.location.href = "dash-u.html";</script>';
     // Ensure script terminates after redirection
} else {
    echo 'success!';
    echo '<script>window.location.href = "fetch.php";</script>';
     // Ensure script terminates after redirection
}

// Close the database connection
$conn->close();
?>
