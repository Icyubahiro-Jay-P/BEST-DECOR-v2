<?php
session_start();
include("connect.php");

if (!isset($_SESSION['user_id'])) {
    die(json_encode(['success' => false, 'message' => 'Not authenticated']));
}

$user_id = $_SESSION['user_id'];
$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);

$sql = "UPDATE users SET 
        full_name = '$full_name',
        email = '$email',
        phone = '$phone'
        WHERE id = $user_id";

if (mysqli_query($conn, $sql)) {
    $_SESSION['full_name'] = $full_name;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
}
