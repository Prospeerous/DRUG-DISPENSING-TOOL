<?php

if (isset($_GET['id'])) {
    $pharmacistLicense = $_GET['id'];
    
    // Establish a connection to the MySQL server
    require_once 'Database_Class.php';
    print_r($_POST);

    
    $query = "DELETE FROM pharmacist WHERE Pharmacist Number = '$pharmacistLicense'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Pharmacist information deleted successfully.";
    } else {
        echo "Error deleting Pharmacist information: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid pharmacistLicense.";
}
?>
