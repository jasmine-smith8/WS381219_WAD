<?php


session_start();

if (!isset($_SESSION['userID']))
{
    header("Location: ../login.php");
    die();
}

require_once("_connect.php");

if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['txtUserEmail']) || !isset($_POST['txtUserPassword'])) {
    die("Missing POST values");
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['txtUserEmail'];
$password = $_POST['txtUserPassword'];

$password = password_hash($password, PASSWORD_BCRYPT);

$stmt = $connect->prepare("INSERT INTO `users` (`firstName`, `lastName`, `email`, `password`) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

if ($stmt->execute()) {
    echo 'true';
} else {
    echo "Error: " . $stmt->error; 
}

$stmt->close();
$connect->close(); 
?>

