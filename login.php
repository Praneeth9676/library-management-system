<?php
include 'db.php';  // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    // Prepare and execute SQL statement to get user data
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            echo "Login successful";
            // Optionally, start a session and set session variables here
            // session_start();
            // $_SESSION['email'] = $email;
        } else {
            echo "Incorrect email or password";
        }
    } else {
        echo "No user found with this email";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>