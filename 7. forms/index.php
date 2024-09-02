
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS player (
    username VARCHAR(10) PRIMARY KEY,
    userpass VARCHAR(10),
    fname VARCHAR(30),
    lname VARCHAR(30),
    age INT
)";
$conn->query($table_sql);

// Registration handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $userpass = trim($_POST['userpass']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $age = intval($_POST['age']);

    // Input validation
    if (empty($username) || empty($userpass) || empty($fname) || empty($lname) || $age <= 0) {
        echo "All fields are required, and age must be a positive number.";
    } else {
        $stmt = $conn->prepare("INSERT INTO player (username, userpass, fname, lname, age) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $username, $userpass, $fname, $lname, $age);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

// Login handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $userpass = trim($_POST['userpass']);

    $stmt = $conn->prepare("SELECT fname, lname FROM player WHERE username = ? AND userpass = ?");
    $stmt->bind_param("ss", $username, $userpass);
    $stmt->execute();
    $stmt->bind_result($fname, $lname);

    if ($stmt->fetch()) {
        echo "Welcome, " . htmlspecialchars($fname) . " " . htmlspecialchars($lname) . "!";
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

// Image upload handling
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $upload_dir = 'uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $random_filename = bin2hex(random_bytes(4)) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $upload_file = $upload_dir . $random_filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
        echo "File uploaded successfully!";
    } else {
        echo "Failed to upload file.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Player Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 120px;
        }
        input[type="text"], input[type="password"], input[type="number"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 5px 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .gallery img {
            width: 150px;
            height: 150px;
            margin: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Registration Form -->
        <h2>Register</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" maxlength="10" required><br>
            
            <label for="userpass">Password:</label>
            <input type="password" name="userpass" maxlength="10" required><br>
            
            <label for="fname">First Name:</label>
            <input type="text" name="fname" maxlength="30" required><br>
            
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" maxlength="30" required><br>
            
            <label for="age">Age:</label>
            <input type="number" name="age" min="1" required><br>
            
            <input type="submit" name="register" value="Register">
        </form>

        <!-- Login Form -->
        <h2>Login</h2>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" maxlength="10" required><br>
            
            <label for="userpass">Password:</label>
            <input type="password" name="userpass" maxlength="10" required><br>
            
            <input type="submit" name="login" value="Login">
        </form>

        <!-- Player Records -->
        <h2>Player Records</h2>
        <?php
        $sql = "SELECT username, fname, lname, age FROM player";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Age</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row['username']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['age']) . "</td></tr>";
            }

            echo "</table>";
        } else {
            echo "No records found.";
        }
        ?>

        <!-- Image Upload Form -->
        <h2>Upload Image</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" accept="image/*" required><br>
            <input type="submit" value="Upload">
        </form>

        <!-- Image Gallery -->
        <h2>Gallery</h2>
        <div class="gallery">
            <?php
            $dir = 'uploads/';
            $files = array_diff(scandir($dir), array('.', '..'));

            if (count($files) > 0) {
                foreach ($files as $file) {
                    echo "<img src='" . htmlspecialchars($dir . $file) . "' alt='Image'>";
                }
            } else {
                echo "No images found.";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
