<?php
session_start();
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'LoginReg');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentid = $_POST['studentid'];
    $studentname = $_POST['studentname'];
    $classname = $_POST['classname'];
    $country = $_POST['country'];

    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    $reg = "INSERT INTO userReg (username, password, studentid, studentname, classname, country)
            VALUES ('$username', '$password', '$studentid', '$studentname', '$classname', '$country')";

    if (mysqli_query($con, $reg)) {
        echo "Registration successful! Redirecting to login page...";
        echo "<meta http-equiv='refresh' content='2;url=login.php'>";
        session_destroy();
    } else {
        echo "Error: " . mysqli_error($con);
    }

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
    <title>Student Info Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>  
    <div class="container mt-5">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left mx-auto">

                    <form method="post" class="p-4 border rounded bg-light shadow-sm">
                        <h2 class="text-center mb-4">Enter Student Information</h2>
                        <div class="form-group">
                            <label>Student ID:</label>
                            <input type="number" name="studentid" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Student Name:</label>
                            <input type="text" name="studentname" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Class Name:</label>
                            <input type="text" name="classname" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Country:</label>
                            <input type="text" name="country" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>