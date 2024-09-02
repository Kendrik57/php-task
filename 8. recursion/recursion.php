<?php
function showdir($folder, $level) {
    // Get the list of files and directories inside the specified folder
    $files = scandir($folder);

    // Add a "Parent" link if not at the root level
    if ($level > 1) {
        // Go up one level
        $parentFolder = dirname($folder);
        echo str_repeat('&nbsp;', ($level - 1) * 6);
        echo "<a href='?folder=" . urlencode($parentFolder) . "'><img src='icofolder.gif'/> ..</a><br>";
    }

    // Loop through each item
    foreach ($files as $file) {
        // Skip the special '.' and '..' directories
        if ($file == '.' || $file == '..') continue;

        // Path to the current item
        $path = $folder . '/' . $file;

        // Indent based on the current level
        echo str_repeat('&nbsp;', $level * 6);

        // Check if it's a directory
        if (is_dir($path)) {
            // Output folder with icon
            echo "<img src='icofolder.gif'/> " . htmlspecialchars($file) . "\\<br>";
            // Recurse into the directory
            showdir($path, $level + 1);
        } else {
            // Output file with icon
            echo "<img src='icofile.gif'/> " . htmlspecialchars($file) . "<br>";
        }
    }
}
?>

<html>
<body>
<?php
// Determine the folder to display based on query parameter or default to current directory
$folder = isset($_GET['folder']) ? $_GET['folder'] : './';
showdir($folder, 1);
?>
</body>
</html>
