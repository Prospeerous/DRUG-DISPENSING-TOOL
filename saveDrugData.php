<?php
require_once("Database_class.php");
print_r ($_POST);
try{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    $medCode =$_POST["medCode"];
    $medicineName =  $_POST["medicineName"];
    $type =  $_POST["type"];
    $quantity =  $_POST["quantity"];
    $price =  $_POST["price"];
    $expiryDate =  $_POST["expiryDate"];

    $sql = "INSERT INTO medicine (MedCode, Medicine_name, Type, Quantity, Price, Expiry_Date) 
            VALUES ('$medCode', '$medicineName', '$type', $quantity, $price, '$expiryDate')";

   if($conn->query($sql)===TRUE){
echo "<script>alert('Data inserted successfully')</script>";
   // $db->closeConnection();
}
else{
echo "Error:".sql."<br>".$conn->error;
    //$db->closeConnection();
    }}
 } catch (Exception $ex) {
     echo "<script>alert('no connection')</script>";

}       