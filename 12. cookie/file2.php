//file2.php
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: file1.php");
    exit();
}

// Logout functionality
if (isset($_POST['logout'])) {
    // Destroy session and redirect to file1.php
    session_destroy();
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
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <form method="post" action="file2.php">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>