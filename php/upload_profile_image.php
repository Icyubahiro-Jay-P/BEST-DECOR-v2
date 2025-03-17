<?php
session_start();
include("connect.php");

if (!isset($_SESSION['user_id'])) {
    die(json_encode(['success' => false, 'message' => 'Not authenticated']));
}

if (!isset($_FILES['profile_image'])) {
    die(json_encode(['success' => false, 'message' => 'No file uploaded']));
}

$user_id = $_SESSION['user_id'];
$file = $_FILES['profile_image'];
$fileName = $user_id . '_' . time() . '_' . $file['name'];
$uploadDir = '../uploads/profiles/';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$uploadPath = $uploadDir . $fileName;

if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
    $relativePath = 'uploads/profiles/' . $fileName;
    $sql = "UPDATE users SET profile_image = '$relativePath' WHERE id = $user_id";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'image_url' => $relativePath]);
    } else {
        echo json_encode(['success' => false, 'message' => mysqli_error($conn)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
}
