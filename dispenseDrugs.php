<?php
require_once("Database_class.php");

try {
    // Check if the form is submitted with POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientNumber = $_POST["patientNumber"];
        $medicationName = $_POST["medicationName"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $pharmacistLicense = $_POST["pharmacistLicense"];
        $dispensingDate = $_POST["dispensingDate"];
        $receiptNumber = $_POST["ReceiptNumber"];

        // Prepare and execute the SQL query using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO dispenseddrugs(`Patient Number`, `Medication Name`, `Dispensed Quantity`, `Payable Amount`, `Pharmacist Number`, `Dispensation Date`, `Receipt No`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $patientNumber, $medicationName, $quantity, $price, $pharmacistLicense, $dispensingDate, $receiptNumber);

        if ($stmt->execute()) {
            echo "<script>alert('Data inserted successfully')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
} catch (Exception $ex) {
    echo "<script>alert('Error: No connection')</script>";
}
?>
