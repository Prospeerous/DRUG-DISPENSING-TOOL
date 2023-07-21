<?php
if (isset($_GET['id'])) {
    $patientNumber = $_GET['id'];

    require_once 'db_connection.php'; // Include the correct database connection file
    //print_r($_POST);

    // Retrieve the supplier information based on the provided SupplierID
    $query = "SELECT * FROM prescription WHERE `Patient Number` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $patientNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Drug Dispensing Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form fieldset {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        form legend {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="number"],
        form textarea,
        form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 16px;
        }

        form textarea {
            resize: vertical;
            min-height: 100px;
        }

        form button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }

        /* Style the Patient Consent checkbox label */
        form input[type="checkbox"] + label {
            display: inline-block;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <h1>Pharmacy Drug Dispensing Form</h1>
    <form action="/Projects/dispenseDrugs.php" method="post">
        <fieldset>
            <legend>Patient Information</legend>
            <label for="patientNumber">Patient Number:</label>
            <input type="text" id="patientNumber" name="patientNumber" required>

           

        <fieldset>
            <legend>Prescription Details</legend>
           
            <label for="medicationName">Medication Name:</label>
            <input type="text" id="medicationName" name="medicationName" required>

         
            <label for="quantity"> Dispensed Quantity :</label>
            <input type="number" id="quantity" name="quantity" required>
            <label for="price">Payable Amount:</label>
            <input type="text" id="price" name="price" required>

        </fieldset>

        <fieldset>
            <legend>Pharmacist Information</legend>
            
            <label for="pharmacistLicense">Pharmacist  Number:</label>
            <input type="text" id="pharmacistLicense" name="pharmacistLicense" required>

            <label for="dispensingDate">Date of Dispensing:</label>
            <input type="date" id="dispensingDate" name="dispensingDate" required>
            
             <label for="ReceiptNumber">Receipt Number:</label>
            <input type="text" id="ReceiptNumber" name="ReceiptNumber" required>

        </fieldset>

        <button type="submit">Submit</button>
    </form>
        </body>
        </html>
 <?php
    } else {
        echo "Dispensed Drug not found.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid Receipt number.";
}
?>






