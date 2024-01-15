<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "chat_system";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

if (isset($data->message) && !empty($data->message)) {
    $message = $conn->real_escape_string($data->message);

    $sql = "INSERT INTO messages (message) VALUES ('$message')";
    $conn->query($sql);
}

$conn->close();
?>
