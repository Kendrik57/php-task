<?php
// Number of rolls
$numRolls = 1000;

// Array to store the count of each number
$counts = array_fill(1, 6, 0);

// Generate random dice rolls and count occurrences
for ($i = 0; $i < $numRolls; $i++) {
    $roll = rand(1, 6);
    $counts[$roll]++;
}

// Build the HTML table
echo "<table border='1'>";
echo "<tr><th>Number</th><th>Count</th><th>Probability</th></tr>";

foreach ($counts as $number => $count) {
    $probability = $count / $numRolls ;
    echo "<tr><td>{$number}</td><td>{$count}</td><td>" . number_format($probability, 3). "</td></tr>";
}

echo "</table>";
?>
