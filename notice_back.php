<?php
// Database configuration
$host = "localhost";
$dbusername = "root";
$dbpassword = ""; // Enter your database password here
$database = "zolo";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch the last notice entry
$query = "SELECT title, content, created_at FROM notice ORDER BY created_at DESC LIMIT 1";

$result = $conn->query($query);

$notices = array();

if ($result->num_rows > 0) {
    // Fetch notice from database
    while ($row = $result->fetch_assoc()) {
        $notices[] = array(
            'title' => $row['title'],
            'content' => $row['content'],
            'created_at' => $row['created_at']
        );
    }
}

// Return the notices as JSON
header('Content-Type: application/json');
echo json_encode($notices);

// Close connection
$conn->close();
?>
