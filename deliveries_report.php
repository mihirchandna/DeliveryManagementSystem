<?php
include "header.php";
include "connection.php";
$t=0;
if (isset($_POST['submit'])) {
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

    $sql = "SELECT * FROM deliveries where created_at>='$starttime' && created_at<'$endtime'";
    $res = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            border-radius: 10px; /* Adjusted for curved edges */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px; /* Adjust as needed */
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
            border-radius: 8px; /* Adjusted for curved edges */
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
        <h5>Delivery Report</h5>
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <!--<th scope="col">#</th>-->
                        <th scope="col">Order Number</th>
                        <th scope="col">Room No</th>
                        <th scope="col">Block</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['submit'])) {
                        if (mysqli_num_rows($res) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($res)) {
                                $t = $t + ($row['roomno'] * $row['block']);
                    ?>
                                <tr>
                                    <td><?php echo $row['des']; ?></td>
                                    <td><?php echo $row['roomno']; ?></td>
                                    <td><?php echo $row['block']; ?></td>
                                </tr>
                    <?php
                            }
                        } else {
                            echo "0 results";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
