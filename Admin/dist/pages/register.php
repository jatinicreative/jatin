<?php
include 'db.php';

$firstnameErr = $lastnameErr = $usernameErr = $passwordErr = $message = "";
$first_name = $last_name = $username = $pass = "";

if (isset($_POST['register'])) {
    function input_data($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["first_name"])) {
        $firstnameErr = "First Name is required";
    } else {
        $first_name = input_data($_POST["first_name"]);
     
    }

    if (empty($_POST["last_name"])) {
        $lastnameErr = "Last Name is required";
    } else {
        $last_name = input_data($_POST["last_name"]);
    
    }

    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = input_data($_POST["username"]);
        $sql = "SELECT * FROM register WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $usernameErr = "Username already exists";
        }
    }

    if (empty($_POST["pass"])) {
        $passwordErr = "Password is required";
    }    
    else {
        $pass = $_POST["pass"];
        if (strlen($pass) < 5) {
            $passwordErr = "Password Minimun length should be 5 character";
        }
    }

    if (empty($firstnameErr) && empty($lastnameErr) && empty($usernameErr) && empty($passwordErr)) {
        $sql = "INSERT INTO register (first_name, last_name, username, pass) 
                VALUES ('$first_name', '$last_name', '$username', '$pass')";
        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful! <a href='login.php'>Login here</a>";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            margin: 50px auto;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4">
            <h2 class="text-center">Register </h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="<?= htmlspecialchars($first_name ?? '') ?>">
                    <small class="text-danger"><?php echo $firstnameErr; ?></small>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="<?= htmlspecialchars($last_name ?? '') ?>">
                    <small class="text-danger"><?php echo $lastnameErr; ?></small>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= htmlspecialchars($username ?? '') ?>">
                    <small class="text-danger"><?php echo $usernameErr; ?></small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="pass" id="password" class="form-control" value="<?= htmlspecialchars($username ?? '') ?>" >
                    <small class="text-danger"><?php echo $passwordErr; ?></small>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="register">Register</button>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
            <p class="text-success text-center"><?php echo $message; ?></p>
        </div>
    </div>
</body>
</html>