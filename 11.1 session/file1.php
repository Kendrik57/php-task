//file1.php
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['fruit'])) {
        $fruit = $_POST['fruit'];

        // Initialize session array if not already set
        if (!isset($_SESSION['fruit_counts'])) {
            $_SESSION['fruit_counts'] = ['Apple' => 0, 'Banana' => 0, 'Orange' => 0];
        }

        // Increment the count for the selected fruit
        $_SESSION['fruit_counts'][$fruit]++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select a Fruit</title>
</head>
<body>
    <form method="post" action="file1.php">
        <label><input type="radio" name="fruit" value="Apple"> Apple</label><br>
        <label><input type="radio" name="fruit" value="Banana"> Banana</label><br>
        <label><input type="radio" name="fruit" value="Orange"> Orange</label><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <a href="file2.php">View Results</a>
</body>
</html>