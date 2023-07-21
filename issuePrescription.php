<?php
if (isset($_GET['id'])) {
    $patientNumber = $_GET['id'];

    require_once 'db_connection.php'; // Include the correct database connection file
    //print_r($_POST);

    // Retrieve the supplier information based on the provided SupplierID
    $query = "SELECT * FROM symptoms WHERE `Patient Number` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $patientNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
        /* Added styling for the <h2> element */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.3));
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h1 {
            margin-top: 20px; /* Adjust this value to control the spacing from the top */
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            padding: 20px;
            border: 2px solid #ccc; /* Add border to the form */
            background: rgba(255, 255, 255, 0.9); /* Translucent background */
        }

        .form-input {
            margin-bottom: 15px; /* Increase the margin for vertical spacing */
            width: 300px;
            padding: 8px; /* Add some padding to the inputs */
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
   <h2>Issue patient with medical prescription: </h2>
<form action="/Projects/issue_prescription.php" method="post">
    <div class="form-container">
        <input type="text" class="form-input" name="patientName" placeholder="Patient Name" required>
        <input type="text" class="form-input" name="patientNumber" placeholder="Patient Number" required>
        <input type="text" class="form-input" name="doctorEmail" placeholder="Doctor's Email" required>
        <input type="text" class="form-input" name="medicationName" placeholder="Medication Name" required>
        <input type="text" class="form-input" name="dosage" placeholder="Dosage" required>
        <input type="text" class="form-input" name="frequency" placeholder="Frequency" required>
        <input type="submit" value="Issue Prescription">
    </div>
</form>


</body>
</html>
<?php
    } else {
        echo "Patient not found.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid Patient number.";
}
?>
