<?php
require_once('conn.php'); // Include the file with database credentials

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest 100 entries from the clock table
$sql = "SELECT id_no, fname, lname, time_in, time_out, `date` FROM clock ORDER BY date DESC";
$result = $conn->query($sql);

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
