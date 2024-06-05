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

// Form data
$name = $_POST['student-name'];
$registration_number = $_POST['start-date'];
$hostel_block = $_POST['end-date'];
$department = $_POST['reason'];

// Insert data into database
$sql = "INSERT INTO student (name, start_date, end_date, reason)
VALUES ('$name', '$registration_number', '$hostel_block', '$department')";

if ($conn->query($sql) === TRUE) {
  header("Location: login_later.html");
  echo "New record created successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header("Location: signup.html");
}

$conn->close();
?>
