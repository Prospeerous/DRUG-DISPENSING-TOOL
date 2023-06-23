<?php
// Check if the SupplierID is provided in the URL
if (isset($_GET['id'])) {
    $supplierID = $_GET['id'];
    
    // Establish a connection to the MySQL server
    require_once 'Database_Class.php';
    print_r($_POST);

    // Delete the supplier information from the database based on the provided SupplierID
    $query = "DELETE FROM supplier WHERE SupplierID = '$supplierID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Supplier information deleted successfully.";
    } else {
        echo "Error deleting supplier information: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid SupplierID.";
}
?>
