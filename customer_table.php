<?php
include("viewpatients.php");

$sql = "SELECT * FROM customer_details ORDER BY ID DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration details</title>

    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <section>
        <h1>Registration details</h1>
        <table>
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            // LOOP TILL END OF DATA
            if (mysqli_num_rows($result) > 0) {
                $sn = 1;
                while ($rows = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <!-- FETCHING DATA FROM EACH
                        ROW OF EVERY COLUMN -->
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $rows['fullname']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><?php echo $rows['phone']; ?></td>
                        <td><?php echo $rows['gender']; ?></td>
                        <td><?php echo $rows['address']; ?></td>
                        <td><?php echo $rows['password']; ?></td>
                        <td><a href="customer_edit.php?id=<?php echo $rows['ID']; ?>">Edit</a></td>
                        <td><a href="customer_delete.php?email=<?php echo $rows['email']; ?>">Delete</a></td>
                    </tr>
            <?php
                    $sn++;
                }
            } else { ?>
                <tr>
                    <td colspan="9">No data found</td>
                </tr>
            <?php } ?>
        </table>
    </section>
</body>

</html>
