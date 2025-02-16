<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once("_connect.php");

if (!isset($_POST['email']) || !isset($_POST['password'])) die("Missing POST data");

$email = $_POST['email'];
$password = $_POST['password'];

$SQL = "SELECT * FROM `users` WHERE `email` = ?";

$stmt = mysqli_prepare($connect, $SQL);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $USER = mysqli_fetch_assoc($result);
    if (password_verify($password, $USER['password'])) {
        session_start();
        $_SESSION['userID'] = $USER['userID'];
        $_SESSION['email'] = $USER['email'];
        $_SESSION['firstName'] = $USER['firstName'];
        $_SESSION['lastName'] = $USER['lastName'];
        echo json_encode(['status' => 'success', 'message' => 'Login successful']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email']);
}
?>