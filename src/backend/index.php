<?php
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['userID']))
{
    header("Location: login.php");
    die();
}

require("php/_connect.php");

$sql = "SELECT * FROM `users`";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>
    <div class="main-content">

    </div>
</body>
</html>


