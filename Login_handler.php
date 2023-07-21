<?php
    session_start();

    // Check username and password (replace with your authentication logic)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example check - username and password must match "admin"
    if ($username === 'username' && $password === 'password') {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        header("Location: patientLogin.php");
        exit();
    }
?>
