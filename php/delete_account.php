<?php
include("connect.php");
session_start();
$sql = "DELETE FROM users WHERE id = '$_SESSION[user_id]'";
$query = mysqli_query($conn, $sql);
if($query){
  $_SESSION['toast'] = [
    'type' => 'success',
    'message' => 'Account deleted successfully'
  ];
  session_unset();
  session_destroy();
  echo "success";
}else{
  $_SESSION['toast'] = [
    'type' => 'error',
    'message' => 'Failed to delete account'
  ];
  echo "error";
}
?>