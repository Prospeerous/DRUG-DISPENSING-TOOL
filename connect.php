<?php

require_once("connection.php");

try{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $fullname = $_POST['fullname'];
       $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        
        // Insert the form data into the database table
        $sql = "SELECT * FROM customer_details WHERE email = '$email'";
        $execute = mysqli_query($conn, $sql);
          
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email in not valid try again";
    }else if(strlen($password) < 6) {
        $errorMsg  = "Password should be six digits";
    }else if($execute->num_rows == 1){
        $errorMsg = "This Email is already exists";
    }else{
        $sql = "INSERT INTO customer_details (fullname, email, phone, gender, address, password) 
                VALUES ('$fullname', '$email', '$phone', '$gender', '$address', '$password')";
        $result = mysqli_query($conn, $sql);
        
        if ($result == true) {
        header("Location:loginform2.php");
    }else{
        $errorMsg  = "You are not Registred..Please Try again";
    }
  }
}
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;}}


 catch (Exception $ex){
    echo "<script>alert";
}



?>

