<?php
include "header.php";
include "connection.php";
$t=0;
if (isset($_POST['submit'])) 
{
    $starttime=$_POST['starttime'];
    $endtime=$_POST['endtime'];

    $sql = "SELECT * FROM handover where created_at>='$starttime' && created_at<'$endtime'";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handover Report</title>
    <style>
       h5 {
        margin-top: 1em; /* Adjust the value as needed */
    }
        body {
            position: relative;
            margin: 0;
            padding: 0;
        }

        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: url('img/MAHE.svg') no-repeat center center fixed;
            background-size: 100% 100%;
            filter: blur(0px);
            -webkit-filter: blur(0px);
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .table-container {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px; /* Add margin-bottom for spacing */
        }

        table {
            width: 100%;
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0 8px; /* Adjust the spacing between rows */
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        tbody tr {
            background-color: white;
        }

        tbody tr:nth-child(odd),
        tbody tr:nth-child(odd) td {
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="starttime">Start (date and time):</label>
            <input type="datetime-local" id="starttime" name="starttime">

            <label for="endtime"> End (date and time):</label>
            <input type="datetime-local" id="endtime" name="endtime">
            <input type="submit" name="submit">
        </form>
        <button type="button" onclick="window.print();return false;">Pdf Report</button>
        <h5>Handover Report</h5>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Room No</th>
                        <th scope="col">Block</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($result) && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['des'] . "</td>";
                            echo "<td>" . $row['roomno'] . "</td>";
                            echo "<td>" . $row['block'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
