<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $registration_number = $_POST["registration_number"];
    
    // Database configuration
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $database = "zolo";

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check if user exists
    $query = "SELECT * FROM student WHERE name='$name' AND registration_number='$registration_number'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
       // Login successful
       header("Location: login_later.html");
       exit();
    } else {
      // Login failed
      header("Location: login.html");
      exit();
    }

    // Close connection
    $conn->close();
}
?>
