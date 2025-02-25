<?php

require_once __DIR__ . "vendor/autoload.php"; 

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../../../");
$dotenv->load();

//credentials
$server = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

//connect to the database
$connect = mysqli_connect($server, $username, $password, $database);

if (!$connect) {
    die(json_encode(['status' => 'error', 'message' => 'Unable to connect to the database']));
}

echo json_encode(['status' => 'success', 'message' => 'Connected to the database']);
?>