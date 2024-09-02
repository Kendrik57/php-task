//file1.php
<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    // Validate input fields
    if (empty($username) || empty($password)) {
        $error = "Username and Password cannot be blank.";
    } else {
        // Simulate a login success (In real-world, you should authenticate against a database)
        if ($username == "user" && $password == "pass") {
            // Set session
            $_SESSION['username'] = $username;

            if ($remember) {
                // Set cookies that expire in 30 days
                setcookie('username', $username, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            } else {
                // Unset any existing cookies
                if (isset($_COOKIE['username'])) {
                    setcookie('username', '', time() - 3600, "/");
                }
                if (isset($_COOKIE['password'])) {
                    setcookie('password', '', time() - 3600, "/");
                }
            }

            // Redirect to file2.php
            header("Location: file2.php");
            exit();
        } else {
            $error = "Invalid Username or Password.";
        }
    }
}

// Check if cookies are set
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $savedUsername = $_COOKIE['username'];
    $savedPassword = $_COOKIE['password'];
} else {
    $savedUsername = "";
    $savedPassword = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post" action="file1.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($savedUsername); ?>"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($savedPassword); ?>"><br><br>

        <input type="checkbox" id="remember" name="remember" <?php if (!empty($savedUsername)) echo "checked"; ?>>
        <label for="remember">Remember Me</label><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
