
<?php
	$arr = array(
		"101: orange juice - 5.2",
		"504: hot roll - 6.2",
		"106: lime juice - 3",
		"210: mineral water (s) - 2.6",
		"107: PEACH JUICE - 6.99",
		"211: mineral water (m) - 3.7",
		"500: hot dog (r) - 3.7",
		"212: mineral water (l) - 4.9",
		"509: popcorn - 4.2",
		"501: HOT DOG (l) - 5.1",
		"502: apple pie - 12.69",
		"100: apple juice - 4.8",
		"506: pine tart - 0.75",
		"108: coca COLA - 3.25",
	);

	// 1. Food Menu
	echo "<b><u>1. Food Menu</u></b><br/>\n";
	foreach ($arr as $item) {
	    echo "$item<br>";
	}
	echo "<br>";

	// 2. Food Menu
	echo "<b><u>2. Food Menu</u></b><br/>\n";
	echo "<table border=1>";
	echo "<tr><th>Code</th><th>Name</th><th>Price</th></tr>";
	foreach ($arr as $item) {
	    list($code, $name_price) = explode(': ', $item);
	    list($name, $price) = explode(' - ', $name_price);
	    echo "<tr><td>$code</td><td>$name</td><td>$price</td></tr>";
	}
	echo "</table><br>";

	// 3. Food Menu
	echo "<b><u>3. Food Menu</u></b><br/>\n";
	usort($arr, function($a, $b) {
	    return (int)explode(': ', $a)[0] <=> (int)explode(': ', $b)[0];
	});
	echo "<table border=1>";
	echo "<tr style='background-color:blue; color:white;'><th>Code</th><th>Name</th><th>Price</th></tr>";
	foreach ($arr as $index => $item) {
	    list($code, $name_price) = explode(': ', $item);
	    list($name, $price) = explode(' - ', $name_price);
		// Format the name
	    $name = ucwords(strtolower($name));
		// Format the price
	    $price = "RM" . number_format((float)$price, 2);
		// Alternate row color
	    $row_color = ($index % 2 == 0) ? 'white' : 'yellow';
	    echo "<tr style='background-color:$row_color'><td>$code</td><td>$name</td><td align=right>$price</td></tr>";
	}
	echo "</table><br>";

	// 4. Food Menu
	echo "<b><u>4. Food Menu</u></b><br/>\n";
	echo "<table border=1 style='border-collapse:collapse; font-family:Arial; font-size:10pt;' bordercolor='black' cellpadding=5>";
	$items_per_row = 4; // Adjust this value to change the number of columns
	foreach ($arr as $index => $item) {
	    list($code, $name_price) = explode(': ', $item);
	    list($name, $price) = explode(' - ', $name_price);
		// Format the name
	    $name = ucwords(strtolower($name));
		// Format the price
	    $price = "RM" . number_format((float)$price, 2);
		// Alternate row color
	    $box_color = ($index % 2 == 0) ? 'white' : 'yellow';
	    if ($index % $items_per_row == 0) {
	        echo "<tr>";
	    }
	    echo "<td width=120 style='background-color:$box_color'><b>$code</b><br/>$name<br/><div align=right><b style='color:red;'>$price</b></div></td>";
	    if (($index + 1) % $items_per_row == 0) {
	        echo "</tr>";
	    }
	}
	if ($index % $items_per_row != 3) {
	    echo "</tr>";
	}
	echo "</table><br>";

	echo "<b><u>4. Food Menu</u></b><br/>\n";
	echo "<table border=1 style='border-collapse:collapse; font-family:Arial; font-size:10pt;' bordercolor='black' cellpadding=5>";
	$items_per_row = 4; // Adjust this value to change the number of columns
	
	foreach ($arr as $index => $item) {
		list($code, $name_price) = explode(': ', $item);
		list($name, $price) = explode(' - ', $name_price);
	
		// Format the name
		$name = ucwords(strtolower($name));
	
		// Format the price
		$price = "RM" . number_format((float)$price, 2);
	
		// Start a new row if the item is at the start of the row
		if ($index % $items_per_row == 0) {
			echo "<tr>";
		}
	
		// Alternate the colors within the row
		$cell_color = (($index + floor($index / $items_per_row)) % 2 == 0) ? 'white' : 'yellow';
	
		echo "<td width=120 style='background-color:$cell_color'><b>$code</b><br/>$name<br/><div align=right><b style='color:red;'>$price</b></div></td>";
	
		// End the row if the item is at the end of the row
		if (($index + 1) % $items_per_row == 0) {
			echo "</tr>";
		}
	}
	
	// Close the last row if it isn't fully filled
	if (($index + 1) % $items_per_row != 0) {
		echo "</tr>";
	}
	
	echo "</table><br>";
	
	
?>
