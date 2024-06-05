<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "zolo";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to insert fee data into the database
function insertFee($studentid, $amount, $payment_date) {
    global $conn;
    $sql = "INSERT INTO fee (studentid, amount, payment_date) VALUES ('$studentid', '$amount', '$payment_date')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to retrieve all fee data from the database
function getFees() {
    global $conn;
    $fees = array();
    $sql = "SELECT * FROM fee";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $fees[] = $row;
        }
    }
    return $fees;
}

// Example usage:
// Insert fee data
$insertSuccess = insertFee(123, 50.00, '2024-04-15');
if ($insertSuccess) {
    echo "Fee data inserted successfully.";
} else {
    echo "Error inserting fee data.";
}

// Retrieve fee data
$fees = getFees();
foreach ($fees as $fee) {
    echo "ID: " . $fee['id'] . ", Student ID: " . $fee['studentid'] . ", Amount: $" . $fee['amount'] . ", Payment Date: " . $fee['payment_date'] . "<br>";
}

// Close connection
$conn->close();
?>
