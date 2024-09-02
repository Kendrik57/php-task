//file2.php
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fruit Selection Results</title>
</head>
<body>
    <h2>Fruit Selection Results</h2>

    <?php if (isset($_SESSION['fruit_counts'])): ?>
        <table border="1">
            <tr>
                <th>Fruit</th>
                <th>Selection Count</th>
            </tr>
            <tr>
                <td>Apple</td>
                <td><?php echo $_SESSION['fruit_counts']['Apple']; ?></td>
            </tr>
            <tr>
                <td>Banana</td>
                <td><?php echo $_SESSION['fruit_counts']['Banana']; ?></td>
            </tr>
            <tr>
                <td>Orange</td>
                <td><?php echo $_SESSION['fruit_counts']['Orange']; ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p>No selections have been made yet.</p>
    <?php endif; ?>

    <br>
    <a href="file1.php">Go back to selection</a>
</body>
</html>