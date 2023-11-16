<?php
// Start a session (if not already started)
session_start();

// Database connection settings
$host = 'localhost';
$db = 'gadgex';
$username = 'root';
$password = '';

// Establish a database connection
$mysqli = new mysqli($host, $username, $password, $db);

// Check for a connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // You should validate and sanitize user inputs to prevent SQL injection and other security issues

    // Query the database to check if the username and password match
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Retrieve user information
        $user = $result->fetch_assoc();

        // Login successful
        $_SESSION['username'] = $username;

        // Check the user type and redirect accordingly
        if ($user['user_type'] === 'A') {
            header('Location: admin/admin.php'); // Redirect to the admin panel
            exit();
        } elseif ($user['user_type'] === 'U') {
            header('Location: user/user.php'); // Redirect to the user dashboard
            exit();
        } else {
            header('Location: index.php?error=404'); // Redirect to a 404 error page if user type is undefined
            exit();
        }
    } else {
        // Login failed
        $error_message = "Invalid username or password.";
        header('Location: index.php?login_error=' . urlencode($error_message)); // Pass the error message in the URL
        exit();
    }
}

// Close the database connection
$mysqli->close();
?>
