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
<html lang="ta">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | வாகை தமிழ்ச்சங்கம்</title>
    <link rel="icon" href="vts logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Tamil&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Tamil', sans-serif;
            background: linear-gradient(to right, #fdfbfb, #ebedee);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: #d63384;
            border: none;
        }

        .btn-primary:hover {
            background-color: #c82373;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4">
                    <div class="text-center">
                        <img src="vts logo.png" alt="Logo" class="mb-3" style="width: 80px;">
                        <h2 class="text-danger fw-bold">வாகை தமிழ்ச்சங்கம்</h2>
                        <p class="text-muted">பாடத்திட்டம் & மதிப்பீட்டு குழு</p>
                    </div>
                    <form method="post">
                        <div class="mb-3">
                            <label for="register_number" class="form-label">பதிவு எண்</label>
                            <input type="text" class="form-control" id="register_number" name="register_number" placeholder="பதிவு எண் உள்ளிடவும்..." required>
                        </div>
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">பிறந்த தேதி</label>
                            <input type="date" class="form-control" id="date_of_birth" name="dob" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">உள்நுழைக</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
