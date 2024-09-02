<html>
<head><title>Nested Loops</title></head>
<body>
<h1>Nested Loops</h1>
<?
	//your answer goes here
?>

</body>
</html>

<html>
<head><title>Nested Loops</title></head>
<body>
<h1>Nested Loops</h1>
<?php
    // First Pattern
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br/>";
    }

    echo "<br/><br/>";

    // Second Pattern (Table with increasing stars)
    echo "<table border=1>";
    for ($i = 1; $i <= 5; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 5; $j++) {
            if ($j <= $i) {
                echo "<td>*</td>";
            } else {
                echo "<td>&nbsp;</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<br/><br/>";

    // Third Pattern (Table with decreasing 'y' and increasing stars)
    echo "<table border=1>";
    for ($i = 1; $i <= 5; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 5; $j++) {
            if ($j <= 5 - $i) {
                echo "<td>y</td>";
            } else {
                echo "<td>*</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
?>
</body>
</html>
