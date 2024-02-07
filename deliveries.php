<?php
include "header.php";
include "connection.php";

if (isset($_POST['submit'])) {
    // $order_id = $_POST['order_id'];
    $des = $_POST['des'];
    $roomno = $_POST['roomno'];
    $block = $_POST['block'];

    // Insert data into the 'deliveries' table
    $insertsql1 = "INSERT INTO deliveries(des, roomno, block) VALUES ( '$des', '$roomno', '$block')";
    
    if ($conn->query($insertsql1) === TRUE) {
        echo "Delivery record created successfully";
    } else {
        echo "Error: " . $insertsql1 . "<br>" . $conn->error;
    }

    // You can also get the last inserted 'id' from the 'deliveries' table
    $order_id = $conn->insert_id;

    // Then insert the same data into the 'product' table with the 'order_id' being the 'id' from the 'deliveries' table
    $insertsql = "INSERT INTO product( des, roomno, block) VALUES ( '$des', '$roomno', '$block')";

    if ($conn->query($insertsql) === TRUE) {
        // echo "Delivery record created successfully";
    } else {
        echo "Error: " . $insertsql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliveries</title>
    <style>
        h5 {
        margin-top: 1em;
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

        .mb-3 {
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
            border-spacing: 0 8px; 
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
        <h5>Delivery</h5>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <div class="mb-3">
                <label for="exampleInputDes" class="form-label">Order Id</label>
                <input type="text" name="des" class="form-control" id="exampleInputDes">
            </div>
            <div class="mb-3">
                <label for="exampleInputroomno" class="form-label">Room No</label>
                <input type="number" name="roomno" class="form-control" id="exampleInputroomno">
            </div>
            <div class="mb-3">
                <label for="exampleInputblock" class="form-label">Block</label>
                <input type="number" name="block" class="form-control" id="exampleInputblock">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </table>
        </form>
    </div>
</body>
</html>
