<?php
// MySQL server configuration
$servername = ""; // Change this to your MySQL server
$username = ""; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = ""; // Change this to your MySQL database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id'])) {
    $id = intval($data['id']); 
    $sql = "DELETE FROM table_name_here WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); 

    if ($stmt->execute()) {
        echo "Note deleted successfully";
    } else {
        echo "Error deleting note: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Error: Note id not provided";
}

$conn->close();
?>
