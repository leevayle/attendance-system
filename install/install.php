<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../other/css/other.css" id="stylesheet">
    <link rel="stylesheet" href="../other/css/fonts.css" id="fonts">
    <link rel="icon" href="../other/images/favicon.png">
    <title>Install</title>
</head>
<!--
<body class="body-install">
    <div class="cont">
        <div class="title-1">
            <div class="install-logo">
                <img class="icon" id="anime" src="../other/images/static.gif">
            </div>

            <div class="condition-cont" id="text">
                <h2 id="h2" class="h22">Just a moment...</h2>
            </div>
            <button id="finish">Finish</button>
            <div class="load-cont" id="loadingpr">
                <div class="load" id="loading"></div>
            </div>
        </div>
    </div>


    <?php

// Database connection parameters
require_once('../other/conn.php');

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    header("Location: install-err.html");
    exit();
}

// Start transaction
$conn->begin_transaction();

try {
    // Create database if not exists
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS attendancesystemapp001";
    if ($conn->query($sql_create_db) !== TRUE) {
        throw new Exception("Error creating database: " . $conn->error);
    }

    // Connect to the created database
    $conn->select_db("attendancesystemapp001");

    // Create biodata table
    $sql_create_biodata = "CREATE TABLE IF NOT EXISTS biodata (
        id_no VARCHAR(20) PRIMARY KEY,
        f_name VARCHAR(50) NOT NULL,
        l_name VARCHAR(50) NOT NULL,
        gender ENUM('male', 'female', 'other') NOT NULL,
        email VARCHAR(100) NOT NULL,
        role ENUM('admin', 'user', 'superadmin') NOT NULL,
        profile_url VARCHAR(255),
        theme ENUM('feminine', 'masculine'),
        enrolled ENUM('no', 'yes') NOT NULL,
        fp_data VARCHAR(255),
        password VARCHAR(255)
    )";
    if ($conn->query($sql_create_biodata) !== TRUE) {
        throw new Exception("Error creating table 'biodata': " . $conn->error);
    }

    // Create company table
    $sql_create_company = "CREATE TABLE IF NOT EXISTS company (
        ref VARCHAR(20),
        name VARCHAR(100) NOT NULL,
        logo_dir VARCHAR(255),
        work_in_time TIME,
        work_out_time TIME
    )";
    if ($conn->query($sql_create_company) !== TRUE) {
        throw new Exception("Error creating table 'company': " . $conn->error);
    }

    // Insert into company table with ref value 1
// Insert into company table with ref value 1 and specified company details
$sql_insert_company = "INSERT INTO company (ref, name, work_in_time, work_out_time) 
                      VALUES ('1', 'Sam oyugi solutions.', '08:00:00', '17:00:00')";
if ($conn->query($sql_insert_company) !== TRUE) {
    throw new Exception("Error inserting data into 'company' table: " . $conn->error);
}


    // Create clock table
    $sql_create_clock = "CREATE TABLE IF NOT EXISTS clock (
        id_no VARCHAR(20),
        fname VARCHAR(50),
        lname VARCHAR(50),
        date DATE,
        time_in TIME,
        time_out TIME,
        absent ENUM('yes', 'no'),
        overtime ENUM('yes', 'no')
    )";
    if ($conn->query($sql_create_clock) !== TRUE) {
        throw new Exception("Error creating table 'clock': " . $conn->error);
    }

    // Create stats table
    $sql_create_stats = "CREATE TABLE IF NOT EXISTS stats (
        employees INT,
        enrolled INT,
        absent INT,
        on_time INT,
        late INT
    )";
    if ($conn->query($sql_create_stats) !== TRUE) {
        throw new Exception("Error creating table 'stats': " . $conn->error);
    }

    // Create notifications table
    $sql_create_notifications = "CREATE TABLE IF NOT EXISTS notifications (
        id_no VARCHAR(20),
        notification VARCHAR(255),
        status ENUM('read', 'unread'),
        deleted ENUM('yes', 'no'),
        FOREIGN KEY (id_no) REFERENCES biodata(id_no)
    )";
    if ($conn->query($sql_create_notifications) !== TRUE) {
        throw new Exception("Error creating table 'notifications': " . $conn->error);
    }

    // Hash the password
    $password = password_hash('admin', PASSWORD_DEFAULT);

    // Set profile URL
    $profileUrl = "images/ser.png";

    // Populate biodata table with hashed password and profile URL
    $sql_insert_biodata = "INSERT INTO biodata (id_no, f_name, l_name, gender, email, role, profile_url, password) VALUES ('0001', 'admin', 'admin', 'male', 'admin@example.com', 'admin', '$profileUrl', '$password')";
    if ($conn->query($sql_insert_biodata) !== TRUE) {
        throw new Exception("Error inserting data into 'biodata' table: " . $conn->error);
    }

    // Commit transaction
    $conn->commit();
    header("Location: install.html");
    exit();
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    header("Location: install-err.html");
    exit();
}

// Close connection
$conn->close();

?>







    
</body>

<script src="../other/js/install.js" defer></script>-->

</html>





