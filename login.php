<?php
include "connection.php";

session_start();

if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth'] == 1) {
        header("location:index.php");
    }
}

if (isset($_POST['admin_submit'])) {
    $id = $_POST['id'];
    $pass = ($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $id, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['auth'] = 1;
        header("location:index.php");;
    } else {
        echo "Invalid admin credentials";
    }

    $stmt->close();
}

if (isset($_POST['student_submit'])) {
    $id = $_POST['id'];
    $pass = ($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $id, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['auth'] = 1;
        header("location:delivery_report_student.php");
    } else {
        echo "Invalid student credentials";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <style>
    body {
        background: url('img/MAHE.svg') no-repeat center center fixed;
        background-size: 100% 100%;
    }

    .blurry-background {
        filter: blur(5px);
        -webkit-filter: blur(5px);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        width: 300px;
        padding: 20px;
        text-align: center;
    }
    .form-group input {
        margin: 5px 0;
    } 
    </style>
</head>
<body>
<div class="blurry-background"></div>
<div class="container">
    <div class="card">
    <div class="title">Delivery Management System</div>
            <h3>Sign In</h3>
        <div class="card-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="input-group form-group">
                    <input type="text" class="form-control" placeholder="username" name="id">
                </div>
                <div class="input-group form-group">
                    <input type="password" class="form-control" placeholder="password" name="password">
                </div>
                <div class="form-group">
                <input type="submit" value="Admin Login" class="btn btn-primary" name="admin_submit">
                <input type="submit" value="Student Login" class="btn btn-primary" name="student_submit">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>
