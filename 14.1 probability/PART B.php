<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Probability</title>
</head>
<body>
    <h1>Dice Roll Probability</h1>
    <?php
// Initialize an array to store the count of each possible sum (2 to 12)
$results = array_fill(2, 11, 0);

// Roll the dice 1000 times
for ($i = 0; $i < 1000; $i++) {
    $die1 = rand(1, 6); // Roll the first die
    $die2 = rand(1, 6); // Roll the second die
    $number = $die1 + $die2; // Calculate the sum
    $results[$number]++; // Increment the count for the sum
}

// Generate the HTML table
echo "<table border='1'>";
echo "<tr><th>Number</th><th>Frequency</th></tr>";

foreach ($results as $number => $count) {
    echo "<tr><td>$number</td><td>$count</td></tr>";
}

echo "</table>";
?>

</body>
</html>

