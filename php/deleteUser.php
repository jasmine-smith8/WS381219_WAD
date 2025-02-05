<?php
session_start();

if (!isset($_SESSION['userID']))
{
    header("Location: login.php");
    die();
}

require_once("_connect.php");

if (!isset($_POST['userID'])) {
    die("Missing userID");
}

$userId = $_POST['userID'];

$stmt = $connect->prepare("DELETE FROM `users` WHERE `userID` = ?");
$stmt->bind_param("i", $userId); 

if ($stmt->execute()) {
    echo "true";
} else {
    echo "Error: " . $stmt->error; 
}

$stmt->close();
$connect->close(); 
?>
