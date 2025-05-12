<?php
include("connect.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // ...existing database update code...

    if($query){
        $_SESSION['toast'] = [
            'type' => 'success',
            'message' => 'Client information updated successfully'
        ];
    } else {
        $_SESSION['toast'] = [
            'type' => 'error',
            'message' => 'Failed to update client information'
        ];
    }
    header("Location: ../dashboard");
    exit();
}
?>
