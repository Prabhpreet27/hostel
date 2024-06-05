<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $registration_number = $_POST["registration_number"];
    $hostel_block = $_POST["hostel_block"];
    $department = $_POST["department"];
    
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

    // SQL query to fetch name after the user has logged in
    $query = "SELECT name FROM STUDENT WHERE name='$name' AND registration_number='$registration_number'";

    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        //login successful
        $row = $result->fetch_assoc();
        $username = $row['name'];
        header("Location: welcome.php?username=$username");
        exit();
    } else {
        //login failed
        header("Location: login_failed.html");
        exit();
    }

    // Close connection
    $conn->close();
}
?>
