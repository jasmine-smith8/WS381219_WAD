<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("_connect.php");

// Get the JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['email']) || !isset($input['password'])) {
    echo json_encode(["status" => "error", "message" => "Missing POST data"]);
    exit;
}

$email = $input['email'];
$password = $input['password'];

// Input Validation to be added later :)

$SQL = "SELECT * FROM `users` WHERE `email` = ?";

$stmt = mysqli_prepare($connect, $SQL);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

// Get the result from the MySQL query
$result = mysqli_stmt_get_result($stmt);

// Check if one row was returned
if (mysqli_num_rows($result) == 1) {
    // Get user data from the MySQL result
    $USER = mysqli_fetch_assoc($result);

    // Check password using password_verify and bcrypt
    if (password_verify($password, $USER['password'])) {
        @session_start();

        $_SESSION['userID'] = $USER['userID'];
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid password"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "User not found"]);
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>
