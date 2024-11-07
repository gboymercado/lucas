<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dblucasloaves";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// Get order number from POST request
$orderNumber = isset($_POST['searchOrderNumber']) ? intval($_POST['searchOrderNumber']) : 0;

$sql = "SELECT 
            salesorder.OrderNo,
            salesorder.OrderDate,
            salesorder.CustomerName,
            item.ItemName,
            item.UnitCost,
            orderline.QuantityOrdered
        FROM
            orderline
        INNER JOIN
            salesorder ON orderline.OrderNo = salesorder.OrderNo
        INNER JOIN
            item ON orderline.ItemNo = item.ItemNo
        WHERE salesorder.OrderNo = $orderNumber";

$result = $conn->query($sql);

$data = [];

if ($result) {
    while($row = $result->fetch_assoc()) {
        // Calculate TotalAmount
        $row['TotalAmount'] = number_format($row['UnitCost'] * $row['QuantityOrdered'], 2);
        $data[] = $row;
    }
} else {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit();
}

$conn->close();

echo json_encode($data);
?>
