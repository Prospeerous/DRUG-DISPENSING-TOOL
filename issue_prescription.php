<?php
// Replace the database credentials below with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug_dispensation";

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientName = $_POST["patientName"];
    $patientNumber = $_POST["patientNumber"];
    $doctorEmail = $_POST["doctorEmail"];
    $medicationName = $_POST["medicationName"];
    $dosage = $_POST["dosage"];
    $frequency = $_POST["frequency"];

    // SQL query to insert data into the 'prescription' table
    $sql = "INSERT INTO prescription (`Patient Name`, `Patient Number`, `Doctor Email`, `Medication Name`, `Dosage`, `Frequency`) 
            VALUES ('$patientName', '$patientNumber', '$doctorEmail', '$medicationName', '$dosage', '$frequency')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
