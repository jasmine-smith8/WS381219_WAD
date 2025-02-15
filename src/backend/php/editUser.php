<?php
 require_once("_connect.php");

if (!isset($_POST['userID']) ||
    !isset($_POST['firstName']) ||
    !isset($_POST['lastName']))
{
    die("You dun goofed! 😢");
}
 
$userID = $_POST['userID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

$stmt = $connect->prepare("UPDATE `users` SET `firstName` = ?, `lastName` = ? WHERE `userID` = ?");

$stmt->bind_param("ssi", $firstName, $lastName, $userID);

if ($stmt->execute()) {
    echo 'true';
} else {
    echo "Error: " . $stmt->error; 
}

$stmt->close();
$connect->close(); 