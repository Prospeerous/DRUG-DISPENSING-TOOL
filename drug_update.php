<?php
// Check if the form data is submitted
if (isset($_POST['MedCode'])) {
    // Retrieve the form data
    $MedCode = $_POST['MedCode'];
    $Medicine_name = $_POST['Medicine_Name']; // Correct the key to 'Medicine_Name'
    $Type = $_POST['Type'];
    $Quantity = $_POST['Quantity'];
    $Price = $_POST['Price'];
    $Expiry_Date = $_POST['Expiry_Date'];

    // Establish a connection to the MySQL server
    require_once 'Database_Class.php';
    print_r($_POST);
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the drug information in the database
    $query = "UPDATE medicine SET Medicine_name='$Medicine_name', Type='$Type', Quantity='$Quantity', Price='$Price', Expiry_Date='$Expiry_Date' WHERE MedCode='$MedCode'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Drug information updated successfully.";
    } else {
        echo "Error updating drug information: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid form submission.";
}
?>
