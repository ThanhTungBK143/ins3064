<?php
require_once 'db_connect2.php';
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $hashed_password = md5($password);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $hashed_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            //$_SESSION['username'] = $username;
            //header("Location: index.php"); // redirect to homepage
            $message = "✅ Login successful! Welcome, " . htmlspecialchars($username) . ".";
            //exit();
        } else {
            $message = "❌ Invalid username or password.";
        }

        $stmt->close();
    } else {
        $message = "⚠️ Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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

        input[type=text],
        input[type=password] {
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
            background-color: #008CBA;
        }

        .register-btn {
            background-color: #4CAF50;
            margin-top: 10px;
        }

        .message {
            margin-bottom: 15px;
            color: #333;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
<form method="POST" action="">
    <h2>Login</h2>
    <div class="message"><?php echo $message; ?></div>

    <label>Username:</label>
    <input type="text" name="username" required>
    
    <label>Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
    <button type="button" class="register-btn" onclick="window.location.href='register2.php'">Go to Register</button>
</form>
</body>
</html>
