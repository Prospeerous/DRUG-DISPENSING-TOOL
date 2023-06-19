<?php
session_start();
if(isset($_SESSION['Username']) && isset($_SESSION['Email'])){
?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>hello, <?php echo $_SESSION['Username']; ?></h1><!-- comment -->
    <a href="Logout.php">Logout</a>

</body>
</html>
<?php
} else {
    header("Location: Admin_Login.php");
    exit();
}
?>
