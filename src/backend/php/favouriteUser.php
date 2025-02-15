<?php
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: ../login.php");
    die();
}

require_once("_connect.php");
$firstName = $_POST['firstName']; // Getting the firstName from the URL

// Step 1: Get the current "top" order value (lowest order value)
$stmt = $connect->prepare("SELECT MIN(`order`) AS top_order FROM `users`");
$stmt->execute();
$stmt->bind_result($topOrder);
$stmt->fetch();
$stmt->close();

// Step 2: Update the selected user's order to be before the current "top" order
$newOrder = $topOrder - 1; // Make this row's order value one less than the current top

// Step 3: Update the row with the new order
$stmt = $connect->prepare("UPDATE `users` SET `order` = ? WHERE `firstName` = ?");
$stmt->bind_param("is", $newOrder, $firstName);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit(); 
} else {
    echo "Error: " . $stmt->error; 
}

$stmt->close();
$connect->close(); 
?>
