<?php
require_once("_connect.php");

$sql = "SELECT * FROM `users`";
$result = $connect->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;  // Store each user in the array
}

echo json_encode($users);  // Return the data as a JSON response
$connect->close();
?>