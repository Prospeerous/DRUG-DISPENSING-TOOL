<?php
session_start();
include "Database_class.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    $username = validate($_POST["username"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);

    if(empty($username)) {
        header("Location: Admin_Login.php?error=username is required");
        exit();
    }
    else if(empty($email)) {
        header("Location: Admin_Login.php?error=email is required");
        exit();
    }
    else if(empty($password)) {
        header("Location: Admin_Login.php?error=password is required");
        exit();
    }

    $sql = "SELECT * FROM admin WHERE Username='$username' AND Email='$email' AND Password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['Username'] === $username && $row['Email'] === $email && $row['Password'] === $password){
            echo 'Logged In!';
            $_SESSION['username'] = $row['Username'];
            $_SESSION['email'] = $row['Email'];
            header("Location: Home.php");
            exit();
        }
        else{
            header("Location: Admin_Login.php?error=Incorrect username or password");
            exit();
        }
    }
    else{
        header("Location: Admin_Login.php");
        exit();
    }
}
?>
