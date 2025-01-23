<?php
        session_start();
        include('db.php');
?>
<html>
<head>
    <title>Login</title>
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
            <h2 class="text-center">Login</h2>
            <form method="POST" action="loginn.php">
                
                <div class="mb-3">
                    <label for="email" class="form-label">Username</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php if (isset($_COOKIE["user"])){echo $_COOKIE["user"];}?>">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="pass" id="pass" class="form-control" value="<?php if (isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>">
                </div>
                <input type="checkbox" name="remember" <?php if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])){ echo "checked";}?>> Remember me <br><br>
                <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
            </form>
            <span>
                <?php
                if (isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                }
                unset($_SESSION['message']);
                ?>
                </span>
            <p class="text-center mt-3">Don't have an account? <a href="register.php">Register here</a></p>
       
        </div>
    </div>
</body>
</html>