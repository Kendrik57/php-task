<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Probability Calculator</title>
</head>
<body>
    <h1>Dice Probability Calculator</h1>
    <form method="post">
        <label for="numDice">Number of Dice:</label>
        <input type="number" id="numDice" name="numDice" min="1" required>
        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numDice = intval($_POST["numDice"]);

        if ($numDice <= 0) {
            echo "<p>Please enter a valid number of dice.</p>";
        } else {
            // Number of rolls
            $numRolls = 100000;
            $results = array_fill(1, $numDice * 6, 0); // Initialize results array

            for ($i = 0; $i < $numRolls; $i++) {
                $total = 0;
                for ($j = 0; $j < $numDice; $j++) {
                    $total += rand(1, 6);
                }
                if ($total >= $numDice && $total <= $numDice * 6) {
                    $results[$total]++;
                }
            }

            // Display results
            echo "<h2>Results</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Sum</th><th>Count</th><th>Percentage</th></tr>";

            for ($i = $numDice; $i <= $numDice * 6; $i++) {
                $count = $results[$i];
                $percentage = ($count / $numRolls) * 100;
                echo "<tr><td>$i</td><td>$count</td><td>" . number_format($percentage, 2) . "%</td></tr>";
            }

            echo "</table>";
        }
    }
    ?>
</body>
</html>

