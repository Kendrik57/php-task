<!DOCTYPE html>
<html>
<head>
    <title>Fibonacci</title>
</head>
<body>

<h1>Fibonacci</h1>
<?php
// Recursive function to calculate Fibonacci numbers
function fibonacciRabbits($months) {
    // Base cases
    if ($months == 0) {
        return 0;
    }
    if ($months == 1) {
        return 1;
    }
    // Recursive case
    return fibonacciRabbits($months - 1) + fibonacciRabbits($months - 2);
}

$month = isset($_POST["month"]) ? (int)$_POST["month"] : 0;
$result = null;
if (isset($_POST["btnsubmit"])) {
    $result = fibonacciRabbits($month);
}
?>

<form method="post" action="">
    Months: <input type="text" name="month" value="<?= htmlspecialchars($month) ?>" />
    <input type="submit" name="btnsubmit" value="Calculate!" />
</form>

<?php
if ($result !== null) {
    echo "<p>After $month months, there will be $result pairs of rabbits.</p>";
}
?>

</body>
</html>
