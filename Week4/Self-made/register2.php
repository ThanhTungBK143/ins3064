<?php
require_once 'db_connect2.php';
session_start();

$message = "";
$redirect = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (!empty($username) && !empty($password) && !empty($confirm_password)) {
        if ($password !== $confirm_password) {
            $message = "⚠️ Passwords do not match. Please try again.";
        } else {
            // Check if username already exists
            $check_stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
            $check_stmt->bind_param("s", $username);
            $check_stmt->execute();
            $result = $check_stmt->get_result();

            if ($result->num_rows > 0) {
                $message = "⚠️ Username already exists. Please choose another one.";
            } else {
                $hashed_password = md5($password); // MD5 hash for password

                $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $hashed_password);

                if ($stmt->execute()) {
                    $message = "✅ Registration successful! Redirecting to login page...";
                    $redirect = true;
                } else {
                    $message = "❌ Error: Could not register user.";
                }

                $stmt->close();
            }

            $check_stmt->close();
        }
    } else {
        $message = "⚠️ Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background: white;
            padding: 30px 35px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        button:hover {
            opacity: 0.9;
        }
        button[type="submit"] {
            background-color: #4CAF50;
        }
        .login-btn {
            background-color: #008CBA;
            margin-top: 10px;
        }
        .message {
            margin-bottom: 15px;
            color: #333;
            text-align: center;
            font-size: 14px;
        }
    </style>

    <?php if ($redirect): ?>
        <meta http-equiv="refresh" content="2;url=login2.php">
    <?php endif; ?>
</head>
<body>
<form method="POST" action="">
    <h2>Register</h2>
    <div class="message"><?php echo $message; ?></div>

    <label>Username:</label>
    <input type="text" name="username" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <label>Re-enter Password:</label>
    <input type="password" name="confirm_password" required>

    <button type="submit">Register</button>
    <button type="button" class="login-btn" onclick="window.location.href='login2.php'">Go to Login</button>
</form>
</body>
</html>
