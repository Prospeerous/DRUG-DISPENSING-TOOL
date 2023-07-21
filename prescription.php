<!DOCTYPE html>
<html>
<head>
    <title>Prescription Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Prescription Details</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientName = $_POST["patient-name"];
        $doctorName = $_POST["doctor-name"];
        $medicationName = $_POST["medication-name"];
        $dosage = $_POST["dosage"];
        $frequency = $_POST["frequency"];

        echo "<h2>Patient Name:</h2>";
        echo "<p>$patientName</p>";

        echo "<h2>Doctor Name:</h2>";
        echo "<p>$doctorName</p>";

        echo "<h2>Medication Details:</h2>";
        echo "<ul>";
        echo "<li><strong>Medication Name:</strong> $medicationName</li>";
        echo "<li><strong>Dosage:</strong> $dosage</li>";
        echo "<li><strong>Frequency:</strong> $frequency</li>";
        echo "</ul>";
    }
    ?>
</body>
</html>
