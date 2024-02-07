<?php
include "header.php";
include "connection.php";

$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if (isset($_POST['update_btn'])) {
    $update_id = $_POST['update_id'];
    $order_id = $_POST['update_order_id'];
    $des = $_POST['update_des'];
    $roomno = $_POST['update_roomno'];
    $block = $_POST['update_block'];

    $update_query = mysqli_query($conn, "UPDATE `product` SET block = '$block', order_id='$order_id', des='$des', roomno='$roomno'  WHERE id = '$update_id'");
    if ($update_query) {
        header('location:index.php');
    };
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `product` WHERE id = '$remove_id'");
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Directory Status</title>
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
            filter: blur(2px);
            -webkit-filter: blur(2px);
        }

        .container {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Directory Status</title>
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
        <h5>Directory Status</h5>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="table-container">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Room No</th>
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
                                <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                                <td><input type="text" class="form-control" name="update_des" value="<?php echo $row['des']; ?>"></td>
                                <td><input type="number" class="form-control" name="update_roomno" value="<?php echo $row['roomno']; ?>"></td>
                                <td><input type="number" class="form-control" name="update_block" value="<?php echo $row['block']; ?>"></td>
                                <td>
                                    <button type="submit" class="btn btn-primary" name="update_btn">Update</button>
                                    <a class="btn btn-danger" href="index.php?remove=<?php echo $row['id']; ?>">Delete</a>
                                </td>
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




