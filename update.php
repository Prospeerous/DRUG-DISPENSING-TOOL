<?php
// Check if the form data is submitted
if (isset($_POST['supplierID'])) {
    // Retrieve the form data
    $supplierID = $_POST['supplierID'];
    $supplierName = $_POST['supplierName'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phoneNumber'];
    $medicineCode = $_POST['medicineCode'];

    // Establish a connection to the MySQL server
    require_once 'Database_Class.php';
    print_r($_POST);
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the supplier information in the database
    $query = "UPDATE supplier SET SupplierName='$supplierName', Address='$address', PhoneNo='$phoneNumber', MedCode='$medicineCode' WHERE SupplierID='$supplierID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Supplier information updated successfully.";
    } else {
        echo "Error updating supplier information: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid form submission.";
}
?>
