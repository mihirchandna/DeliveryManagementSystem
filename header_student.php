<?php
SESSION_START();

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] != 1) {
        header("location:login.php");
    }
} else {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delivery Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        nav {
            background-color: #fff; /* Background color */
            border-bottom: 1px solid #e9ecef; /* Border color */
        }

        .navbar-brand {
            color: #343a40; /* Brand text color */
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #343a40 !important; /* Nav link text color */
            margin-right: 15px; /* Spacing between nav items */
        }

        .navbar-nav .nav-link:hover {
            color: #007bff !important; /* Hovered nav link text color */
        }

        .navbar-toggler {
            border: 1px solid #343a40; /* Border color for the toggle button */
        }

        .navbar-toggler-icon {
            background-color: #343a40; /* Toggle button icon color */
        }

        .navbar-collapse {
            justify-content: flex-end;
        }

        .navbar-nav {
            margin-right: 0;
        }

        .navbar-nav .nav-item {
            padding: 0;
        }

        .navbar-nav .nav-link {
            padding: 1rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">Delivery Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="index.php">Directory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="purchase.php">Deliveries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sales.php">Handover</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="purchase_report.php">Delivery Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sales_report.php">Handover Report</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" style="color:red!important;" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>
