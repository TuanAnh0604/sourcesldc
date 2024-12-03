<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Sign Up</title>
    <link rel="stylesheet" href="Register.css">
</head>

<body>
    <div class="signup-container">
        <h2>Create account</h2>
        <div class="signup-box">
            <form id="signup-form" action="" method="POST">
                <div class="input-box">
                    <label for="username" class="icon-label">
                        <i class="fas fa-user"></i>
                    </label>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="input-box">
                    <label for="email" class="icon-label">
                        <i class="fas fa-envelope"></i>
                    </label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-box">
                    <label for="password" class="icon-label">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-box">
                    <label for="confirm-password" class="icon-label">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                </div>
                <div class="input-box">
                    <label for="phone" class="icon-label">
                        <i class="fas fa-phone"></i>
                    </label>
                    <input type="text" id="phone" name="phone" placeholder="Phone" required>
                </div>
                <div class="input-box">
                    <label for="role" class="icon-label">
                        <i class="fas fa-user-tag"></i>
                    </label>
                    <select id="role" name="role" required>
                        <option value="2">Teacher</option>
                        <option value="3">Student</option>
                    </select>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I Agree To The Terms & Conditions</label>
                </div>
                <div>
                    <button type="submit" class="signup-button">SIGN UP</button>
                </div>
                <br>
                <p>Already have an Account? <a href="Login.php">Login Now!</a></p>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = '127.0.0.1'; // IP address
    $username = 'root'; // Database username
    $password = ''; // Database password
    $dbname = 'asmn'; // Database name
    $port = 4306; // MySQL port

    // Connect to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    if ($conn) {
        echo "<script>alert('Connection successful!');</script>";
    } else {
        echo "<script>alert('Connection failed!');</script>";
        exit(); // Stop execution if connection fails
    }

    // Get data from the form
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
        exit(); // Stop execution if passwords do not match
    }

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM users WHERE Username = '$userName'";
    $result = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists. Please choose a different one.');</script>";
        exit(); // Stop execution if username already exists
    }


    // Perform the INSERT query
    $sql = "INSERT INTO users (Username, Password, Email, Phone, Role) VALUES ('$userName', '$password', '$email', '$phone', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('You have successfully registered!');
                window.location.href = 'login.php'; // Redirect to login page
              </script>";
        exit();
    } else {
        echo "<script>alert('Registration failed! Error: " . mysqli_error($conn) . "');</script>";
    }

    // Close the connection
    mysqli_close($conn);
}
?>


