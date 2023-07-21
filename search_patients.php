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
    $sql = "SELECT * FROM symptoms WHERE `Patient Number` = '$whatToSearch' ORDER BY `Patient Number` DESC";
    $result = $conn->query($sql);
} else {
    // SQL query to select data from the database
    $sql = "SELECT * FROM symptoms ORDER BY `Patient Number` DESC ";
    $result = $conn->query($sql);
}
?>

<!-- Rest of the code remains unchanged -->

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Patient Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
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

<body>
    <section>
        <h1>Patient Details</h1>
        <!-- TABLE CONSTRUCTION -->

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

        <table>
            <tr>
                <th>Patient Name</th>
                <th>Patient Number</th>
                <th>Symptoms</th>
                <th>Duration</th>
                <th>On Medication</th>
                <th>Allergies</th>
                <th>Prescribe</th>

            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
            // LOOP TILL END OF DATA
            while ($rows = $result->fetch_assoc()) {
            ?>
                <tr>
                    <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                    <td><?php echo $rows['Patient Name']; ?></td>
                    <td><?php echo $rows['Patient Number']; ?></td>
                    <td><?php echo $rows['Symptoms']; ?></td>
                    <td><?php echo $rows['Duration']; ?></td>
                    <td><?php echo $rows['On Medication']; ?></td>
                    <td><?php echo $rows['Allergies']; ?></td>
                     <td><a href="issuePrescription.php?id=<?php echo urlencode($rows['Patient Number']); ?>">Prescribe</a></td>

                </tr>
            <?php
            }
            ?>
        </table>
    </section>
</body>

</html>
