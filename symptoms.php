<?php
require_once("Database_class.php"); // Assuming this file contains the database connection settings

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $servername = "localhost";
$username = "root";
$password = "";
$db="drug_dispensation";
        $conn = new mysqli($servername, $username, $password, $db);

        // Check if the connection is established
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $patientName = $_POST["patientName"];
        $patientNumber = $_POST["patientNumber"];
        $symptoms = $_POST["symptoms"];
        $duration = $_POST["duration"];
        $previousMedication = $_POST["previousMedication"];
        $allergies = $_POST["allergies"];

        // Prepare and execute the SQL query using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO symptoms (`Patient Name`, `Patient Number`, Symptoms, Duration, `On Medication`, Allergies) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $patientName, $patientNumber, $symptoms, $duration, $previousMedication, $allergies);

        if ($stmt->execute()) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and the database connection
        $stmt->close();
        $conn->close();
    }
} catch (Exception $ex) {
    echo "<script>alert('Error: No connection')</script>";
}
?>
