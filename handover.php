<?php
include "header.php";
include "connection.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $des = $_POST['des'];
    $roomno = $_POST['roomno'];
    $block = $_POST['block'];

    $insertsql = "INSERT INTO handover(des, roomno, block) VALUES ('$des', '$roomno','$block')";

    if ($conn->query($insertsql) === TRUE) {
        $successMessage = "Handover successfully";

        // Remove the product from the sales page (assuming you have a unique identifier)
        $deletesql = "DELETE FROM product WHERE id = $id";
        $conn->query($deletesql);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Handover</title>
    <style>
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
    <div class="container mt-4">
        <h5>Handover</h5>
        <?php
        if (isset($successMessage)) {
            echo "<p style='color: green;'>$successMessage</p>";
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="table-container">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Room no</th>
                        <th scope="col">Block</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="des" value="<?php echo $row['des']; ?>">
                                <input type="hidden" name="roomno" value="<?php echo $row['roomno']; ?>">
                                <input type="hidden" name="block" value="<?php echo $row['block']; ?>">
                                <td><?php echo $row['des']; ?></td>
                                <td><?php echo $row['roomno']; ?></td>
                                <td><?php echo $row['block']; ?></td>
                                <td><button type="submit" class="btn btn-primary" name="submit">Handover Now</button></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>

