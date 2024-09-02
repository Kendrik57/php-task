//file2.php
<?php
session_start();

// Check if username is stored in session
if (!isset($_SESSION['username'])) {
    // Redirect to file1.php if not logged in
    header("Location: file1.php");
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];

// Handle logout
if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();

    // Redirect to file1.php
    header("Location: file1.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <form method="post" action="">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
