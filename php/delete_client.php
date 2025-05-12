<?php
include("connect.php");
session_start();

if(isset($_GET['client_id'])){
    $id = $_GET['client_id'];
    $sql = "DELETE FROM clients WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    
    if($query){
        header('location: ../dashboard');
        $_SESSION['toast'] = [
            'type' => 'success',
            'message' => 'Client deleted successfully'
        ];
    } else {
        $_SESSION['toast'] = [
            'type' => 'error',
            'message' => 'Failed to delete client'
        ];
        header('location: ../dashboard');
    }
    header("Location: ../dashboard");
    exit();
}
?>
