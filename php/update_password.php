<?php
session_start();
include("connect.php");

if (!isset($_SESSION['user_id'])) {
    die(json_encode(['success' => false, 'message' => 'Not authenticated']));
}

$user_id = $_SESSION['user_id'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Verify current password
$sql = "SELECT password FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!password_verify($current_password, $user['password'])) {
    die(json_encode(['success' => false, 'message' => 'Current password is incorrect']));
}

if ($new_password !== $confirm_password) {
    die(json_encode(['success' => false, 'message' => 'New passwords do not match']));
}

$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
$sql = "UPDATE users SET password = '$hashed_password' WHERE id = $user_id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
}
