<?php
// Check if the Drug is provided in the URL
if (isset($_GET['id'])) {
    $MedCode = $_GET['id'];
    
    // Establish a connection to the MySQL server
    require_once 'Database_Class.php';
    print_r($_POST);

    // Delete the drug information from the database based on the provided MedCode
    $query = "DELETE FROM medicine WHERE MedCode = '$MedCode'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Drug information deleted successfully.";
    } else {
        echo "Error deleting drug information: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid MedCode.";
}
?>
