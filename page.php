<?php
// Define the number of records to display per page
$recordsPerPage = 10;

// Get the current page number from the URL parameter
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the query
$offset = ($currentPage - 1) * $recordsPerPage;

// Establish a connection to the MySQL server
require_once"Database_Class.php";
print_r($_POST);

// Query to get the total number of records
$countQuery = "SELECT COUNT(*) AS total FROM supplier";
$countResult = mysqli_query($conn, $countQuery);
$row = mysqli_fetch_assoc($countResult);
$totalRecords = $row['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);

// Query to get the records for the current page
$query = "SELECT * FROM supplier LIMIT $offset, $recordsPerPage";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>SUPPLIER DETAILS</title>
    
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
                        <h1>SUPPLIER DETAILS</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="big-dark text-white">
                                <th>Supplier Name</th>
                                <th>Supplier Id</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Medicine Code</th>
                            </tr>

                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['SupplierName']; ?></td>
                                    <td><?php echo $row['SupplierID']; ?></td>
                                    <td><?php echo $row['Address']; ?></td>
                                    <td><?php echo $row['PhoneNo']; ?></td>
                                    <td><?php echo $row['MedCode']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>

                        <div class="pagination">
                            <?php
                            // Generate pagination links
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<a href='?page=$i'>$i</a> ";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
