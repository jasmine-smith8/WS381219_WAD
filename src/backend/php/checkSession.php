<?php
session_start();
if (isset($_SESSION['userID'])) {
    echo json_encode(['status' => 'success', 'user' => $_SESSION]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No active session']);
}
?>