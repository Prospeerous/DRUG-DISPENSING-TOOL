<?php
// Check if the Email is provided in the URL
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
    // Establish a connection to the MySQL server
    require_once 'connection.php';
    print_r($_POST);

    // Delete the customer information from the database based on the provided Email
    $query = "DELETE FROM customer_details WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Customer information deleted successfully.";
    } else {
        echo "Error deleting customer information: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "Invalid Email.";
}
?>








