<?php
session_start();
include("connectDB.php");
include("lucasLoavesFunctions.php");

$arrayJobPost = [];

$sql = "SELECT * FROM jobpost";

$resultSet = mysqli_query($conn, $sql);

while($record = mysqli_fetch_array($resultSet, MYSQLI_ASSOC))
{
   array_push($arrayJobPost, $record);
}

echo json_encode($arrayJobPost);                            
?>