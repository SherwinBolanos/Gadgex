<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection settings
    $host = "localhost";
    $db = "gadgex";
    $username = "root";
    $password = "";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $db);

    // Check for a connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Check if any of the fields already exist in the database
    $checkQuery = "SELECT * FROM users WHERE username = ? OR fullname = ? OR email = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("sss", $username, $fullname, $email);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // User data already exists, display an error message
        header("Location: index.php?error=Account already exists.");
        exit();
    }

    // Check if passwords match
    if ($password == $confirmPassword) {
        // Passwords match, proceed with registration

        // Define the SQL query to insert user data
        $sql = "INSERT INTO users (username, fullname, email, password) VALUES (?, ?, ?, ?)";

        // Prepare the SQL query for execution
        $stmt = $conn->prepare($sql);

        // Bind parameters to the SQL query
        $stmt->bind_param("ssss", $username, $fullname, $email, $password);

        // Execute the SQL query
        if ($stmt->execute()) {
            
            // Registration successful
            // Redirect the user to the login page
            header("Location: index.php?success=Registration successful. You can now log in.");
            exit();
        } else {
            // Registration failed due to a database error

            // Redirect the user to the registration page with an error message
            header("Location: index.php?error=Registration failed. Please try again later.");
            exit();
        }
    } else {
        // Passwords do not match
        // Redirect the user to the registration page with an error message
        header("Location: index.php?error=Passwords do not match. Please try again.");
        exit();
    }

    // Close the database connection
    $conn->close();
}
?>