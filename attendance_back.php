<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zolo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch latest student's attendance
$sql = "SELECT a.registration_number, s.name, a.days_present 
        FROM attendance a
        JOIN student s ON a.registration_number = s.registration_number
        ORDER BY a.month_year DESC
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $attendance = $row['name'] . " has " . $row['days_present'] . " days present this month.";
  echo json_encode($attendance);
} else {
  echo json_encode("No attendance data available.");
}

$conn->close();
?>
