<?php
// Check if the Medcode is provided in the URL
if (isset($_GET['id'])) {
    $MedCode = $_GET['id'];
    
    require_once 'Database_Class.php';
    //print_r($_POST);
    
    // Retrieve the med information based on the provided MedCode
    $query = "SELECT * FROM medicine WHERE MedCode = '$MedCode'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Fetch the row using mysqli_fetch_assoc
        // Display the form to edit the drug information
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Drug</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 5px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 16px;
        }

        form input[type="submit"] {
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
   
</head>
<body>
    <h2>Edit Drug</h2>
    <form action="drug_update.php" method="POST">
        <input type="hidden" name="MedCode" value="<?php echo $row['MedCode']; ?>">
        <label for="Medicine_Name">Medicine Name:</label>
        <input type="text" id="Medicine_Name" name="Medicine_Name" value="<?php echo $row['Medicine_name']; ?>" required><br><br>
        <label for="Type">Type:</label>
        <input type="text" id="Type" name="Type" value="<?php echo $row['Type']; ?>" required><br><br>
        <label for="Quantity">Quantity:</label>
        <input type="text" id="Quantity" name="Quantity" value="<?php echo $row['Quantity']; ?>" required><br><br>
        <label for="Price">Price:</label>
        <input type="text" id="Price" name="Price" value="<?php echo $row['Price']; ?>" required><br><br>
        <label for="Expiry_Date">Expiry_Date:</label>
        <input type="text" id="Expiry_Date" name="Expiry_Date" value="<?php echo $row['Expiry_Date']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
    } else {
        echo "Drug not found.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid MedCode.";
}
?>
