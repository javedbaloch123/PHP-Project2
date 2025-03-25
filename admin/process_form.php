<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php'; // Database connection file

     
    $name = $_POST['name'];
    $scissor = $_POST['scissor'];
    $clipper = $_POST['clipper'];
    $buzz = $_POST['buzz'];
    $beared = $_POST['beared'];
    $strait = $_POST['strait'];
    $sunday = $_POST['sunday'];
    $avail = $_POST['avail'];
    $role = $_POST['role'];
 
 if(empty($name) || empty($scissor) || empty($clipper) || empty($buzz) || empty($beared) || empty($strait) || empty($sunday)){
    echo json_encode(["status" => "error", "message" => "All Fields are required"]);
    exit;
 } 
    // Image Upload Logic
    $uploadDir = "images/"; // Correct path to move file into images folder

        // Ensure images folder exists
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = basename($_FILES['img']['name']); // Security fix
        $imageTmpName = $_FILES['img']['tmp_name'];
        $imagePath =  $uploadDir . $imageName;;
        move_uploaded_file($imageTmpName, $imagePath);

    $stmt = $conn->prepare("INSERT INTO barber_info (name,admin,scissor,clipper,buzz,beared,starit_razor,sunday,avail,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiiiiiiis", $name, $role, $scissor,$clipper, $buzz, $beared, $strait, $sunday, $avail, $imageName);

    if ($stmt->execute()) {
        $last = $conn->insert_id;
        echo json_encode(["status" => "success", "message" => "Data inserted successfully!" ,"id"=>$last]);
         
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to insert data"]);
    }

    $stmt->close();
    $conn->close();
}
?>
