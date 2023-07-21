<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "drug_dispensation";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully ";

$result;

if (isset($_POST['submit'])) {
    $whatToSearch = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM prescription WHERE `Patient Number` = '$whatToSearch' ORDER BY `Patient Number` DESC";
    $result = $conn->query($sql);
} else {
    // SQL query to select data from the database
    $sql = "SELECT * FROM prescription ORDER BY `Patient Number` DESC ";
    $result = $conn->query($sql);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>PRESCRIPTION</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
 <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #000;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td ,th{
            background-color:indianred  ;
            border: 1px solid ;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 30px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
       
    </style>


</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>PRESCRIPTION</h1>
                         <form action="" method="POST">

            <div class="form-group">
                <input type="search" name="search" required>
                <span></span>
                <label>Search</label>
            </div>

            <input type="submit" name="submit" value="Search">

        </form>

        <button>
        <a href="?reset=1">Reset</a></button>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="big-dark text-white">
                                <th>Patient Name</th>
                                <th>Patient Number</th>
                                <th>Doctor's Email</th>
                                <th>Medication Name</th>
                                <th>Dosage</th>
                                <th>Frequency</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                            // LOOP TILL END OF DATA
                            while ($rows = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $rows['Patient Name']; ?></td>
                                    <td><?php echo $rows['Patient Number']; ?></td>
                                    <td><?php echo $rows['Doctor Email']; ?></td>
                                    <td><?php echo $rows['Medication Name']; ?></td>
                                    <td><?php echo $rows['Dosage']; ?></td>
                                    <td><?php echo $rows['Frequency']; ?></td>
                                    <td><a href="dispenseDrugss.php?id=<?php echo urlencode($rows['Patient Number']); ?>">Dispense</a></td>
                                    <td><a href="prescription_delete.php?id=<?php echo $rows['Patient Number']; ?>">Delete</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
