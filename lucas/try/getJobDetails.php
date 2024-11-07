<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblucasloaves";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['PostNumber'])) {
    $id = intval($_GET['PostNumber']);
    $sql = "SELECT * FROM jobpost WHERE PostNumber = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
        echo json_encode($job);
    } else {
        echo json_encode(["error" => "Job not found"]);
    }
}

$conn->close();
?>
