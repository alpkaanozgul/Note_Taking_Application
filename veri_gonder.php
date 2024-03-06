<?php
if(isset($_POST['textarea_veri'])) {
    // Establish connection to MySQL database
    $servername = ""; // Change this to your MySQL server
    $username = ""; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = ""; // Change this to your MySQL database name

    $veri = $_POST['textarea_veri'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı hatası: " . $conn->connect_error); 
    }

    $sql = "INSERT INTO Table_Name_Here!!! (Column_Name_Here!!) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $veri);

    if ($stmt->execute()) {
        echo "Data Sent.";
    } else {
        echo "Error Sending Data " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Form data not received.";
}
?>
