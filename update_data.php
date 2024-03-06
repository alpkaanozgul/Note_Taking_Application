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

if (isset($_POST['editedNote']) && isset($_POST['editedId'])) {
    $editedNote = $conn->real_escape_string($_POST['editedNote']);
    $editedId = intval($_POST['editedId']); 

    $sql = "UPDATE table_name_here SET column_name_here = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $editedNote, $editedId); 

    if ($stmt->execute()) {
        echo "Note updated successfully";
    } else {
        echo "Error updating note: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Error: Edited note data not provided";
}

$conn->close();
?>
