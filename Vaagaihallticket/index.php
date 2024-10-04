<?php
session_start();
include('db.php'); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $register_number = $_POST['register_number'];
    $dob = $_POST['dob'];

    $sql = "SELECT * FROM students WHERE register_number = ? AND dob = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $register_number, $dob);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $_SESSION['register_number'] = $register_number;
        header("Location: hall_ticket.php");
        exit();
    } else {
        echo "<script>alert('Invalid Register Number or Date of Birth');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="vts logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *{
            @font-face {
                font-family: ATM 005;
                src: url("");
            }
        }
        body {
            background-color: #f1f3f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            border: 8px solid;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-body">
            <h1 class="display-3 text-center text-danger">வாகை தமிழ்சங்கம் </h1>
            <h5 class="text-center" >பாடதிட்டம் & மதிப்பீட்டு குழு </h5>
            <img src="vts logo.png" alt="Logo" style="display: block; margin: 0 auto; width: 100px; height: auto;">
            <h2 class="text-center mb-4">LOGIN</h2>
            <form method="post">
                <div class="mb-3 text-center">
                    <label for="register_number" class="form-label" >பதிவு எண் </label>
                    <input type="text" class="form-control" id="register_number" name="register_number" placeholder="பதிவு எண் உள்ளிடவும்..." required>
                </div>
                <div class="mb-3 text-center">
                    <label for="date_of_birth" class="form-label">பிறந்ததேதி </label>
                    <input type="date" class="form-control" id="date_of_birth" name="dob" required >
                </div>
                <button type="submit" class="btn btn-primary w-100">உள்நுழைக</button>
            </form>
        </div>
    </div>
</body>
</html>
