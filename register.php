<?php
include 'db.php';  // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST['register-firstname'];
    $lastName = $_POST['register-lastname'];
    $email = $_POST['register-email'];
    $password = $_POST['register-password'];
    $confirmPassword = $_POST['register-confirmpassword'];
    $terms = isset($_POST['register-terms']); // Check if terms checkbox is checked

    // Validate passwords match
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Validate that terms and conditions are accepted
    if (!$terms) {
        die("You must agree to the terms and conditions.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>