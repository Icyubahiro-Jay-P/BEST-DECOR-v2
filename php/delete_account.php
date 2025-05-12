<?php
include("connect.php");
session_start();
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$sql = "DELETE FROM `users` WHERE id = '$user_id'";
$query = mysqli_query($conn, $sql);
if($query){
  $_SESSION['toast'] = [
    'type' => 'success',
    'message' => 'Account deleted successfully'
  ];
  echo "success";
}else{
  $_SESSION['toast'] = [
    'type' => 'error',
    'message' => 'Failed to delete account'
  ];
  echo "success";
}
?>