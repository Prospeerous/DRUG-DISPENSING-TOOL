<?php

if (isset($_GET['id'])) {
    $patientNumber = $_GET['id'];
    
    // Establish a connection to the MySQL server
    require_once 'Database_Class.php';
    print_r($_POST);


    $query = "DELETE FROM prescription WHERE Patient Number = '$patientNumber'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Prescription information deleted successfully.";
    } else {
        echo "Error deleting drug information: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid MedCode.";
}
?>
