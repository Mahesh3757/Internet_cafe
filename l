<?php

$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'registeration');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO login ( email, password) VALUES (?, ?)");
    
    // Check if the prepare statement was successful
    if ($email == $_POST['email'] && $password == $_POST['password']) {
        // Set session variable to indicate successful login
        $_SESSION["loggedin"] = true;

        // Redirect to a welcome page or dashboard
        header("location: services.html");
        exit;
    } else {
        // Display an error message if credentials are incorrect
        $error = "Invalid email or password";
    }
    

    $conn->close();
}
?>
