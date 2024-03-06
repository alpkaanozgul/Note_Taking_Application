<?php
// Establish connection to MySQL database
$servername = ""; // Change this to your MySQL server
$username = ""; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = ""; // Change this to your MySQL database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, column_name_here FROM table_name_here"; 
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row; 
    }
} else {
    echo "0 results";
}

$conn->close();

echo json_encode($data);
?>
