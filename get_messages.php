<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "chat_system";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

$messages = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = array(
            'message' => $row['message']
        );
    }
}

echo json_encode($messages);

$conn->close();
?>