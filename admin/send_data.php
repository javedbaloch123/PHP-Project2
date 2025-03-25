<?php

include 'db_connect.php';

// Allow CORS (if needed)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Check if 'id' is received
if (isset($data['id'])) {
    $id = $data['id'];
    
     
    // Perform your database query or other operations
    // Example: Fetch details from a database
    // Assuming you have a database connection ($conn)
    
  
    $stmt = $conn->prepare("SELECT * FROM barber_info WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    


    // For demonstration, let's return a mock response
    echo json_encode([
        "status" => "success",
        "message" => "Data received successfully!",
        "row" => $row
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No ID provided"
    ]);
}

$stmt->close();
$conn->close();
?>
