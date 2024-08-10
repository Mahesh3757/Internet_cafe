<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$select_service = isset($_POST['select_service']) ? $_POST['select_service'] : '';
$select_city = isset($_POST['select_city']) ? $_POST['select_city'] : '';

// Database connection
$conn = new mysqli('localhost', 'root', '', 'registeration');
if ($conn->connect_error)
    {
    echo "$conn->connect_error";
    die("Connection Failed: " . $conn->connect_error);
    } else {
    $stmt = $conn->prepare("INSERT INTO adhar (first_name, last_name, email, phone, select_service, select_city) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Check if the prepare statement was successful
    if ($select_service !== null && $select_city !== null) {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO adhar (select_service, select_city) VALUES ( ?, ?)";
        
        // Prepare the SQL statement
        
        // Bind parameters
        $stmt->bind_param('sss', $select_service, $select_city);
    
        // Execute the statement
        $stmt->execute();
    
        // Close the statement
        $stmt->close();
    } else {
        // Handle the case where one or more values are null
        echo "One or more values are null. Cannot execute the query.";
    }
    

    $conn->close();
}
?>
