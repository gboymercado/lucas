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

$sql = "SELECT PostNumber, JobName FROM jobpost";
$result = $conn->query($sql);

$jobs = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}

echo json_encode($jobs);

$conn->close();
?>
