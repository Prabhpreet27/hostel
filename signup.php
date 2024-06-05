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
$name = $_POST['name'];
$registration_number = $_POST['registration_number'];
$hostel_block = $_POST['hostel_block'];
$department = $_POST['department'];

// Insert data into database
$sql = "INSERT INTO student (name, registration_number, hostel_block, department)
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
