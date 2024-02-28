<?php
require_once('conn.php'); // Include the file with database credentials

// Create connections
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Build the WHERE clause based on filters (initially empty)
$whereClause = "";

// Check for date_from, date_to, time_filter, and id_no in the query string
if (isset($_GET['date_from'])) {
    $whereClause .= " AND `date` >= '" . mysqli_real_escape_string($conn, $_GET['date_from']) . "'";
}
if (isset($_GET['date_to'])) {
    $whereClause .= " AND `date` <= '" . mysqli_real_escape_string($conn, $_GET['date_to']) . "'";
}

if (isset($_GET['time_filter'])) {
    // Fetch work in time from company table
    $workInTimeSql = "SELECT work_in_time FROM company WHERE ref = 1";
    $workInTimeResult = $conn->query($workInTimeSql);
    if ($workInTimeResult->num_rows > 0) {
        $workInTimeRow = $workInTimeResult->fetch_assoc();
        $workInTime = $workInTimeRow['work_in_time'];
    } else {
        die("Error retrieving work in time from company table.");
    }

    if ($_GET['time_filter'] === "early") {
        $whereClause .= " AND time_in < '$workInTime'";
    } else if ($_GET['time_filter'] === "late") {
        $whereClause .= " AND time_in >= '$workInTime'";
    }
}

if (isset($_GET['id_no'])) {
    $idNo = mysqli_real_escape_string($conn, $_GET['id_no']); // Sanitize input
    $whereClause .= " AND id_no = '$idNo'";
}

// Build the SQL query with optional WHERE clause
$sql = "SELECT id_no, fname, lname, time_in, time_out, `date` FROM clock";
if ($whereClause) {
    $sql .= " WHERE " . substr($whereClause, 4); // Remove leading " AND "
}

$sql .= " ORDER BY date DESC"; // Maintain sorting by date

$result = $conn->query($sql);

// ... (rest of the code remains the same as before)


// Check if there are any results
if ($result->num_rows > 0) {
    // Output the table headers
    echo "<table border='0'>
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Date</th>
          </tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_no"]. "</td>";
        echo "<td>" . $row["fname"]. "</td>";
        echo "<td>" . $row["lname"]. "</td>";
        echo "<td>" . $row["time_in"]. "</td>";
        echo "<td>" . $row["time_out"]. "</td>";
        echo "<td>" . $row["date"]. "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>
